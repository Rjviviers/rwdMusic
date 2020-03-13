<?php
include __DIR__. '../html_private/head.php';
//html_private\head.php
updatePassword($userID, $pwd);
$myConn->redirect('userprofile.php?r=Worksithink');