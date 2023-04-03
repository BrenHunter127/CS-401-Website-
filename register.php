
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
    <script>
        function validateForm(e) {
            e.preventDefault();

            var username = document.getElementById('username');
            var email = document.getElementById('email');
            var password = document.getElementById('password');
            var confirmPassword = document.getElementById('confirm_password');

            var usernameRegex = /^[a-zA-Z0-9]{3,}$/;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$/;

            var validForm = true;

            if (!usernameRegex.test(username.value)) {
                username.style.borderColor = 'red';
                alert('Username must be at least 3 characters long and contain only alphanumeric characters.');
                validForm = false;
            } else {
                username.style.borderColor = '';
            }

            if (!emailRegex.test(email.value)) {
                email.style.borderColor = 'red';
                alert('Please enter a valid email address.');
                validForm = false;
            } else {
                email.style.borderColor = '';
            }

            if (!passwordRegex.test(password.value)) {
                password.style.borderColor = 'red';
                alert('Password must be at least 8 characters long, contain at least one lowercase letter, one uppercase letter, and one digit.');
                validForm = false;
            } else {
                password.style.borderColor = '';
            }

            if (password.value !== confirmPassword.value) {
                confirmPassword.style.borderColor = 'red';
                alert('Passwords do not match.');
                validForm = false;
            } else {
                confirmPassword.style.borderColor = '';
            }

            if (validForm) {
                e.target.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="logo">
        </div>
        <div class="login-box">
            <h2>Create Account</h2>
            <form action="register_process.php" method="POST" onsubmit="validateForm(event)">
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
