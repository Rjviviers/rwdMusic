<?php
     include __DIR__ . '/html_private/head.php';
     require 'vendor/autoload.php';

    // // include __DIR__ . '\html_private\Song.php';
    $str = "";
    $all = $myConn->allSongs();
    foreach ($all as $k => $v) {
        //
        // var_dump($value);
        $str = $v["SongName"]. " " . $v["BandName"] ;
        $results  = $api->search($value->GetSpotifySearch(), "track");
        // foreach ($value as $key => $v) {
        echo $str;
        // }
        //
        echo "</br>";
    }
    // $ss->getUri();
    // $var = $myConn->geturi($IDp);
//    var_dump($var);



//      function createuri($id)
//      {
//          $api = new SpotifyWebAPI\SpotifyWebAPI();
//          if ($_COOKIE['spotify'] != "") {
//              $myConn->redirect("api.php");
//          } else {
//              $api->setAccessToken($_COOKIE['spotify']);
//          }
//      }

//    $x = $myConn->allSongs();
//    foreach ($x as $key => $value) {
//        foreach ($value as $key => $value) {
//            //    echo $key. " : ". $value;
//            echo "</br>";
//        }
//        echo "</br>";
//    }