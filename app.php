<?php
require 'vendor/autoload.php';
require('html_private/head.php');
include __DIR__ . '/partials/header.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from somewhere. A database for example.
$api->setAccessToken($_SESSION['accessToken']);
if (isset($_GET['go'])) {
    $track = $api->getTrack($_GET['song']);
    echo '<b>' . $track->name . '</b> by <b>' . $track->artists[0]->name . '</b><br>';
    $imgsrc = $track->album->images[0]->url;
    echo "<img src= '$imgsrc' >  ";
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