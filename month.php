<?php

include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';


$userIDnew = $_COOKIE["User"];

$rank = 1;

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

    <title style="text-align: center;"><?php echo $myConn->GetMonthText($_GET['month']) ?> </title>

    <style>



    </style>

    <?php

    include __DIR__ . '/partials/header.php';

    ?>

    <div class="container-md">

        <div class="card bg-dark text-light neo neo-card">

            <?php

    $month = explode('.', $_GET['month']);

    $monthText = $month[1].'.'.$month[0];

    $listOfsongsOBJ = $myConn->GetSongList($monthText);

    // var_dump($listOfsongsOBJ);

    $hasvotes = array();

    $needsVotes = array();
    $list = array();
    $plain = array();
   
    foreach ($listOfsongsOBJ as $value) {
        $id = $value->GetID();

        if ($myConn->HasScore($id)) {
            $name = $value->GetSongName(). " - " . $value->GetBandName();

            $nameText = $value->GetBandName(). " - " . $value->GetSongName();

            $songtotalrow = $myConn->GetSingleSongTotal($value->GetID());

            $total = $songtotalrow['Total'];

            $plain[] = $nameText;

            $hasvotes[] = array($total,$name,$id);
        } else {
            $name = $value->GetSongName(). " - " . $value->GetBandName();

            $nameText = $value->GetBandName(). " - " . $value->GetSongName();

            $plain[] = $nameText;

            $needsVotes[] = array($name,$id);
        }
       
        
        $id = $value->GetID();
        $uris[] = $myConn->getSongDetails($id);
        
        
    }
$_SESSION['list2'] = $uris;
    if (!empty($needsVotes)) {
        ?>

            <h1> <?php echo $myConn->GetMonthText($_GET['month']) ?></h1>

            <h1 class="capt" style="text-align: center;">songs that need votes</h1>

            <table class="table table-dark">

                <tbody>

                    <?php

        rsort($hasvotes);

        $songstopcount = 1;

        foreach ($needsVotes as $value) {

            // $id = $value->GetID();

            echo "<tr>";

            echo "<td><p class='capt'>".$value[0]."</p></td>";

            if ($myConn->UserVotedOnSong($value[1], $userIDnew)) {
                echo "<td> <a class='btn btn-warning float-right' href='songdetails.php?ID=$value[1]'> already voted </a> </td>";
            } else {
                echo "<td> <a class='btn btn-warning float-right' href='songdetails.php?ID=$value[1]'> Details/vote </a> </td>";
            }

            // echo "<td> <a class='btn btn-warning float-right' href='songdetails.php?ID=$value[1]'> Details </a> </td>";

            echo "</tr>";
        } ?>

                    </tr>



                </tbody>

            </table>



            <?php
    } else {
        ?>

            <h1 style="text-align: center;">Top songs </h1>

            <table class="table table-dark">

                <tbody>

                    <?php

        $topThree = $myConn->checkMonthTop($monthText);

        foreach ($topThree as $value) {
            ?>

                    <tr>

                        <td>

                            <h2 class="capt">

                                <?php echo $value['SongName'] . " - ". $value['BandName'] ?>

                            </h2>

                        </td>

                        <td>

                            <h2 class="rank<?php echo $rank ?> btn-4">

                                <?php echo $value['Total']?>

                            </h2>

                        </td>

                        <?php

            // var_dump($value);

            $rank++;
        }
    }

    ?>

                </tbody>

            </table>

            <?php

    if (!empty($hasvotes)) {
        ?>

            <h1 class="capt">songs with votes</h1>

            <table class="table table-dark">

                <thead>

                    <tr>

                        <th scope="col">Song Name</th>

                        <th scope="col">Rank</th>

                        <th scope="col">Action</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <?php

        rsort($hasvotes);

        $songstopcount = 1;

        foreach ($hasvotes as $value) {

            // $id = $value->GetID();

            echo "<tr>";

            echo "<td ><p class='capt'>".$value[1]."</a></td>";

            echo "<td>".$songstopcount."</td>";

            echo "<td> <a class='btn btn-warning' href='songdetails.php?ID=$value[2]'> Details </a> </td>";

            echo "</tr>";

            $songstopcount++;
        } ?>

                    </tr>

                </tbody>

            </table>

            <?php
    }
    

           ?>

            <a class="btn btn-warning" href="makeplaylist.php?s=1">Make Playlist</a>

        </div>



    </div>

    </body>



</html>