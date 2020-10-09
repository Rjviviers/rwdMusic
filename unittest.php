<?php
    include 'html_private/head.php';
    include 'html_private/song.php';
    $ID = 9999;
    $SongName = "";
    $BandName = "";
    $WeekGroup = "";
    $Dateposted = time();
    $PostedByUser = 2;
    $song = new Song($ID, $SongName, $BandName, $WeekGroup, $Dateposted, $PostedByUser);
    $song->getUri();