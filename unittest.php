<?php
     include __DIR__ . '/html_private/head.php';
     require 'vendor/autoload.php';

    // // include __DIR__ . '\html_private\Song.php';
//     $uris = array();
// $count = 1;
// $all = $myConn->allSongs();
// foreach ($all as $k => $v) {
//     $str = $v["SongName"]. " " . $v["BandName"] ;
//     echo $count ." : ".$str;
//     echo "<br>";
//     $count++;
//     // $results  = $api->search($str, "track");
//     // foreach ($results->tracks->items as $key => $value) {
//     //     $uris[] = $value->uri;
//     // }
// }
// $uris = array();
// $newSongs = array();

// $count = 1;
// $all = $myConn->allSongs();
// for ($i=518; $i < count($all) ; $i++) {
//     $newSongs[] = $all[$i]["SongName"] . " " . $all[$i]["BandName"];
// }
// //var_dump($newSongs);
// foreach ($newSongs as $v) {
//     echo $v . " </br>";
// }

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

$uris = array();
$newSongs = array();
$tracks = array();
$count = 1;
$all = $myConn->allSongs();
for ($i=0; $i <= 100 ; $i++) {
    $newSongs[] = array("id" => $all[$i]["SongID"] ,"name" => $all[$i]["SongName"] . " " . $all[$i]["BandName"]);
}
foreach ($newSongs as $value) {
    echo $value['id'] . " : " . $value["name"];
    echo "</br>";
}