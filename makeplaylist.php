<?php
require 'vendor/autoload.php';
require('html_private/head.php');
include __DIR__ . '/partials/header.php';
include __DIR__ . '/html_private/lgc.php';

$list = $_SESSION['list'];
$songIDs = array();
$uris = array();

foreach ($list as $v) {
    $songIDs[] =  $v['SongID'];
}

foreach ($songIDs as $value) {
    $uris[] = $myConn->geturi($value);
}

foreach ($uris as $value) {
    echo $value . "</br>";
}