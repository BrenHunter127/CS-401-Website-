<?php
session_start();

include_once('db_config.php');
include('Dao.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$dao = new Dao();
$user = $dao->getUserByUsername($_SESSION['username']);

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
                <div class="avatar"></div>
                <h2><?php echo $user['username']; ?></h2>
                <p>Email: <?php echo $user['email']; ?></p>
            </div>
        </div>
    </div>
</body>

</html>