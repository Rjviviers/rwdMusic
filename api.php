<?php
 namespace Audeio\Spotify;

    require('vendor/autoload.php');
    
   

    use Audeio\Spotify\Oauth2\Client\Provider\Spotify;
    use League\OAuth2\Client\Grant\RefreshToken;

    $api= new API();
    $accessToken;

    $oauthP = new Spotify(array(
        'clientId' => getenv('15eb0efcd4b64909a462e68c8a34ff66'),
        'clientSecret' => getenv('9729a66cde744abaa4ba190d6424b3ee'),
        'redirectUri' => 'https://www.rwdmusic.co.za/api.php?test=helo'
    ));

    self::$accessToken = $oauthP->getAccessToken(new RefreshToken(), array('refresh_token'=> getenv("SPOTIFY_REFRESH_TOKEN")))->accessToken;

    $api->setAccessToken(self::$accessToken);



    // $api->getCurrentUser();



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