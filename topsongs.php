<?php
include "html_private/head.php";

$list              = $myConn->getTopSongs(100);
$_SESSION['list3'] = $list;
// var_dump($list);
// die();
$myConn->redirect("makeplaylist.php?top=1");
