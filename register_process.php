<?php
// Start a session
session_start();

// Include your database configuration file
include('db_config.php');

// Check if form is submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Perform validation checks and make sure username and email are unique, and password and confirm password match

    // If validation passes
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an SQL INSERT statement to add the new user
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    // Prepare the query and bind the parameters
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect the user to the login page with a success message
        header("Location: login.html?success=account_created");
        exit();
    } else {
        // Show an error message
        header("Location: register.html?error=account_creation_failed");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the registration page if not submitted via POST method
    header("Location: register.html");
    exit();
}
?>
