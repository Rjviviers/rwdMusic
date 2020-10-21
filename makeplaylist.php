<?php
require 'vendor/autoload.php';
require('html_private/head.php');
include __DIR__ . '/partials/header.php';
include __DIR__ . '/html_private/lgc.php';

$list = $_SESSION['list'];
$songIDs = array();
$uris = array();
?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="" method="post" class="pt-5">
                <label for="playlist">name for the playlist</label>
                <input type="text" name="playlist" placeholder="playlist name"
                    value="<?= $myConn->GetUser($_COOKIE['User']) . " Catchup Playlist" ?>">
                <input type="submit" name="go" value="Make Playlist">
            </form>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <?php
            foreach ($list as $v) {
                $uri = $myConn->geturi($v['SongID']);
                if ($uri != "na") {
                    $uris[] = $uri;
                    echo $v['SongName'] . " " . $v['BandName'] . " added to playlist  </br>";
                } else {
                    echo $v['SongName'] . " " . $v['BandName'] . " <span style='color:red;'>has no uri </span> </br>";
                }
            }
            ?>
        </div>
        <div class="col-3">
            <?php
            if (isset($_POST["go"])) {
                if (!empty($_COOKIE['spotify'])) {
                    $api = new SpotifyWebAPI\SpotifyWebAPI();
                    $api->setAccessToken($_COOKIE['spotify']);
                    $pName = $_POST["playlist"];
                    $api->createPlaylist([
                        'name' => $name,
                    ]);
                    $me = $api->me();

                    var_dump($me);
                    // $playlists = $api->getUserPlaylists('USER_ID', [
                    //     'limit' => 5
                    // ]);

                    // foreach ($playlists->items as $playlist) {
                    //     echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a> <br>';
                    // }
                }
            }

            ?>
        </div>
    </div>




</div>