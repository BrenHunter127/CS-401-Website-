<?php
// Get the database connection string
$database_url = 'postgres://zjaugyusmxjjyo:f415d3dcf75e8b62b5ea3fb5c6bd103469c7c190783db4a869af69bd7c8d77a8@ec2-3-208-74-199.compute-1.amazonaws.com:5432/daqf1pbq5h99o3';
$dbopts = parse_url($database_url);

// Database credentials
$db_host = $dbopts["host"];
$db_port = $dbopts["port"];
$db_username = $dbopts["user"];
$db_password = $dbopts["pass"];
$db_name = ltrim($dbopts["path"], '/');

// Create a new connection to the database
$conn_str = "host={$db_host} port={$db_port} dbname={$db_name} user={$db_username} password={$db_password} sslmode=require";
$conn = pg_connect($conn_str);

// Check the connection
if (!$conn) {
    die('Connection failed: ' . pg_last_error());
}
?>
