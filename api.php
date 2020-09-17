<?php
    require('vendor/autoload.php');
    require('html_private/conf.php');

    $session = new SpotifyWebAPI\Session(
        CLIENT_ID,
        CLIENT_SECRET,
        REDIRECT_URI
    );

    $options = [
        'scope' => [
            'playlist-read-private',
            'user-read-private',
        ],
    ];


    $session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();

// Store the access and refresh tokens somewhere. In a database for example.
$_SESSION['accessToken'] = $accessToken;
$_SESSION['refreshToken'] = $refreshToken;
var_dump($_SESSION);
print_r(
    $session->me()
);

// Getting Spotify catalog data is of course also possible
print_r(
    $session->getTrack('7EjyzZcbLxW7PaaLua9Ksb')
);

    // header('Location: ' . $session->getAuthorizeUrl($options));
    // die();