<?php
if (!isset($_COOKIE['User'])) { 
    
    $myConn->redirect("login.php");
   
}else{
    $myConn->redirect("index.php");
}