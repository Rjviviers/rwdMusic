<?php
     include __DIR__ . '/html_private/head.php';
     require 'vendor/autoload.php';

    // // include __DIR__ . '\html_private\Song.php';
    $all = $myConn->allSongs();
    foreach ($all as $value) {
        // $results  = $api->search($value->GetSpotifySearch(), "track");
        //echo $value->GetSpotifySearch();
        var_dump($all);
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