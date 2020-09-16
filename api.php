<?php
    require('vendor/autoload.php');

    $provider = new Kerox\OAuth2\Client\Provider\Spotify([
        'clientId' => '15eb0efcd4b64909a462e68c8a34ff66',
        'clientSecret' => '9729a66cde744abaa4ba190d6424b3ee',
        'redirectUri' => 'https://www.rwdmusic.co.za/api.php',
    ]);
    
    if (!isset($_GET['code'])) {
        // If we don't have an authorization code then get one
        $authUrl = $provider->getAuthorizationUrl([
            'scope' => [
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_EMAIL,
            ]
        ]);
        
        $_SESSION['oauth2state'] = $provider->getState();
        
        header('Location: ' . $authUrl);
        exit;
    
        // Check given state against previously stored one to mitigate CSRF attack
    }

    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
    
    // Optional: Now you have a token you can look up a users profile data
    try {
        $user = $provider->getResourceOwner($token);
        printf('Hello %s!', $user->getDisplayName());
        echo "normal var";
        print_r($token);
        echo "method token";
        print_r($token->getToken());
        echo '<pre>';
        var_dump($user);
        echo '</pre>';
    } catch (Exception $e) {
    
        // Failed to get user details
        exit('Damned...');
    }