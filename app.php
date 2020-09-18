<?php
require 'vendor/autoload.php';
require('html_private/head.php');
$api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from somewhere. A database for example.
$api->setAccessToken($_SESSION['accessToken']);

// It's now possible to request data about the currently authenticated user
$track = $api->getTrack('4wkNbCituY2LtDKRbgoqH5');

echo '<b>' . $track->name . '</b> by <b>' . $track->artists[0]->name . '</b>';
var_dump($track->images);

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