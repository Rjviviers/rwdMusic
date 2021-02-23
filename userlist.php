<?php 
include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';

$user = $_COOKIE["User"];

$userlist = $myConn->MakeUserFavList($user);
