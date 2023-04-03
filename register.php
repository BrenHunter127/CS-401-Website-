<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 401 Project - Register</title>
    <link rel="stylesheet" href="login_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
    <div class="container">
        <div class="logo">
        </div>
        <div class="login-box">
            <h2>Create Account</h2>
            <form action="register_process.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <input type="submit" value="Create Account">
            </form>
            <p class="create-account">Already have an account? <a href="login.html">Login</a></p>
        </div>
    </div>
</body>
</html>
