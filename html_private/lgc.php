<?php

if (!isset($_COOKIE['User'])) {
    $myConn->redirect("login.php");
}
