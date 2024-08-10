<?php
include 'config.php'; // Include your database connection settings
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to create an event.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO events (title, description, date, location) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$title, $description, $date, $location])) {
        echo "Event created successfully.";
    } else {
        echo "Failed to create event.";
    }
}
