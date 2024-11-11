<?php
// db_connection.php

$servername = "localhost"; // Replace with your server details
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "guest house"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
