<?php
include __DIR__ . '/html_private/head.php';
if (array_key_exists('User', $_SESSION)) {
    session_destroy();
    unset($_SESSION);
    $_SESSION = array();
    setcookie("User", "", time() - 3600);
    setcookie("Uname", "", time() - 3600);
    $myConn->redirect('login.php');
}
