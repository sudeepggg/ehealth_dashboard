<?php
$host = 'localhost';
$dbname = 'ehealth_dashboard'; // Change this if your database name is different
$username = 'root';
$password = ''; // Default password for XAMPP is empty

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
