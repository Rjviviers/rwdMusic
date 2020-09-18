<?php

include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';
include_once __DIR__ . '/html_private/Validation.php';

$userID = $_SESSION['User']->GetID();

if (!isset($_SESSION['User'])) {
    $myConn->redirect("login.php");
}

if (isset($_GET['r'])) {
    echo $_GET['r'];
}

// if (isset($_POST['Go'])) {

//     $pwd = $_POST['pwd'];

//     $myConn->updatePassword($userID, $pwd);

//     // ValidateTextField("pwd");

    

//     // if (empty($errorMessages['Password'])) {

//     //

//     //     echo 'sucsses ';

//     //     var_dump($errorMessages);

//     // } else {

//     //     $errorMessages["password"] = "passwords cant be empty";

//     //     echo 'fail ';

//     //     var_dump($errorMessages);

//     // }

//     // foreach ($errorMessages as  $value) {

//     //     echo 'stat';

//     //     var_dump($value);

//     // }

// }



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

    <div class="container">

        <div class="row">

            <h1>Your Stats</h1>

            <table class="table table-dark">

                <?php

        $stats = $myConn->getUserStats($_SESSION["User"]->GetID());

            if ($stats != 0) {
                foreach ($stats as $key => $value) {
                    echo "<tr>";

                    echo "<td> $key </td>";

                    echo "<td> $value </td>";

                    echo "</tr>";
                }
            }

        ?>

            </table>

        </div>



        <div class="row">



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

    </body>



</html>