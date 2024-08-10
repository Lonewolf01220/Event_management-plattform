<?php
include 'config.php'; // Include your database connection settings

header('Content-Type: application/json');

$stmt = $pdo->query("SELECT * FROM events");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($events);
