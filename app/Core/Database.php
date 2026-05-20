<?php

namespace App\Core;

class Database
{
    public \PDO $conn;

    public function __construct(array $config)
    {
        $host = $config['host'] ?? 'localhost';
        $port = $config['port'] ?? 5432;
        $dbname = $config['dbname'] ?? 'emc_db';
        $user = $config['user'] ?? 'root';
        $password = $config['password'] ?? '';
        $driver = $config['driver'] ?? 'pgsql';

        $dsn = "$driver:host=$host;port=$port;dbname=$dbname";
        if ($driver === 'pgsql') {
            $dsn .= ";sslmode=prefer";
        }

        try {
            $this->conn = new \PDO($dsn, $user, $password, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]);

            if ($driver === 'pgsql') {
                $this->autoMigrate();
            }
        } catch (\PDOException $e) {
            die("Database Connection failed: " . $e->getMessage());
        }
    }

    private function autoMigrate()
    {
        try {
            $res = $this->conn->query("SELECT to_regclass('public.users')");
            if (!$res->fetchColumn()) {
                $sqlPath = __DIR__ . '/../../database.sql';
                if (file_exists($sqlPath)) {
                    $sql = file_get_contents($sqlPath);
                    $this->conn->exec($sql);
                }
            }
        } catch (\Exception $e) {
            // fail silently
        }
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }
}
