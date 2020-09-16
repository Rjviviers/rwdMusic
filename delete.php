<?php
include __DIR__ . '/html_private/head.php';
$id = $_GET['id'];
if ($_SESSION["User"]->GetID()== 2) {
    $myConn->DeleteSong($id);
}

$myConn->redirect('index.php');