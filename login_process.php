<?php
// Start a session
session_start();

// Include your database configuration file
include('db_config.php');

// Check if form is submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user credentials against your database
    $query = "SELECT * FROM users WHERE username = ?";

    // Prepare the query and bind the username parameter
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a user record exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the submitted password against the stored password
        if (password_verify($password, $user['password'])) {
            // Set session variables and redirect user to the dashboard
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            header("Location: login.html?error=invalid_password");
            exit();
        }
    } else {
        // User not found
        header("Location: login.html?error=user_not_found");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to login page if not submitted via POST method
    header("Location: login.html");
    exit();
}
?>
