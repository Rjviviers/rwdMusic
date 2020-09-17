<?php
    require('vendor/autoload.php');
    require('html_private/conf.php');
    require('html_private/head.php');

    $session = new Kerox\OAuth2\Client\Provider\Spotify([
        'clientId' => CLIENT_ID,
        'clientSecret' => CLIENT_SECRET,
        'redirectUri' => REDIRECT_URI,
    ]);
    
      
    // Request a access token using the code from Spotify
    $session->requestAccessToken($_GET['code']);
    
    $accessToken = $session->getAccessToken();
    $refreshToken = $session->getRefreshToken();
    
    // Store the access and refresh tokens somewhere. In a database for example.
    $_SESSION['AccessToken'] = $accessToken;
    $_SESSION['RefreshToken'] = $refreshToken;
    
    // Send the user along and fetch some data!
    header('Location: app.php');
    die();