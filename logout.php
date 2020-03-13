<?php 
include __DIR__ . '/html_private/head.php';

if (array_key_exists('User', $_SESSION)) {
    session_destroy();
    unset($_SESSION);
    $_SESSION = array();
    $myConn->redirect('login.php');
}

?>