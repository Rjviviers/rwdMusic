<?php
require 'vendor/autoload.php';
require 'html_private/head.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/html_private/lgc.php';

// $api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from somewhere. A database for example.
// $api->setAccessToken($_COOKIE['spotify']);
// if (isset($_GET['song']) && $_GET['song'] != "") {
//     $song = $_GET['song'];
//     $track = $api->getTrack($song);
//     echo '<b>' . $track->name . '</b> - <b>' . $track->artists[0]->name . '</b><br>';
//     $imgsrc = $track->album->images[0]->url;
//     echo "<img src= '$imgsrc' height='150'>  ";
// }
// It's now possible to request data about the currently authenticated user

// var_dump($track);
// $uris = array();
// $newSongs = array();
// $tracks = array();
// $count = 1;
// $all = $myConn->allSongs();
// for ($i=399; $i < count($all) ; $i++) {
//     $newSongs[] = array("id" => $all[$i]["SongID"] ,"name" => $all[$i]["SongName"] . " " . $all[$i]["BandName"]);
// }

// foreach ($newSongs as $v) {
//     $results  = $api->search($v["name"], "track");
//     $id =  $v['id'];
//     foreach ($results->tracks->items as $key => $v) {
//         $uris[] = array("id"=>$id,"uri" => $v->uri);
//         break;
//     }
// }

// foreach ($uris as $v) {
//     // $myConn->addUri($v['id'], $v['uri']);
// }

// foreach ($uris as $v) {
//     $track = $api->getTrack($v);
//     $tracks = $track->name . " " . $track->artists[0]->name ;
// }

// var_dump($all);
//var_dump($uris);
?>
<!--
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
</table>-->
<?php

// echo "</br> images atr";
// foreach ($track->album->images as $key => $v) {
//     echo "<br> ". $key . " : " . print_r($v) . "</br>";
// }

// echo "</br> trac atr";
// foreach ($track as $key => $v) {
//     echo "<br> ". $key . "</br>";
// }

// foreach ($api->me() as $key => $v) {
//     echo $key . " : " . print_r($v) ."</br>";
// }
// Getting Spotify catalog data is of course also possible
// print_r(
//     $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb')
// );

// echo "GEt dump </br>";
// var_dump($_GET);
// echo "</br>sesh dump  </br>";
// var_dump($_SESSION);
// $uris = array();
//  $all =$myConn->allSongs();
// // var_dump($all);
// $songsRemain = [6,14,39,77,130,134,150,184,293,315,382,404,426,430,432,445,448,456,465,481,536,565,567,569,571,573,575,577,587,588];

// foreach ($songsRemain as $v) {
//     $results  = $api->search($v["name"], "track");
//     $id =  $v['id'];
//     foreach ($results->tracks->items as $key => $v) {
//         $uris[] = array("id"=>$id,"uri" => $v->uri);
//         break;
//     }
// }
// $playlistTracks = $api->getPlaylistTracks('1vOimaoGmDRWT1eGDmdP7R');
?>

<div class="container">



    <?php
if ($myConn->HasScore(547)) {
 echo "true";
} else {
 echo "false";
}

// var_dump($myConn->NeedToVote(547));
// var_dump($myConn->geturi(1));

// $i = $myConn->needVoteUserList(3);
// foreach ($i as $v) {
//     $id =  $v["SongID"];
//     $songname =   $v["SongName"] . " - " . $v["BandName"];
?>

    <?php

echo "<br>";
// }
// $dis  = $myConn->transferTable();
// //dis[i][0] = uri
// //dis[i][1] = id
// for ($i=0; $i < count($dis); $i++) {
//     $uri = $dis[$i][0];
//     $songID = $dis[$i][1];
//     $q = "UPDATE `spotdata` SET `uri` = '$uri' WHERE `spotdata`.`sngID` = $songID";
//     $myConn->InsertQuery($q);
// }
// $myConn->geturi(6);

// for ($i=0; $i < count($all) ; $i++) {
//     if ($myConn->checkIfHasUri($all[$i]['SongID'])) {
//     } else {
//         $songsRemain[] = $all[$i]['SongID'];
//     }
// }
// for ($i=0; $i < count($all) ; $i++) {
//     //echo var_dump($all[$i]);
//     $myConn->addSongID($all[$i]['SongID']);
//     // if (in_array($all[$i]['SongID'], $songsRemain)) {
//     //     $name =  $all[$i]["SongName"] . " " . $all[$i]["BandName"];
//     //     // $results  = $api->search($name, "track");
//     //     // foreach ($results->tracks->items as $key => $v) {
//     //     //     $myConn->addUri($all[$i]['SongID'], $v->uri);
//     //     //     echo "added ". $all[$i]['SongID'] . ": " . $v->uri;
//     //     //     break;
//     //     // }
//     // }
//     //
// }

// foreach ($playlistTracks->items as $track) {
//     $track = $track->track;

//     echo '<a href="' . $track->uri . '">' . $track->name . $track->artists[0]->name . '</a> <br>';
// }
// var_dump($newSongs);
// $api->addPlaylistTracks('1vOimaoGmDRWT1eGDmdP7R', [], "");
?>
</div>