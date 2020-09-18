<?php

require_once 'DBCon.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['User'])) {
    $myConn->redirect("login.php");
}

global $errorMessages;

$errorMessages = array();

$myConn = new DBCon(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$myConn->Connect();