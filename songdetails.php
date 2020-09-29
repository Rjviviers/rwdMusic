<?php
include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';


$id = $_GET["ID"];
$userID = $_COOKIE["User"];
$song = $myConn->SelectQuery("SELECT * FROM `song` WHERE `SongID` = $id");
//$month = $song['WeekGroup'];
$tempStor =  explode('.', $song['WeekGroup']);
$month =$tempStor[2].".". $tempStor[1];

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
    <div class="container-fluid">
        <div class="card bg-dark text-light neo neo-card">
            <a style=" margin-left:10px;" class="btn btn-secondary" href="<?php echo 'month.php?month='.$month ?>">
            </a>
            <h1 class='capt'><?= $song["SongName"] ?> - <?= $song["BandName"] ?></h1>
            <div class="container row row-cols-2 ">
                <div class="col">
                    <h2 class='capt'> Submited By : <?= $myConn->GetUser($song["Submited_by"])?> </h2>
                    <h2 class='capt'> Posted On Date : <?=  $song["DatePosted"]?> </h2>
                </div>
                <div class="justify-center col">
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/?listType=search&list='<?= $song["SongName"].'+-+'.$song["BandName"]; ?>'&autoplay=1"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="container">

                <div class="">
                    <?php
                    if ($userID == 2) {
                        ?>
                    <!-- <a class="btn btn-danger"  href="delete.php?id=<?php //echo $id?>"> DELETE </a> -->
                    <?php
                    }
                    ?>
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
                <?php
                        // if ($userID == 2) {
                        //     include __DIR__ . "/text.html";
                        // }
                        ?>
            </div>
        </div>
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