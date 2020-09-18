<?php

include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';


if (isset($_GET['t'])) {
    $addSongTest = $_GET['t'];

    if ($addSongTest =='Succsess') {
        echo "song Added successfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music App</title>
    <?php
    include __DIR__ . '/partials/header.php';
    ?>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-xl">
                <div class="card bg-dark text-light neo neo-card">
                    <H1 class="cent">Month Groups</H1>
                    <table class="table table-dark">
                        <?php
                    $myConn->GetMonthList();
                    ?>
                    </table>
                </div>
            </div>
            <div class="col-xl">
                <div class="card bg-dark text-light neo neo-card">
                    <h1 class="cent">Latest Songs</h1>
                    <table class="table table-dark">
                        <?php
                    $list = $myConn->GetLatestSongs();
                    foreach ($list as  $song) {
                        $id = $song->GetID();
                        echo "<tr>";
                        echo "<td>". $song->GetSongName() . " - " . $song->GetBandName()."</td>";
                        echo "<td><a class='btn btn-warning float-right '  href='songdetails.php?ID=$id'>Go</a></td>";
                        echo "</tr>";
                    }?>
                    </table>
                </div>
            </div>
            <div class="col-xl">
                <div class="card bg-dark text-light neo neo-card">
                    <h1 class="cent">Hall Of Fame</h1>
                    <table class="table table-dark capt">
                        <?php
                    $topSongs =  $myConn->getTopSongs(10);
                    foreach ($topSongs as $value) {
                        $id = $value['songid'];
                        echo "<tr>";
                        echo "<td>".$value['Song']."</td>";
                        echo "<td><a class='btn btn-warning float-right' style='width:100%' href='songdetails.php?ID=$id'>".$value['Total']."</a></td>";
                        echo "<tr>";
                    }
                    ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card bg-dark text-light neo neo-card">
                    <h3>Latest Votes</h3>
                    <table class="table table-dark">
                        <tbody>
                            <?php
                        $latestVotes = $myConn->checkLatestVotes();
                        foreach ($latestVotes as $value) {
                            // var_dump($value);
                            echo "<tr><td>".$value['username']. " voted for ". $value['SongName']. " - ". $value['BandName']."</td></tr>";
                        }
                        ?>
                        </tbody>
                </div>
                </table>
            </div>
        </div>
    </div>
    </body>

</html>