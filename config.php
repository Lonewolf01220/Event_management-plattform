<?php
$host = 'localhost'; // Replace with your database host
$db = 'emp'; // Replace with your database name
$user = 'root'; // Replace with your database username
$pass = ''; // Replace with your database password
$charset = 'utf8mb4'; // Set the character set

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
