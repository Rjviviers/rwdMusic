<?php
// include __DIR__ . '/html_private/head.php';

// if (array_key_exists('User', $_SESSION) || array_key_exists('User', $_COOKIE)) {
//  session_destroy();
//  unset($_SESSION);
//  $_SESSION = array();
//  setcookie("User", "", time() - 3600);
//  setcookie("Uname", "", time() - 3600);
//  $myConn->redirect('login.php');
// }

session_start();

require "Util.php";
$util = new Util();

//Clear Session
$_SESSION["member_id"] = "";
session_destroy();

// clear cookies
$util->clearAuthCookie();

header("Location: ./");
?>