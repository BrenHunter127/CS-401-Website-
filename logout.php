<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Redirect to the desired page after logging out, e.g., index.php
exit();
?>
