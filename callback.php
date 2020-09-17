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
// Send the user along and fetch some data!
redirect('app.php');
die();