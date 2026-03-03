<?php
// Database connection (single-responsibility file)
$dbType   = "mysql";
$dbName   = "my_lab_db";
$host     = "localhost";
$userName = "merlin";
$password = "1914";

try {
    $dsn = "$dbType:host=$host;dbname=$dbName;charset=utf8mb4";
    $pdo = new PDO($dsn, $userName, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die('DB Connection failed: ' . htmlspecialchars($e->getMessage()));
}
