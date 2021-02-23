<?php 
include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';

$user = $_COOKIE["User"];

$_SESSION['UserList'] = $myConn->MakeUserFavList($user);
$myConn->redirect('makeplaylist.php?s=2');

