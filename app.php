<?php
require 'vendor/autoload.php';
require('html_private/head.php');
$api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from somewhere. A database for example.
$api->setAccessToken($_SESSION['accessToken']);

// It's now possible to request data about the currently authenticated user
// print_r(
//     $api->me()
// );

foreach ($api->me() as $key => $value) {
    echo $key . " : " . print_r($value) ."</br>";
}
// Getting Spotify catalog data is of course also possible
print_r(
    $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb')
);


// echo "GEt dump </br>";
// var_dump($_GET);
// echo "</br>sesh dump  </br>";
// var_dump($_SESSION);