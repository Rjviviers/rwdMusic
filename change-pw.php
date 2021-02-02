<?php

include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';

//html_private\head.php

$userID = $_COOKIE['User'];

$pwd = $_POST['pwd'];

$myConn->updatePassword($userID, $pwd);

$myConn->redirect('userprofile.php?r=Worksithink');
