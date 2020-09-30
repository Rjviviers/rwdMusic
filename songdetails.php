<?php
include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';


$id = $_GET["ID"];
$userID = $_COOKIE["User"];
$song = $myConn->SelectQuery("SELECT * FROM `song` WHERE `SongID` = $id");
//$month = $song['WeekGroup'];
$tempStor =  explode('.', $song['WeekGroup']);
$month =$tempStor[2].".". $tempStor[1];

$dateArr = explode("-", $song["DatePosted"]);

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
    <title><?php echo  $song["SongName"]?> </title>
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
    function ChangeVote() {
        document.getElementById("changevote").classList.toggle("hide");
        var btnC = document.getElementById("btnChang");
        if (btnC.value == "Change Vote") {
            btnC.value = "Hide";
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

    <!-- new layout -->
    <div class="container-fluid pt-5">
        <div class="row ">
            <div class="col-md-8">
                <div class="row" style="height: 400px;">
                    <div class="col-md-12">
                        <iframe width="100%" height="100%"
                            src="https://www.youtube.com/embed/?listType=search&list=hello'&autoplay=1" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h1>09</h1>
                        <h6>september</h6>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        SHARE
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <h1>title</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span>submited by</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus saepe tempore provident iusto
                            cum
                            asperiores non velit quod in, labore expedita, eius error officiis alias delectus,
                            repudiandae at deleniti
                            fugit.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary">asdafaasfasfafasfafasf</button>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary">go</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- !new layout -->
    <!-- <div class="fond"> <span class="s1">blog </span><span class="s2">card</span></div> -->
    <div class="card">
        <div class="thumbnail">
            <iframe width="100%" height="100%"
                src="https://www.youtube.com/embed/?listType=search&list='<?= $song["SongName"].'+-+'.$song["BandName"]; ?>'&autoplay=1"
                frameborder="0" allowfullscreen></iframe>
            <!-- <img class="left"
                src="https://cdn2.hubspot.net/hubfs/322787/Mychefcom/images/BLOG/Header-Blog/photo-culinaire-pexels.jpg" /> -->
        </div>
        <div class="right">
            <h1><?= $song["SongName"] ?> - <?= $song["BandName"] ?></h1>
            <div class="author"><img src="https://randomuser.me/api/portraits/men/95.jpg" />
                <h2><?= $myConn->GetUser($song["Submited_by"])?></h2>
            </div>
            <div class="separator"></div>
            <p>
            <div style="color:black;">
                <?php
                        $hasScore = $myConn->HasScore($id);
                        if ($hasScore) {
                            $songScore = $myConn->GetSingleSongTotal($id);

                            echo "<h3> Total : " . $songScore["Total"] . "</h3>";
                        } else {
                            $needtovote = $myConn->NeedToVote($id);

                            if (count($needtovote) > 0) {
                                echo "<h4 class='capt'> song still needs to be voted on by: ";

                                foreach ($needtovote as  $value) {
                                    echo $value . ",";
                                }

                                echo "</h4>";
                            }
                    
                            if ($myConn->UserVotedOnSong($id, $userID)) {
                                echo "<h5> you have already voted on this song </h5>"; ?>
                <input type="button" class="btn btn-warning form-control" id="btnChang" onclick='ChangeVote()'
                    value="Change Vote">


                <div id="changevote" class="hide">
                    <form method="post" class="mt-3">
                        <?php include __DIR__ . "/text.html"; ?>
                        <input name="submitChange" type="submit" value="rate song" class="btn btn-warning">
                    </form>
                </div>
                <?php
                            } else {
                                ?>
                <form method="post" class="mt-3">
                    <?php include __DIR__ . "/text.html"; ?>
                    <input name="submit" type="submit" value="rate song" class="btn btn-warning">
                </form>
                <?php
                            }
                        }
                        ?>
            </div>
            </p>
        </div>
        <h5><?= $myConn->GetMonthText($dateArr[1]) ?></h5>
        <h6><?= $dateArr[2] ?></h6>
        <ul>
            <li><i class="fa fa-eye fa-2x"></i></li>
            <li><i class="fa fa-heart-o fa-2x"></i></li>
            <li><i class="fa fa-envelope-o fa-2x"></i></li>
            <li><i class="fa fa-share-alt fa-2x"></i></li>
        </ul>
        <div class="fab"><i class="fa fa-arrow-down fa-3x"> </i></div>
    </div>
    <footer class="footer"></footer>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
    <script src="js/app.js"></script>

</html>
<!-- // var sliderOld = document.getElementById("myRange");
    // var output = document.getElementById("demo");
    // output.innerHTML = sliderOld.value;
    // sliderOld.oninput = function() {
    //     output.innerHTML = this.value;
    // } -->