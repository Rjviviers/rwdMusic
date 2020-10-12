<?php
require 'vendor/autoload.php';
require('html_private/head.php');
include __DIR__ . '/partials/header.php';
include __DIR__ . '/html_private/lgc.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from somewhere. A database for example.
$api->setAccessToken($_COOKIE['spotify']);
// if (isset($_GET['song']) && $_GET['song'] != "") {
//     $song = $_GET['song'];
//     $track = $api->getTrack($song);
//     echo '<b>' . $track->name . '</b> - <b>' . $track->artists[0]->name . '</b><br>';
//     $imgsrc = $track->album->images[0]->url;
//     echo "<img src= '$imgsrc' height='150'>  ";
// }
// It's now possible to request data about the currently authenticated user

// var_dump($track);
// $uris = array();
// $newSongs = array();
// $tracks = array();
// $count = 1;
// $all = $myConn->allSongs();
// for ($i=399; $i < count($all) ; $i++) {
//     $newSongs[] = array("id" => $all[$i]["SongID"] ,"name" => $all[$i]["SongName"] . " " . $all[$i]["BandName"]);
// }

// foreach ($newSongs as $v) {
//     $results  = $api->search($v["name"], "track");
//     $id =  $v['id'];
//     foreach ($results->tracks->items as $key => $value) {
//         $uris[] = array("id"=>$id,"uri" => $value->uri);
//         break;
//     }
// }

// foreach ($uris as $v) {
//     // $myConn->addUri($v['id'], $v['uri']);
// }


// foreach ($uris as $value) {
//     $track = $api->getTrack($value);
//     $tracks = $track->name . " " . $track->artists[0]->name ;
// }





// var_dump($all);
//var_dump($uris);
?>
<!-- 
<table class="">
    <thead>
        <tr>
            <th>original</th>
            <th>spotify</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // foreach ($newSongs as $v) {
                ?>
        <tr>
            <?php
                // echo "<td> $v </td>";
            // }
            // foreach ($tracks as $v) {
                // echo "<td> $v </td>";
            // }
            // foreach ($tracks2->tracks as $tracks) {
            //     echo '<td><b>' . $track->name . '</b> <b>' . $track->artists[0]->name . '</b> <br></td>';
            // }

            ?>
        </tr>
        <?php
            ?>
    </tbody>
</table>-->
<?php

// echo "</br> images atr";
// foreach ($track->album->images as $key => $value) {
//     echo "<br> ". $key . " : " . print_r($value) . "</br>";
// }

// echo "</br> trac atr";
// foreach ($track as $key => $value) {
//     echo "<br> ". $key . "</br>";
// }

// foreach ($api->me() as $key => $value) {
//     echo $key . " : " . print_r($value) ."</br>";
// }
// Getting Spotify catalog data is of course also possible
// print_r(
//     $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb')
// );


// echo "GEt dump </br>";
// var_dump($_GET);
// echo "</br>sesh dump  </br>";
// var_dump($_SESSION);
$uris = array();

