<?php
session_start();
include 'functions.php';
$user_info = explode(':', file('pass.txt')[0]);

if($user_info[0] == get('username') && $user_info[1] == md5(getpw('password'))){
    $_SESSION['user_logged_in'] = true;          //if this session is true then we will display admin pages -- to be done later
    $_SESSION['username'] = get('username');  //use this session if you want to use the name in anyway such as Welcome *username*
    $_SESSION['password'] = md5(getpw('password')); //use this session if you want to utilize the password
    header('Location: needsPassword.php');
    //echo 'Valid User';
}
else {
    echo 'invalid user';
}