<?php

include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';



if (!empty($_GET["NoOfSongs"])) {
    $noofsongs = $_GET["NoOfSongs"];
} else {
    $noofsongs = 1;
}


$_SESSION['song'] = array();

if (isset($_POST["Add"])) {
    for ($i=0; $i < $noofsongs; $i++) {
        $songname = $_POST["song,$i"];
        $songname = valid($songname);
        $bandname = $_POST["band,$i"];
        $bandname = valid($bandname);
        $_SESSION['song'][] = array($songname,$bandname);

        $user = $_POST["user,$i"];

        $weekgroup = "week.".date('m.y');

        $timestamp = getdate();

        $outputDate = $timestamp["year"] .'-'. $timestamp["mon"] .'-'. $timestamp["mday"];

        $query = "INSERT INTO `song` (`SongID`, `SongName`, `BandName`, `Submited_by`, `WeekGroup`, `DatePosted`) VALUES (NULL, '$songname', '$bandname', '$user', '$weekgroup', '$outputDate')";

        $myConn->InsertQuery($query);
    }

    $myConn->redirect("display.php");
}

function valid($data)
{
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add songs</title>
    <?php
    include __DIR__ . '/partials/header.php';
    ?>
    <script>
    $(function() {

        $('#band').autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: "POST",
                    url: "do_search.php",
                    data: {
                        term: request.term,
                        type: "user"
                    },
                    success: response,
                    dataType: 'json',
                    minLength: 2,
                    delay: 100
                });
            }
        });
    });
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

    <?php if ($_GET['s']=="yes") {
        echo "nice";
    } else {
        ?>


    <div class="container">
        <div class="row  justify-content-md-center">
            <h2 class="capt">Add songs</h2>
        </div>
        <form action="" method="post">
            <?php
                for ($i=0; $i < $noofsongs ; $i++) {
                    ?>
            <div class="form-group">

                <label for="songname <?php echo $i?>">Song Name</label>

                <input type="text" class="form-control" name="song,<?php echo $i?>"
                    placeholder="songname <?php echo $i?>" name="song,<?php echo $i?>" id="">

            </div>
            <div class="form-group">

                <label for="band,<?php echo $i?>" name="band,<?php echo $i?>">Band Name</label>

                <input id="band" type="text" class="form-control" placeholder="bandname <?php echo $i?>"
                    name="band,<?php echo $i?>" id="">

            </div>
            <div>

                <label for="user">Submited by</label> <br>

                <input type="radio" name="user,<?php echo $i?>" value="2"> Ruan <br>

                <input type="radio" name="user,<?php echo $i?>" value="3"> Werner <br>

                <input type="radio" name="user,<?php echo $i?>" value="4"> Danie

            </div>
            <br>
            <?php
                } ?>
            <input class="btn btn-warning form-control" type="submit" name="Add" value="Add">
        </form>
    </div>
    <?php
    }?>
    </body>

</html>