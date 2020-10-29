<?php
session_start();
include 'functions.php';
check_access();
echo "Welcome " . $_SESSION['username'];
echo "<br>";
echo "Please fill out the information required to change your password";
echo "<br> <br>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password </title>
</head>
<body>
<form action="confirm.php" method="post">
    <label for="username">Username</label> <input type="text" name="username" placeholder="username" id="username">
    <br>
    <label for="password">Old Password</label> <input type="text" name="password" placeholder="old password" id="password">
    <br>
    <label for="password">New Password</label> <input type="text" name="newpassword" placeholder="new password" id="newpassword">
    <br> <br>
    <input type="submit" value="Submit Changes">

    <br> <br>
</form>