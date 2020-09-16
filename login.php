<?php

include __DIR__ . '/html_private/head.php';



if (isset($_POST["GO"])) {
    include __DIR__ .  '/html_private/Validation.php';

    ValidateTextField('username');

    ValidateTextField('pwd');



    if (count($errorMessages)  > 0) {
        foreach ($errorMessages as $key => $value) {
            echo "<p class='error_msg'> $key: $value</p> ";
        }
    } else {
        try {

            // var_dump(hash("sha512", trim($_POST["pwd"])));

            $obj = $myConn->Login(trim($_POST["username"]), hash("sha512", trim($_POST["pwd"])));

            $_SESSION['User'] = $obj;
        } catch (ErrorException $th) {
            $thm = $th->getMessage();

            echo "<p> $thm </p> ";
        }

        $myConn->redirect("index.php");
    }
}

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <script src="js/bootstrap.min.js"></script>

</head>

<div class="container-sm">

    <!-- <div class="row justify-content-center"> -->



    <form action="" method="post">

        <h1 class="capt">Log in</h1>

        <div class="form-group">

            <lable for="username"> User Name</lable>

            <input type="text" class="form-control" placeholder="Username"  autocomplete="username" name="username">

        </div>

        <div class="form-group">

            <lable for="pwd"> User Name</lable>

            <input type="password" class="form-control" autocomplete="current-password" placeholder="Password" name="pwd">

        </div>

        <div class="form-group">



            <input type="submit" class="form-control btn btn-warning" value="login" name="GO">

        </div>

    </form>

</div>

</div>

<?php

    

    ?>

</body>



</html>