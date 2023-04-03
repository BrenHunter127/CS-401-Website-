<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS 401 Project</title>
    <link rel="stylesheet" href="login_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <script>
        function validateForm(e) {
            var username = document.getElementById('username');
            var password = document.getElementById('password');

            var usernameRegex = /^[a-zA-Z0-9]{3,}$/;
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$/;

            if (!usernameRegex.test(username.value)) {
                e.preventDefault();
                username.style.borderColor = 'red';
                alert('Username must be at least 3 characters long and contain only alphanumeric characters.');
            } else {
                username.style.borderColor = '';
            }

            if (!passwordRegex.test(password.value)) {
                e.preventDefault();
                password.style.borderColor = 'red';
                alert('Password must be at least 8 characters long, contain at least one lowercase letter, one uppercase letter, and one digit.');
            } else {
                password.style.borderColor = '';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="logo">
        </div>
        <div class="login-box">
            <h2>Login</h2>
            <form action="login_process.php" method="POST" onsubmit="validateForm(event)">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <input type="submit" value="Login">
            </form>
            <p class="create-account">New here? <a href="register.php">Create an Account</a></p>
            <a href="index.php" class="back-link">Back</a>

        </div>
    </div>
</body>
</html>
