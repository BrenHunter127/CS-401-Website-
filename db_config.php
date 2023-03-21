<?php
// Database credentials
<<<<<<< HEAD
$db_host = '127.0.0.1';
$db_username = 'root';
$db_password = '';
$db_name = 'login';
=======
$db_host = 'your_host';
$db_username = 'your_username';
$db_password = 'your_password';
$db_name = 'your_database_name';
>>>>>>> 1db26b7d539c6509752dd131b7fdf90ef57738d4

// Create a new connection to the database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
