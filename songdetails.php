<?php
require 'vendor/autoload.php';
include __DIR__ . '/html_private/head.php';
// include 'html_private/Song.php';

$id   = filter_var($_GET["ID"], FILTER_SANITIZE_NUMBER_INT);
$song = $myConn->SelectQuery("SELECT * FROM `song` WHERE `SongID` = $id");
// var_dump($song);
$songObj = new Song(
    $song['SongID'],
    $song['SongName'],
    $song['BandName'],
    $song['WeekGroup'],
    $song['DatePosted'],
    $song['Submited_by']
);

if (!isset($_COOKIE['User'])) {
    ?>
<title><?=filter_var($songObj->GetSpotifySearch(), FILTER_SANITIZE_STRING);?></title>
<meta property="og:title" content="<?=$songObj->GetSpotifySearch()?>" />
<meta property="og:image" content="<?=$myConn->getImg($songObj->SongID)?>">
<a href="login.php">Please log in</a>

<?php
// var_dump($song);
    include "login.php";
    die();
}

// $id = $_GET["ID"];

$userID = $_COOKIE["User"];
// $song = $myConn->SelectQuery("SELECT * FROM `song` WHERE `SongID` = $id");
//$month = $song['WeekGroup'];
$tempStor = explode('.', $song['WeekGroup']);
$month    = $tempStor[2] . "." . $tempStor[1];

$dateArr = explode("-", $song["DatePosted"]);
$dateVal = "20." . $dateArr[1];
if (isset($_POST["submit"])) {
    $score = ($_POST["sc1"] * 20) / 100;
    $myConn->RateSong($id, $userID, $score);
    $myConn->redirect("month.php?month=$month");
}

if (isset($_POST["submitChange"])) {
    $score = ($_POST["sc1"] * 20) / 100;
    $myConn->changeVote($id, $userID, $score);
    // $myConn->updateVote($RateID, $userID, $score);
    // $myConn->redirect("month.php?month=$month");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$songObj->GetSpotifySearch();?> </title>
    <meta property="og:title" content="<?=$song["SongName"] . " " . $song["BandName"]?>" />
    <meta property="og:image" content="<?=$myConn->getImg($song["SongID"])?>">
    </script>
    <?php
include __DIR__ . '/partials/header.php';
?>
    <link rel="stylesheet" href="css\card.css">
    <style>
    .mt-3 label {
        margin-bottom: 0px !important;
    }
    </style>
    <script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        alert("song name copied");
    }

    function ChangeVote() {
        document.getElementById("changevote").classList.toggle("hide");
        var btnC = document.getElementById("btnChang");
        if (btnC.value == "Change Vote") {
            btnC.value = "hide";
        } else {
            btnC.value = "Change Vote";
        }
        var changeSlideOld = document.getElementById("myRange2");
        var output = document.getElementById("demo2");
        output.innerHTML = changeSlideOld.value;
        changeSlideOld.oninput = function() {
            output.innerHTML = this.value;
        }
    }


    </script>

<!-- <iframe width="949" height="534" src="https://www.youtube.com/embed/xFAVVjBrgKM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
    <input class="d-none d-print-block" type="text" value="<?=$songObj->GetSpotifySearch();?>" id="songnamed">
    <div class="container-fluid pt-5">
        <div class="p-sm-0">
            <div class="row ">
                <div class="col-md-8">
                    <div class="row" style="height: 400px;">
                        <div class="col-md-12 ">
                            <!-- <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/?listType=search&list=//$song["SongName"] . '+-+' . $song["BandName"];" autoplay='1'
                                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                <?php

