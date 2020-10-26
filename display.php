<?php
include __DIR__ . '/html_private/head.php';
include __DIR__ . '/html_private/lgc.php';
// var_dump($_SESSION['song']);
$valString = "";
$count = 0;
if (is_array($_SESSION['song'])) {
    foreach ($_SESSION['song'] as $value) {
        $valString = $valString . $value[0] . " - " . $value[1] . "\n";
        $count++;
    }
}
$_SESSION['song'] = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <?php include __DIR__ . '/partials/header.php'; ?>
    <div class="container-fluid">
        <textarea id="copyt" style="width:0px;height: 0px;" name="s" id="" cols="1"
            rows="1"><?php echo $valString ?></textarea>
        <h2 id="copyt">
            <?php echo $valString ?>
        </h2>
        <button class="btn btn-warning" onclick="copytext()">Click here Copy For Whatsapp</button>
    </div>
    <script>
    function copytext() {
        /* Get the text field */
        var copyText = document.getElementById("copyt");
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        /* Copy the text inside the text field */
        document.execCommand("copy");
        /* Alert the copied text */
        alert("Songs Copied To clip board");
    }

    function outFunc() {
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copy to clipboard";
    }
    </script>
    </body>

</html>