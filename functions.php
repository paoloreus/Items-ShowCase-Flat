<?php


function get($name, $def = '')
{
    return $_REQUEST['username'] ?? $def;
}

function getpw($password, $def = '')
{
    return $_REQUEST['password'] ?? $def;
}

function getnewpw($newpassword, $def = '')
{
    return $_REQUEST['newpassword'] ?? $def;
}

function check_access()
{
    if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
        header('Location: loginHome.php?error=must log in');
    }
}