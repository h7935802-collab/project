<?php
$config = require __DIR__ . '/app/Config/database.php';
$dsn = "pgsql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

try {
    $conn = new PDO($dsn, $config['user'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = file_get_contents(__DIR__ . '/database.sql');
    $conn->exec($sql);
    echo "Database initialized successfully.\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
