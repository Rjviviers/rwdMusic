<?php

if (!isset($_COOKIE['User'])) { 
    try {
        $myConn->redirect("login.php");
    } catch (Throwable $th) {
        $vardump = $th;
        die();
    }
}