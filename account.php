<?php
session_start();
?>



<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="account_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
    <?php include 'navigation.php'; ?>
    <div class="container">
        <h1 class="title">Account Details</h1>
        <div class="account-box">
            <div class="profile">
                <img src="profile_picture.jpg" alt="Profile Picture" class="profile-picture">
                <h2>Username</h2>
                <p>Email: example@example.com</p>
            </div>
           <!--  <div class="game-stats">
                <h2>Game Stats</h2>
                <ul>
                    <li>Games Played: 100</li>
                    <li>Wins: 50</li>
                    <li>Losses: 50</li>
                    <li>Win Rate: 50%</li>
                </ul>
            </div> -->
        </div>
    </div>
</body>
</html>
