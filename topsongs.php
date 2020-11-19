<?php 
include "html_private/head.php";

$list = $myConn->getTopSongs(100);
$_SESSION['list'] = $list;

$myConn->redirect("makeplaylist.php");