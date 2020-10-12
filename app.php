<?php
require 'vendor/autoload.php';
require('html_private/head.php');
include __DIR__ . '/partials/header.php';
include __DIR__ . '/html_private/lgc.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from somewhere. A database for example.
$api->setAccessToken($_COOKIE['spotify']);
// if (isset($_GET['song']) && $_GET['song'] != "") {
//     $song = $_GET['song'];
//     $track = $api->getTrack($song);
//     echo '<b>' . $track->name . '</b> - <b>' . $track->artists[0]->name . '</b><br>';
//     $imgsrc = $track->album->images[0]->url;
//     echo "<img src= '$imgsrc' height='150'>  ";
// }
// It's now possible to request data about the currently authenticated user

// var_dump($track);
$uris = array();
$newSongs = array();
$tracks = array();
$count = 1;
$all = $myConn->allSongs();
for ($i=0; $i < 100 ; $i++) {
    $newSongs[] = array("id" => $all[$i]["SongID"] ,"name" => $all[$i]["SongName"] . " " . $all[$i]["BandName"]);
}

foreach ($newSongs as $v) {
    $results  = $api->search($v["name"], "track");
    $id =  $v['id'];
    foreach ($results->tracks->items as $key => $value) {
        $uris[] = array("id"=>$id,"uri" => $value->uri);
        break;
    }
}

foreach ($uris as $v) {
    // $myConn->addUri($v['id']);
}


// foreach ($uris as $value) {
//     $track = $api->getTrack($value);
//     $tracks = $track->name . " " . $track->artists[0]->name ;
// }





// var_dump($all);
var_dump($uris);
?>

<table class="">
    <thead>
        <tr>
            <th>original</th>
            <th>spotify</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // foreach ($newSongs as $v) {
                ?>
        <tr>
            <?php
                // echo "<td> $v </td>";
            // }
            // foreach ($tracks as $v) {
                // echo "<td> $v </td>";
            // }
            // foreach ($tracks2->tracks as $tracks) {
            //     echo '<td><b>' . $track->name . '</b> <b>' . $track->artists[0]->name . '</b> <br></td>';
            // }

            ?>
        </tr>
        <?php
            ?>
    </tbody>
</table>
<?php

// echo "</br> images atr";
// foreach ($track->album->images as $key => $value) {
//     echo "<br> ". $key . " : " . print_r($value) . "</br>";
// }

// echo "</br> trac atr";
// foreach ($track as $key => $value) {
//     echo "<br> ". $key . "</br>";
// }

// foreach ($api->me() as $key => $value) {
//     echo $key . " : " . print_r($value) ."</br>";
// }
// Getting Spotify catalog data is of course also possible
// print_r(
//     $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb')
// );


// echo "GEt dump </br>";
// var_dump($_GET);
// echo "</br>sesh dump  </br>";
// var_dump($_SESSION);