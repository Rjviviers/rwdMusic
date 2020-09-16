<?php
include __DIR__. '/html_private/head.php';
//html_private\head.php
$userID = $_SESSION['User']->GetID();
$pwd = $_POST['pwd'];
$myConn->updatePassword($userID, $pwd);
$myConn->redirect('userprofile.php?r=Worksithink');