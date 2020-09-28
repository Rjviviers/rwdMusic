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
$expiring = $session->getTokenExpiration();
// Store the access and refresh tokens somewhere. In a database for example.
$access = array();
$access["accessToken"] =  $accessToken;
$access["refreshToken"] = $refreshToken;
setcookie("spotify", $access, $expiring);

echo "<script>window.location.href='index.php';</script>";
exit;