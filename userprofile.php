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
    <div class="container-fluid pt-5 p-4">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <img height="150" src="https://via.placeholder.com/150" alt="" class="rounded-circle">
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h1><?= $_COOKIE['Uname'] ?></h1>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <?php
                    $stats = $myConn->getUserStats($_COOKIE["User"]);
                    if ($stats != 0) {
                        foreach ($stats as $key => $value) {?>
                            <div class="col-md-6"><strong><?= $value ?></strong> <?= $key?></div>
                            <?php
                        }
                    }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
    </div>



    </body>

</html>