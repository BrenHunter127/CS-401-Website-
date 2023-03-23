<?php
// Database credentials
$db_host = '127.0.0.1';
$db_username = 'root';
$db_password = '';
$db_name = 'login';

// Create a new connection to the database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
