<?php
// db.php - put in your project root
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root';    // MAMP default is root/root. If your password is different, change this.
$DB_NAME = 'afterschool_db';

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
