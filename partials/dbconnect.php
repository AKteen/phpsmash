<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

// First connect without database to create it
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

// Now connect to the database
$conn->select_db($dbname);

// Create users table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($createTable);
?>