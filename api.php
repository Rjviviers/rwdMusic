<?php

require 'vendor/autoload.php';
require('html_private/head.php');

$session = new SpotifyWebAPI\Session(
    CLIENT_ID,
    CLIENT_SECRET,
    REDIRECT_URI
);

$options = [
    'scope' => [
        'playlist-read-private',
        'user-read-private',
        'playlist-modify-public',
        'playlist-modify-private',
        'playlist-read-collaborative'
    ],
];




header('Location: ' . $session->getAuthorizeUrl($options));
die();