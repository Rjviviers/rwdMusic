<?php
    require('vendor/autoload.php');
    require('html_private/conf.php');

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
    
    // Send the user along and fetch some data!
    header('Location: app.php');
    die();