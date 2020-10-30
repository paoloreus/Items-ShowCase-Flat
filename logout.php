<?php
session_start();
session_destroy();
echo "Redirecting ...";
sleep(3);
header('Location: loginHome.php');
exit();