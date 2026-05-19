<?php
// Setup script to create DB and import tables
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$dbname = getenv('DB_NAME') ?: 'emc_db';
$port = (int)(getenv('DB_PORT') ?: 3306);

echo "<h2>إعداد قاعدة البيانات تلقائياً...</h2>";

// 1. Connect to MySQL Server (No database selected yet)
$conn = @new mysqli($host, $user, $password, '', $port);

if ($conn->connect_error) {
    die("<h3 style='color:red;'>فشل الاتصال بخادم MySQL: " . $conn->connect_error . "</h3><p>الرجاء التأكد من تشغيل MySQL من لوحة تحكم XAMPP.</p>");
}

echo "<p>تم الاتصال بخادم MySQL بنجاح.</p>";

// 2. Create Database
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sqlCreateDB) === TRUE) {
    echo "<p>تم إنشاء قاعدة البيانات '$dbname' (أو هي موجودة مسبقاً).</p>";
} else {
    die("خطأ في إنشاء قاعدة البيانات: " . $conn->error);
}

// 3. Select the database
$conn->select_db($dbname);

// 4. Read database.sql file
$sqlFile = dirname(__DIR__) . '/database.sql';
if (!file_exists($sqlFile)) {
    die("لم يتم العثور على ملف database.sql في مسار: " . $sqlFile);
}

$queries = file_get_contents($sqlFile);

// 5. Execute multi queries
if ($conn->multi_query($queries)) {
    do {
        // Store first result set
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
    echo "<h3 style='color:green;'>تم استيراد الجداول والبيانات بنجاح! 🎉</h3>";
    echo "<p>الآن يمكنك <a href='/'>العودة إلى النظام وتسجيل الدخول</a></p>";
} else {
    echo "<h3 style='color:red;'>حدث خطأ أثناء استيراد الجداول: " . $conn->error . "</h3>";
}

$conn->close();
