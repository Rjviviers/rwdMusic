<?php
    require('vendor/autoload.php');

    $provider = new Kerox\OAuth2\Client\Provider\Spotify([
        'clientId'     => '15eb0efcd4b64909a462e68c8a34ff66',
        'clientSecret' => '9729a66cde744abaa4ba190d6424b3ee',
        'redirectUri'  => 'https://rwdmusic.co.za/api.php',
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
    } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
        echo 'Invalid state.';
        exit;
    }
    
    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
    
    // Optional: Now you have a token you can look up a users profile data
    try {
    
        // We got an access token, let's now get the user's details
        /** @var \Kerox\OAuth2\Client\Provider\SpotifyResourceOwner $user */
        $user = $provider->getResourceOwner($token);
    
        // Use these details to create a new profile
        printf('Hello %s!', $user->getDisplayName());
        
        echo '<pre>';
        var_dump($user);
        echo '</pre>';
    } catch (Exception $e) {
    
        // Failed to get user details
        exit('Damned...');
    }
    
    echo '<pre>';
    // Use this to interact with an API on the users behalf
    var_dump($token->getToken());
    # string(217) "CAADAppfn3msBAI7tZBLWg...
    
    // The time (in epoch time) when an access token will expire
    var_dump($token->getExpires());
    # int(1436825866)
    echo '</pre>';



    // function callAPI($method, $url, $data, $auth)
    // {
    //     $curl = curl_init();
    //     switch ($method) {
    //         case "POST":
    //            curl_setopt($curl, CURLOPT_POST, 1);
    //            if ($data) {
    //                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //            }
    //            break;
    //         case "PUT":
    //            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    //            if ($data) {
    //                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //            }
    //            break;
    //         default:
    //            if ($data) {
    //                $url = sprintf("%s?%s", $url, http_build_query($data));
    //            }
    //      }
    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    //         "Authorization: Bearer $auth",
    //         "Content-Type: application/json" ,
    //         "Accept: application/json",
    //      ));
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     // EXECUTE:
    //     $result = curl_exec($curl);
    //     if (!$result) {
    //         die("Connection Failure");
    //     }
    //     curl_close($curl);
    //     return $result;
    // }
    // $response =  callAPI("GET", "https://api.spotify.com/v1/tracks/0VjIjW4GlUZAMYd2vXMi3b?market=us", false);
    // if ($response["error"] != null) {
    // }
    // printf($response);