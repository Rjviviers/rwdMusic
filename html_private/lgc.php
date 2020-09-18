<?php

if (!isset($_SESSION['User'])) {
    $myConn->redirect("login.php");
}