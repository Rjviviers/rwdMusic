<?php
require 'vendor/autoload.php';
require('html_private/head.php');
include __DIR__ . '/partials/header.php';
include __DIR__ . '/html_private/lgc.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();

$data2 = " asdasdfaf-sda's/ ";

function valid2($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    preg_replace('/[^A-Za-z0-9\-]/', '', $data);
    return $data;
}
echo valid2($data2);
// Fetch the saved access token from somewhere. A database for example.
$api->setAccessToken($_SESSION['accessToken']);
if (isset($_GET['song']) && $_GET['song'] != "") {
    $song = $_GET['song'];
    $track = $api->getTrack($song);
    echo '<b>' . $track->name . '</b> - <b>' . $track->artists[0]->name . '</b><br>';
    $imgsrc = $track->album->images[0]->url;
    echo "<img src= '$imgsrc' height='150'>  ";
}
// It's now possible to request data about the currently authenticated user

?>


<form method="get">
    <input type="text" name="song">
    <input type="submit" value="go">
</form>


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