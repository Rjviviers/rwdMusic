<?php

include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';

$id = $_GET['id'];

if ($_COOKIE["User"]== 2) {
    $myConn->DeleteSong($id);
}



$myConn->redirect('index.php');
