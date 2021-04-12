<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'DBCon.php';

global $errorMessages;

$errorMessages = array();

$myConn = new DBCon(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$myConn->Connect();