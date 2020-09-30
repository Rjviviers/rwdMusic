<?php
include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';
include_once __DIR__ . '/html_private/Validation.php';

$userID = $_COOKIE['User'];
if (isset($_GET['r'])) {
    echo $_GET['r'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php
    include __DIR__ . '/partials/header.php';
    ?>
    <div class="container ">
        <div class="row pt-sm-5">
            <div class="col-3 col-sm-1 p-5">
                <img height="150" src="https://via.placeholder.com/150" alt="" class="rounded-circle">
            </div>
            <div class="col-9 col-sm-6 pt-2">
                <div class="d-flex justify-content-between align-bottom ">
                    <h1><?= $_COOKIE['Uname'] ?></h1>
                </div>
                <div class="d-flex">
                    <?php
                    $stats = $myConn->getUserStats($_COOKIE["User"]);
                    if ($stats != 0) {
                        foreach ($stats as $key => $value) {?>
                    <div class="pr-5"><strong><?= $value ?></strong> <?= $key?></div>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
        <div class="row pt-5">
            <div class="col">
                <form action="change-pw.php" method="post">
                    <h1>Change Password</h1>
                    <div class="form-group">
                        <label for="new-pw">New Password</label>
                        <input type="Password" name="pwd" class="form-control">
                    </div>
                    <input type="submit" class="form-control btn btn-warning" name="Go" value="Go">
                </form>
            </div>

        </div>
        <!-- <div class="row">
            <div class="col-4"><img src="https://via.placeholder.com/250" alt="" class="w-100 h-100"></div>
            <div class="col-4"><img src="https://via.placeholder.com/250" alt="" class="w-100"></div>
            <div class="col-4"><img src="https://via.placeholder.com/250" alt="" class="w-100"></div>
        </div> -->
    </div>


    <!-- <div class="container"> -->
    <!-- <div class="row">
            <h1>Your Stats</h1>
            <table class="table table-dark">
                <?php
        // $stats = $myConn->getUserStats($_COOKIE["User"]);
        //     if ($stats != 0) {
        //         foreach ($stats as $key => $value) {
        //             echo "<tr>";
        //             echo "<td> $key </td>";
        //             echo "<td> $value </td>";
        //             echo "</tr>";
        //         }
        //     }
        ?>
            </table> -->
    <!-- </div> -->
    <!-- <div class="row">
        <form action="change-pw.php" method="post">
            <h1>Change Password</h1>
            <div class="form-group">
                <label for="new-pw">New Password</label>
                <input type="Password" name="pwd" class="form-control">
            </div>
            <input type="submit" class="form-control btn btn-warning" name="Go" value="Go">
        </form>
    </div> -->
    </div>
    </body>

</html>