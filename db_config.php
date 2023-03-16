<?php
// Database credentials
$db_host = 'your_host';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'your_database_name';

// Create a new connection to the database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
