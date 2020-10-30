<?php
session_start();
include 'functions.php';
check_access();
echo "Welcome " . $_SESSION['username'];
echo "<br> <br>";
?>
<a href="logout.php">Log Out</a>
<br>
<a href="changePassword.php">Change Password</a>