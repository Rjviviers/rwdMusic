<?php
include __DIR__ . '/html_private/head.php';
if (!isset($_SESSION['User'])) {
    $myConn->redirect("login.php");
}
$id = $_GET["ID"];
$userID = $_SESSION["User"]->GetID();
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
    <div class="container-fluid"><a style=" margin-left:10px;" class="btn btn-secondary"
            href="<?php echo 'month.php?month='.$month ?>">
            <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <div class="card bg-dark text-light neo neo-card">
            <br>
            <div class="container">
                <div class="">
                    <?php
                        echo "<h2 class='capt'> Song Name : ". $song["SongName"] ."</h2>";
                        echo "<h2 class='capt'> Band Name : ". $song["BandName"] ."</h2>";
                    ?>
                </div>
                <div class="">
                    <?php
                        echo "<h2 class='capt'> Submited By : ". $myConn->GetUser($song["Submited_by"]) ."</h2>";
                        echo "<h2 class='capt'> Posted By Date : ". $song["DatePosted"] ."</h2>";
                        ?>
                </div>
            </div>

            <div class="container">
                <div class="justify-center">
                    <iframe width="100%" height="75%"
                        src="https://www.youtube.com/embed/?listType=search&list='<?php echo $song["SongName"].'+-+'.$song["BandName"]; ?>'&autoplay=1"
                        frameborder="0" allowfullscreen></iframe>
                </div>
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
                                echo "song still needs to be voted on by: ";

                                foreach ($needtovote as  $value) {
                                    echo $value . ",";
                                }

                                echo "<br>";
                            }
                    
                            if ($myConn->UserVotedOnSong($id, $userID)) {
                                echo "you have already voted on this song <br>"; ?>
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