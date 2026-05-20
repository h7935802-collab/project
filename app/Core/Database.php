<?php

namespace App\Core;

class Database
{
    public \PDO $conn;

    public function __construct(array $config)
    {
        // Try getting DATABASE_URL from environment (used by Render)
        $dbUrl = getenv('DATABASE_URL');
        if ($dbUrl) {
            $parsedUrl = parse_url($dbUrl);
            $driver = $parsedUrl['scheme'] === 'postgres' ? 'pgsql' : $parsedUrl['scheme'];
            $host = $parsedUrl['host'];
            $port = $parsedUrl['port'] ?? 5432;
            $user = $parsedUrl['user'];
            $password = $parsedUrl['pass'];
            $dbname = ltrim($parsedUrl['path'], '/');
            $dsn = "$driver:host=$host;port=$port;dbname=$dbname;sslmode=prefer";
        } else {
            $host = $config['host'] ?? 'localhost';
            $port = $config['port'] ?? 5432;
            $dbname = $config['dbname'] ?? 'emc_db';
            $user = $config['user'] ?? 'root';
            $password = $config['password'] ?? '';
            $driver = $config['driver'] ?? 'pgsql';
            $dsn = "$driver:host=$host;port=$port;dbname=$dbname;sslmode=prefer";
            if ($driver === 'mysql') {
                $dsn .= ";charset=utf8mb4";
            }
        }

        try {
            $this->conn = new \PDO($dsn, $user, $password, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]);
            
            // Auto-migrate tables if not exists
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
            // fail silently on migration errors
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
