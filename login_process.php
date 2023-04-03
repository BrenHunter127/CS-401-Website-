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
    $query = "SELECT * FROM users WHERE username = $1";

    // Prepare the query and bind the username parameter
    $stmt = pg_prepare($conn, "login_query", $query);
    $result = pg_execute($conn, "login_query", array($username));

    // Check if a user record exists
    if (pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);

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
    pg_free_result($result);
    pg_close($conn);
} else {
    // Redirect to login page if not submitted via POST method
    header("Location: login.php");
    exit();
}
?>
