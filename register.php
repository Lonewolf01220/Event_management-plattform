<?php
include 'config.php'; // Include your database connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    try {
        // Check if the email already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // Email already exists
            echo "The email address is already registered.";
        } else {
            // Insert new user
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $password])) {
                echo "Registration successful.";
            } else {
                echo "Registration failed.";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
