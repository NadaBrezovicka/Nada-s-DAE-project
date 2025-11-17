<?php
// login.php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($user === '' || $password === '') {
        die('Please fill all fields.');
    }

    // Try finding by username first, then email
    $stmt = $conn->prepare("SELECT id, username, email, password_hash FROM users WHERE username = ? OR email = ? LIMIT 1");
    $stmt->bind_param('ss', $user, $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password_hash'])) {
            // Successful login
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            echo "<p>Login successful. Welcome, " . htmlspecialchars($row['username']) . ".</p>";
            echo "<p><a href='index.php'>Go to home</a></p>";
        } else {
            echo "<p>Invalid password.</p>";
            echo "<p><a href='login.html'>Try again</a></p>";
        }
    } else {
        echo "<p>User not found.</p>";
        echo "<p><a href='login.html'>Try again</a></p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
