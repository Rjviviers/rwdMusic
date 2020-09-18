<?php

require 'vendor/autoload.php';
require('html_private/head.php');

$session = new SpotifyWebAPI\Session(
    CLIENT_ID,
    CLIENT_SECRET,
    REDIRECT_URI
);

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();

// Store the access and refresh tokens somewhere. In a database for example.
$_SESSION['accessToken'] = $accessToken;
$_SESSION['refreshToken'] = $refreshToken;
var_dump($_SESSION);


$api = new SpotifyWebAPI\SpotifyWebAPI();
// Fetch the saved access token from somewhere. A database for example.
$api->setAccessToken($_SESSION['accessToken']);

// It's now possible to request data about the currently authenticated user
print_r(
    $api->me()
);

// Getting Spotify catalog data is of course also possible
print_r(
    $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb')
);


// Send the user along and fetch some data!
$myConn->redirect("app.php");
die();