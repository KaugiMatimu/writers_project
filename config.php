<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "writers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the charset to UTF-8
$conn->set_charset("utf8");

?>
