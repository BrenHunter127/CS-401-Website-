<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav_about.css">
</head>

<body>
    <nav class="navbar-custom-font-size">
        <a href="#" class="logo"><img src="logo.png" class="logo-image"></a>
        <div class="nav-links-container">
            <ul class="nav-links">
                <li><a href="index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Market</a></li>
                <li><a href="About.php" class="<?php echo ($currentPage == 'About.php') ? 'active' : ''; ?>">About</a></li>
                <li><a href="maps.php" class="<?php echo ($currentPage == 'maps.php') ? 'active' : ''; ?>">Maps</a></li>
                <li><a href="tools.php" class="<?php echo ($currentPage == 'tools.php') ? 'active' : ''; ?>">Tools</a></li>
            </ul>
        </div>
        <ul class="login">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<li>';
                echo '<a href="account.php">' . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . '</a>';
                echo '<ul class="dropdown">';
                echo '<li><a href="logout.php">Logout</a></li>';
                echo '</ul>';
                echo '</li>';
            } else {
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
</body>

</html>