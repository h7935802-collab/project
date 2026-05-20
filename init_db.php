<?php
$host = "dpg-d86g0dojs32c73ekovr0-a.oregon-postgres.render.com";
$port = 5432;
$dbname = "emc_db_im1d";
$user = "emc_db_im1d_user";
$password = "qazuiJOEdDbOZun63jjnkUA1qSiB6VIx";

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

try {
    $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = file_get_contents(__DIR__ . '/database.sql');
    $conn->exec($sql);
    echo "Database initialized successfully.\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