$api->addPlaylistTracks('spotify:playlist:1vOimaoGmDRWT1eGDmdP7R', ['spotify:track:3MIbTPWQAWoMd4mZSEbXZy',
'spotify:track:6FRceeuFgcgbc1cxNrO0Uv',
'spotify:track:3JWjgoNMtpIe8nvE3lwVGq',
'spotify:track:6tRowT2pnZTuCrEfugmRAz',
'spotify:track:22nVp6Cwl9tfi4zQB49NnM',
'spotify:track:0AeEVMD69lQ8TrOrGN1Ptd',
'spotify:track:5gG8OCaxvgtIWylVAsGxEB',
'spotify:track:5JecEbJCf26qEYQAZ9RRJT',
'spotify:track:6IF7vSafOdYl8zbCnCjkNy',
'spotify:track:15k4u3tnwOipZCOvlEJGSW',
'spotify:track:48xT4d4HsAmRorCaQC8Uvg',
'spotify:track:5ZTeRdQNYMUX1Xf6do5RHS',
'spotify:track:5Bwa28GGOza1OLn5AjRn3S',
'spotify:track:1trl33zHgcajq6di6H8dGU',
'spotify:track:1JlBCC34lBhHBRhG3RNpX1',
'spotify:track:6KuHU7yQVjQxnH3DCZpGbm',
'spotify:track:1cIHntikYpc3se0lk7jVZQ',
'spotify:track:5nLpGh1meGy4zflPju2quJ',
'spotify:track:119uT7aeKxC1k9XqB9JB1w',
'spotify:track:6RCRQr7ZhjCtDXDXpJb4l0',
'spotify:track:1y8EEqXNbi7LtBpPLMPRui',
'spotify:track:5Ouuz2mxQIsBMC51fhVAbS',
'spotify:track:1qNTAKVCP5A3W8uglknpEO',
'spotify:track:1JrVepLXBeDbDBuWLy3uVn',
'spotify:track:7iS1muEupjZ1JM7SiB4dBM',
'spotify:track:1JbhQxzTex97qctI0l2Ihc',
'spotify:track:1gXqefDws7eIVATgyTkdAk',
'spotify:track:2ShT6ycxVmAVVF9qhevpEB',
'spotify:track:4bjPOEqQm8Y3YAj5bdPivz',
'spotify:track:0FiVVxIM4BIC2e3HCAnYzF',
'spotify:track:6fcCyQ9uKBiwGkF6OYtkJP',
'spotify:track:7lNxFFas6XLDz2pGSTSd0i',
'spotify:track:5bRd3DF04r4vCZjFefBGVe',
'spotify:track:6sZWP4l2zgHz5qpaTvda9M',
'spotify:track:6T2UOeMDrw45jrU5f8yn2i',
'spotify:track:1t4c0GbrYLvOGd6LuzVqkw',
'spotify:track:6gYxB6cyA0NyQdHqkwlajN',
'spotify:track:2fkhqGGwcr2rc4c6DpIdLo',
'spotify:track:3AWvBqZLIarePVVbJKxaZL',
'spotify:track:2pKCG9n6lszQw8yABVhUIG',
'spotify:track:3qnXMhTy7TCVXNN8jf29t5',
'spotify:track:6mGQXpf6ESEb0qVHpuA5Kg',
'spotify:track:6wQ8Kf2vDas39vKmkQbCUz',
'spotify:track:2H6txWVNy08LZYGmkHU511',
'spotify:track:0sSaGJ6KOJC6MR3yFTq5J8',
'spotify:track:4ceI4eX2s0u2a6reHbp5Zi',
'spotify:track:1n8086m9YRhM03VV1YrIBz',
'spotify:track:0i85WIUnWWn40iDg0G0m1h',
'spotify:track:5MixpJvbUqk0ofHuLwR8GS',
'spotify:track:1SHfbdTOsjJVYQ55DkQW0K',
'spotify:track:4UUZ6q9fMXFH4WG6SJ2mQP',
'spotify:track:72h5NeNhL2l5Y8g3qdm1p0',
'spotify:track:0UL7f8qPcJvZjvDh43rbM2',
'spotify:track:1owthp3iKcZh4FmStOATX8',
'spotify:track:4xQH1jhaWeEbPaxN97CYDC',
'spotify:track:2N2q2P0N86ZNS6mKYXoojf',
'spotify:track:7os53rdrgA0OU6xC5xJruX',
'spotify:track:5YjhusJckZi0FNOM9QuTgt',
'spotify:track:5B30Z6H5SN5SN5KQkf5bY1',
'spotify:track:7oMaBQLvCvpak6O70OiDIX',
'spotify:track:0gmSsONL7tQMuuHpn8gG51',
'spotify:track:4RNO3zu95wDh2TNLKzNmlM',
'spotify:track:5XekbPVnLWx2nePqUfa6JX',
'spotify:track:4B0kB0hZMxRAZXW9aj1lbu',
'spotify:track:2x8TuEwczXvMaKpBcOgnuK',
'spotify:track:2PXFNb8kldrEsBdL5mbICz',
'spotify:track:78aBgHLpKp5JoSXCesuLRn',
'spotify:track:7fQox8Ere1HDm0jhSnsFHu',
'spotify:track:7t1hQxIVvSUj9rk61unSEM',
'spotify:track:2aaFVNN3vmAfa1suHGvaca',
'spotify:track:04wQihmsNybAPlIEcTZDXe',
'spotify:track:44ZS1kdixKTXKacTn5S5Ys',
'spotify:track:1tUi09kHRH8RSnEf9a5sXy',
'spotify:track:6XX4PADNEozJ7jg1Gzqkqw',
'spotify:track:2GZE4KzgBdkbQD5sgq1kM5',
'spotify:track:3q86qbolqN76G77QuwbIV8',
'spotify:track:4x5pQlUdPYEHj7Kc7Bvwlw',
'spotify:track:0yo3Oubz5nriK1CL6KvXQ2',
'spotify:track:1VSuFS7PahCN3SWbOcQ98m',
'spotify:track:1UJvaNw3UufXObCph26Li9',
'spotify:track:1BUt6SbfoHn0WzKFb2s6dI',
'spotify:track:3aYV0Bk3yD6u8yfRZAr9fi',
'spotify:track:39kp0jbq52k36Il5Vh5Co6',
'spotify:track:2pIQwbHHOyUjfYYX06yXB9',
'spotify:track:6jWB3RWl9tfWWlL67lYj5Y',
'spotify:track:6rNiWKTZCbl5Oa5yqBr0wK',
'spotify:track:4vD5w1VcG0kUYvHyFv6w9O',
'spotify:track:4jqZ0VPkfs69FqlA61fV6C',
'spotify:track:2LK8Zl4RpFM92UzB8glYQF',
'spotify:track:10OpqOar2UEJRqeZbaS7BN',
'spotify:track:2yE1NFHN1064TJ6T1DEGbl',
'spotify:track:0PidxejEFS3aTt1jleQyco',
'spotify:track:33X1ycMycrh1HaklcGbtx0',
'spotify:track:6oFytjSHJyFQFq084Ar2Ti',
'spotify:track:63YuzHg9Remycw6rXxF4Pn',
'spotify:track:4QQ51iHnMPxt2g2P472JS2',
'spotify:track:0rkGzISxVaqpRad7NAe7G5',
'spotify:track:6PqmuXpV3uGglVIFMHXS0M',], "");