<?php
session_start();

include_once('db_config.php');
include('Dao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

    // Perform additional validation checks:
    // - make sure username and email are unique
    // - ensure password and confirm_password match
    // - check the length of the username, password, etc.
    // - validate email format using FILTER_VALIDATE_EMAIL

    // If validation passes
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $dao = new Dao();
    if ($dao->registerUser($username, $email, $hashed_password)) {
        header("Location: login.html?success=account_created");
        exit();
    } else {
        header("Location: register.html?error=account_creation_failed");
        exit();
    }
} else {
    header("Location: register.html");
    exit();
}

?>