if (!empty($_COOKIE['spotify'])) {
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $api->setAccessToken($_COOKIE['spotify']);
    $songIDForSpotCall = $song['SongID'];
    $spotSong          = $myConn->geturi($songIDForSpotCall);
    if ($spotSong == "na") {
        // $results  = $api->search($v["name"], "track");
        $results = $api->search($song["SongName"] . " " . $song["BandName"], "track");
        foreach ($results->tracks->items as $key => $v) {
            $spotSongname   = $v->name;
            $spotArtistname = $v->artists[0]->name;
            $full           = $songname . " - " . $artistname;
            $imgsrc         = $v->album->images[0]->url;
            $spotSong       = $v->uri;
            $myConn->addUri($song['SongID'], $spotSong);
            $myConn->addimage($song['SongID'], $imgsrc);
            break;
        }
    } else {
        $track          = $api->getTrack($spotSong);
        $spotSongname   = $track->name;
        $spotArtistname = $track->artists[0]->name;
        $full           = $spotSongname . " - " . $spotArtistname;
        $imgsrc         = $track->album->images[0]->url;
    }?>
                        <div style="display: none;">
                            <?php
echo " track ";
    var_dump($track);
    echo " song string in api call ";
    var_dump($song["SongName"] . " " . $song["BandName"]);
    echo " spotsong name var ";
    var_dump($spotSongname);
    echo " spotsong artist var ";
    var_dump($spotArtistname);

    echo " should be a uri or null ";
    var_dump($spotSong); ?>
                        </div>
                        
                    </div>
                            <a href="<?=$spotSong?>">
                                <img width="100%" src="<?=$imgsrc?>" alt="<?=$full?>">
                            </a>
                        
                     
                    </div>
                    <?php
}
else{
    $myConn->getImage($song['SongID']);
}
?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5><?=$myConn->GetMonthText($dateVal)?>, <?=$dateArr[2]?></h5>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-warning " onclick="copyToClipboard(headingsongname)"
                                data-toggle="tooltip" data-placement="bottom" title="Copy song text for share">
                                SHARE
                            </button>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">

                            <button class="btn btn-dark " onclick="copyToClipboard(headingsongname)"
                                data-toggle="tooltip" data-placement="top" title="Copy song text for share">
                                <h3 id="headingsongname"><?=$song["SongName"]?> - <?=$song["BandName"]?></h3>
                            </button>
                        </div>
                        <script>
                        function copytext() {

                            var copyTextw = document.getElementById("songnamed");
                            copyTextw.select();
                            copyTextw.setSelectionRange(0, 99999); /*For mobile devices*/
                            document.execCommand("copy");
                            alert("Song Name Copied To clip board");
                        }

                        function outFunc() {
                            var tooltip = document.getElementById("myTooltip");
                            tooltip.innerHTML = "Copy to clipboard";
                        }
                        </script>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="author"><img src="https://via.placeholder.com/25" />
                                <div style="padding-top: 6px;padding-left: 3em;margin: 7%;">
                                    <?=$myConn->GetUser($song["Submited_by"])?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><?php
if ($myConn->HasScore($song['SongID'])) {
    $songScore = $myConn->GetSingleSongTotal($song['SongID']);
    echo "<h3> Total : " . $songScore["Total"] . "</h3>";
} else {
    $needtovote = $myConn->NeedToVote($song['SongID']);
    // var_dump($needtovote);
    if ($needtovote == false) {
        echo "<h4 class='capt'> no votes needed</h4> ";
        $myConn->GenerateTotal($song['SongID']);
    } else {
        echo "<h4 class='capt'> ";
        $x = count($needtovote);
        if ($x == 1) {
            echo $needtovote[0];
        } elseif ($x == 2) {
            echo $needtovote[0] . " and " . $needtovote[1];
        } elseif ($x == 3) {
            echo $needtovote[0] . ", " . $needtovote[1] . " and " . $needtovote[2];
        } else {
            foreach ($needtovote as $v) {
                echo $v . ", ";
            }
        }
        echo " Still needs to vote on this song</h4>";
    }

    if ($myConn->UserVotedOnSong($song['SongID'], $userID)) {
        echo "<h4> you have already voted on this song </h4>";?>
                                <input type="button" class="btn btn-warning form-control" id="btnChang"
                                    onclick='ChangeVote()' value="Change Vote">


                            <div id="changevote" class="hide">
                                <form method="post" class="mt-3">
                                    <?php include __DIR__ . "/views/sliderView.html";?>
                                    <button name="submitChange" type="submit" value="" class="cardbuttondeets"><i
                                            class="fas fa-check"></i></button>
                                </form>
                            </div>
                            <?php
} else {
        ?>
                            <form method="post" class="mt-3">
                                <?php include __DIR__ . "/views/sliderView.html";?>
                                <button name="submit" type="submit" value="" class="cardbuttondeets"><i
                                        class="fas fa-check"></i></button>
                            </form>
                            <?php
}
}
?>
                            </p>
                        </div>
                    </div>
                    <div class="row">


                </div>
            </div>
        </div>
    </div>
    <footer class="footer">


    </footer>
    </body>

    <script src="js/app.js"></script>

</html>