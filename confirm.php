<?php
session_start();
include 'functions.php';
check_access(); // this is to prevent from unauthorized access via url

//in the following if statement we are getting the new information
//from changePassword.php, we are gonna first make sure username and old pw
//both match the ones used to successfully log in
//afterwards we will replace the password in the password file with the new password

//$pw = md5(getpw('password'));
if(md5(getpw('password')) == $_SESSION['password'] && get('username') == $_SESSION['username']) {
    $updated_user = get('username');
    $updated_pw = md5(getnewpw('newpassword'));
    $_SESSION['password'] = $updated_pw;
    $info = fopen('../../../../protected/pass.txt', 'w');
    fwrite($info, $updated_user);
    $info = fopen('../../../../protected/pass.txt', 'a');
    fwrite($info, ':');
    fwrite($info, $updated_pw);
    fclose($info);
    echo "<br>";
    echo "Changes have been made successfully .. redirecting to login";
    sleep(3);
    header('Location: loginHome.php');
}

else {
    echo "Wrong information. Please go back to the login page or try again <br>";
    echo "<a href='loginHome.php'> Login" . "<br>";
    echo "<a href='changePassword.php'> Try again";
}