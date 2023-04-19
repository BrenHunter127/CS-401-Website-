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
        function displayErrorPopup(message) {
            const popup = document.createElement('div');
            popup.textContent = message;
            popup.className = 'error-popup';
            document.body.appendChild(popup);

            setTimeout(() => {
                popup.classList.add('fade-out');
                setTimeout(() => {
                    popup.remove();
                }, 500);
            }, 4500);
        }


        function validateForm(e) {
            e.preventDefault();

            let username = document.getElementById('username');
            let password = document.getElementById('password');
            let usernameError = document.getElementById('username-error');
            let passwordError = document.getElementById('password-error');

            let usernameRegex = /^[a-zA-Z0-9]{3,}$/;
            let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$/;

            let hasError = false;

            if (!usernameRegex.test(username.value)) {
                username.classList.add('input-error');
                usernameError.textContent = 'Username must be at least 3 characters long and contain only alphanumeric characters.';
                usernameError.style.display = 'block';
                hasError = true;
            } else {
                username.classList.remove('input-error');
                usernameError.style.display = 'none';
            }

            if (!passwordRegex.test(password.value)) {
                password.classList.add('input-error');
                passwordError.textContent = 'Password must be at least 8 characters long, contain at least one lowercase letter, one uppercase letter, and one digit.';
                passwordError.style.display = 'block';
                hasError = true;
            } else {
                password.classList.remove('input-error');
                passwordError.style.display = 'none';
            }

            if (hasError) {
                return;
            }

            const formData = new FormData();
            formData.append('username', username.value);
            formData.append('password', password.value);

            fetch('login_process.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = 'index.php';
                    } else {
                        displayErrorPopup(data.error);
                    }
                })

                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while logging in. Please try again.');
                });
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
                    <span id="username-error" class="error-message"></span>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <span id="password-error" class="error-message"></span>
                </div>

                <input type="submit" value="Login">
            </form>
            <p class="create-account"><a href="register.php">Create an Account</a></p>
            <a href="index.php" class="back-link">Back</a>

        </div>
    </div>
</body>

</html>