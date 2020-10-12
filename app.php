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
$uris = array();
$newSongs = array();
$tracks = array();
$count = 1;
$all = $myConn->allSongs();
for ($i=518; $i < count($all) ; $i++) {
    $newSongs[] = $all[$i]["SongName"] . " " . $all[$i]["BandName"];
}

// foreach ($newSongs as $v) {
//     $results  = $api->search($v, "track");
//     foreach ($results->tracks->items as $key => $value) {
//         $uris[] = $value->uri;
//     }
// }

$uris = array(['3MIbTPWQAWoMd4mZSEbXZy',
'6FRceeuFgcgbc1cxNrO0Uv',
'3JWjgoNMtpIe8nvE3lwVGq',
'6tRowT2pnZTuCrEfugmRAz',
'22nVp6Cwl9tfi4zQB49NnM',
'0AeEVMD69lQ8TrOrGN1Ptd',
'5gG8OCaxvgtIWylVAsGxEB',
'5JecEbJCf26qEYQAZ9RRJT',
'6IF7vSafOdYl8zbCnCjkNy',
'15k4u3tnwOipZCOvlEJGSW',
'48xT4d4HsAmRorCaQC8Uvg',
'5ZTeRdQNYMUX1Xf6do5RHS',
'5Bwa28GGOza1OLn5AjRn3S',
'1trl33zHgcajq6di6H8dGU',
'1JlBCC34lBhHBRhG3RNpX1',
'6KuHU7yQVjQxnH3DCZpGbm',
'1cIHntikYpc3se0lk7jVZQ',
'5nLpGh1meGy4zflPju2quJ',
'119uT7aeKxC1k9XqB9JB1w',
'6RCRQr7ZhjCtDXDXpJb4l0',
'1y8EEqXNbi7LtBpPLMPRui',
'5Ouuz2mxQIsBMC51fhVAbS',
'1qNTAKVCP5A3W8uglknpEO',
'1JrVepLXBeDbDBuWLy3uVn',
'7iS1muEupjZ1JM7SiB4dBM',
'1JbhQxzTex97qctI0l2Ihc',
'1gXqefDws7eIVATgyTkdAk',
'2ShT6ycxVmAVVF9qhevpEB',
'4bjPOEqQm8Y3YAj5bdPivz',
'0FiVVxIM4BIC2e3HCAnYzF',
'6fcCyQ9uKBiwGkF6OYtkJP',
'7lNxFFas6XLDz2pGSTSd0i',
'5bRd3DF04r4vCZjFefBGVe',
'6sZWP4l2zgHz5qpaTvda9M',
'6T2UOeMDrw45jrU5f8yn2i',
'1t4c0GbrYLvOGd6LuzVqkw',
'6gYxB6cyA0NyQdHqkwlajN',
'2fkhqGGwcr2rc4c6DpIdLo',
'3AWvBqZLIarePVVbJKxaZL',
'2pKCG9n6lszQw8yABVhUIG',
'3qnXMhTy7TCVXNN8jf29t5',
'6mGQXpf6ESEb0qVHpuA5Kg',
'6wQ8Kf2vDas39vKmkQbCUz',
'2H6txWVNy08LZYGmkHU511',
'0sSaGJ6KOJC6MR3yFTq5J8',
'4ceI4eX2s0u2a6reHbp5Zi',
'1n8086m9YRhM03VV1YrIBz',
'0i85WIUnWWn40iDg0G0m1h',
'5MixpJvbUqk0ofHuLwR8GS',
'1SHfbdTOsjJVYQ55DkQW0K',
'4UUZ6q9fMXFH4WG6SJ2mQP',
'72h5NeNhL2l5Y8g3qdm1p0',
'0UL7f8qPcJvZjvDh43rbM2',
'1owthp3iKcZh4FmStOATX8',
'4xQH1jhaWeEbPaxN97CYDC',
'2N2q2P0N86ZNS6mKYXoojf',
'7os53rdrgA0OU6xC5xJruX',
'5YjhusJckZi0FNOM9QuTgt',
'5B30Z6H5SN5SN5KQkf5bY1',
'7oMaBQLvCvpak6O70OiDIX',
'0gmSsONL7tQMuuHpn8gG51',
'4RNO3zu95wDh2TNLKzNmlM',
'5XekbPVnLWx2nePqUfa6JX',
'4B0kB0hZMxRAZXW9aj1lbu',
'2x8TuEwczXvMaKpBcOgnuK',
'2PXFNb8kldrEsBdL5mbICz',
'78aBgHLpKp5JoSXCesuLRn',
'7fQox8Ere1HDm0jhSnsFHu',
'7t1hQxIVvSUj9rk61unSEM',
'2aaFVNN3vmAfa1suHGvaca',
'04wQihmsNybAPlIEcTZDXe',
'44ZS1kdixKTXKacTn5S5Ys',
'1tUi09kHRH8RSnEf9a5sXy',
'6XX4PADNEozJ7jg1Gzqkqw',
'2GZE4KzgBdkbQD5sgq1kM5',
'3q86qbolqN76G77QuwbIV8',
'4x5pQlUdPYEHj7Kc7Bvwlw',
'0yo3Oubz5nriK1CL6KvXQ2',
'1VSuFS7PahCN3SWbOcQ98m',
'1UJvaNw3UufXObCph26Li9',
'1BUt6SbfoHn0WzKFb2s6dI',
'3aYV0Bk3yD6u8yfRZAr9fi',
'39kp0jbq52k36Il5Vh5Co6',
'2pIQwbHHOyUjfYYX06yXB9',
'6jWB3RWl9tfWWlL67lYj5Y',
'6rNiWKTZCbl5Oa5yqBr0wK',
'4vD5w1VcG0kUYvHyFv6w9O',
'4jqZ0VPkfs69FqlA61fV6C',
'2LK8Zl4RpFM92UzB8glYQF',
'10OpqOar2UEJRqeZbaS7BN',
'2yE1NFHN1064TJ6T1DEGbl',
'0PidxejEFS3aTt1jleQyco',
'33X1ycMycrh1HaklcGbtx0',
'6oFytjSHJyFQFq084Ar2Ti',
'63YuzHg9Remycw6rXxF4Pn',
'4QQ51iHnMPxt2g2P472JS2',
'0rkGzISxVaqpRad7NAe7G5',
'6PqmuXpV3uGglVIFMHXS0M',]);

foreach ($uris as $value) {
    $track = $api->getTrack($value);
    $tracks = $track->name . " " . $track->artists[0]->name ;
}





// var_dump($all);
//var_dump($uris);
?>

<table class="">
    <thead>
        <tr>
            <th>original</th>
            <th>spotify</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($newSongs as $v) {
                ?>
        <tr>
            <?php
                echo "<td> $v </td>";
            }
            foreach ($tracks as $v) {
                echo "<td> $v </td>";
            }
            // foreach ($tracks2->tracks as $tracks) {
            //     echo '<td><b>' . $track->name . '</b> <b>' . $track->artists[0]->name . '</b> <br></td>';
            // }

            ?>
        </tr>
        <?php
            ?>
    </tbody>
</table>
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