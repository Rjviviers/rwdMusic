<?php
require 'vendor/autoload.php';
require 'html_private/head.php';
include __DIR__ . '/partials/header.php';
include __DIR__ . '/html_private/lgc.php';

if ($_GET['s'] == 1) {
 $list = $_SESSION['list2'];
 $x    = "HoH month 2021";
} elseif ($_GET['top'] == 1) {
 $list = $_SESSION['list3'];
 $x    = "HoH top 100";
} elseif($_GET['s'] == 2){
$list = $_SESSION['UserList'];
$x = "Personal Top 100 songs"; 
}else {
 $list = $_SESSION['list'];
 $x    = $myConn->GetUser($_COOKIE['User']) . " Catchup Playlist";
}
$songIDs = array();
$uris    = array();

?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="" method="post" class="pt-5">
                <label for="playlist">name for the playlist</label>
                <input type="text" name="playlist" placeholder="playlist name" value="<?=$x?>">
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
 // var_dump($v);
 if (isset($_GET['top'])) {
  $uri = $myConn->geturi($v['songid']);
  if ($uri != "na") {
   $uris[]    = $uri;
   $working[] = $v['Song'] . " added to playlist  </br>";
  } else {
   $notWorking[] = $v['Song'] . " <span style='color:red;'>has no uri </span> </br>";
  }
 } else {
  $uri = $myConn->geturi($v['SongID']);
  if ($uri != "na") {
   $uris[]    = $uri;
   $working[] = $v['SongName'] . " " . $v['BandName'] . " added to playlist  </br>";
  } else {
   $notWorking[] = $v['SongName'] . " " . $v['BandName'] . " <span style='color:red;'>has no uri </span> </br>";
  }
 }

}
if ($notWorking != null) {
 echo "<h4> songs with error </h4>";
 foreach ($notWorking as $v) {
  echo $v;
 }
}
foreach ($working as $v) {
 echo $v;
}
?>
        </div>
        <div class="col-3">
            <?php
if (isset($_POST["go"])) {
 if (!empty($_COOKIE['spotify'])) {
  $api = new SpotifyWebAPI\SpotifyWebAPI();
  $api->setAccessToken($_COOKIE['spotify']);
  $pName    = $_POST["playlist"];
  $playlist = $api->createPlaylist([
   'name' => $pName,
  ]);
  $me         = $api->me()->id;
  $playlistID = $playlist->id;

  foreach ($uris as $v) {
   $api->addPlaylistTracks($playlistID, [$v]);
  }

 }
}

?>
        </div>
    </div>




</div>