<?php
include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';


$id = $_GET["ID"];
$userID = $_COOKIE["User"];
$song = $myConn->SelectQuery("SELECT * FROM `song` WHERE `SongID` = $id");
//$month = $song['WeekGroup'];
$tempStor =  explode('.', $song['WeekGroup']);
$month = $tempStor[2].".". $tempStor[1];

$dateArr = explode("-", $song["DatePosted"]);
$dateVal = "20.".$dateArr[1];
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
    <div class="container-fluid pt-5">
        <div class="p-sm-0">
            <div class="row ">
                <div class="col-md-8">
                    <div class="row" style="height: 400px;">
                        <div class="col-md-12 ">
                            <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/?listType=search&list='<?= $song["SongName"].'+-+'.$song["BandName"]; ?>'&autoplay=1"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5><?= $myConn->GetMonthText($dateVal) ?>, <?= $dateArr[2] ?></h5>
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
                            <h3><?= $song["SongName"] ?> - <?= $song["BandName"] ?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="author"><img src="https://via.placeholder.com/25" />
                                <div style="padding-top: 6px;padding-left: 3em;margin: 7%;">
                                    <?= $myConn->GetUser($song["Submited_by"])?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><?php
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
                                echo "<h4> you have already voted on this song </h4>"; ?>
                                <input type="button" class="btn btn-warning form-control" id="btnChang"
                                    onclick='ChangeVote()' value="Change Vote">


                            <div id="changevote" class="hide">
                                <form method="post" class="mt-3">
                                    <?php include __DIR__ . "/views/sliderView.html"; ?>
                                    <button name="submitChange" type="submit" value="" class="cardbuttondeets"><i
                                            class="fas fa-check"></i></button>
                                </form>
                            </div>
                            <?php
                            } else {
                                ?>
                            <form method="post" class="mt-3">
                                <?php include __DIR__ . "/views/sliderView.html"; ?>
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
                        <div class="col-md-12">

                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
    <?=  ?>
    
    </footer>
    </body>

    <script src="js/app.js"></script>

</html>