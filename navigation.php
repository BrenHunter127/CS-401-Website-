<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navigation_style.css">
</head>
<body>
    <nav>
        <a href="#" class="logo"><img src="logo.png" class="logo-image"></a>
        <ul class="nav-links">
            <li><a href="index.php">Market</a></li>
            <li><a href="About.php">About</a></li>
            <li><a href="maps.php">Maps</a></li>
            <li><a href="tools.php">Tools</a></li>
            <li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="account.php">' . $_SESSION['username'] . '</a>';
                    echo '<ul id="user-dropdown" class="dropdown">';
                    echo '<li><a href="logout.php">Logout</a></li>';
                    echo '</ul>';
                } else {
                    echo '<a href="login.php">Login</a>';
                }
                ?>
            </li>
        </ul>
    </nav>
</body>
</html>
