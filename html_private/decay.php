<?php
$starttime = microtime(true); // Top of page

include ('head.php');

$data = $myConn->getSongsTotals();

function updateAge($data,$con)
{
    foreach ($data as $value) {
        $id = $value['SongID'];
        $oldAge = $value['age'];
        $newAge = $oldAge + 1; 
        $q =  "UPDATE `scoretotals` SET `age` = '$newAge' WHERE `scoretotals`.`SongID` = $id";
        $con->updateQuery($q);
        echo "i ran tehee";
    }
}
function decay($data,$con)
{
    foreach ($data as $value) {
        $id = $value['SongID'];
        $oldTotal = $value['Total'];
        if ($oldTotal > 0) {
            
            if ($value['age'] >= 20) {
                $newTotal = $oldTotal - (0.3 * $value['age']);
            } elseif ($value['age'] >= 5) {
                $newTotal = $oldTotal - (0.1 * $value['age']);
            } else {
                $newTotal = $oldTotal - (0.05 * $value['age']);
            }
        }
        if ($newTotal < 10) {
            $newTotal = 10;
        }
        

        $q =  "UPDATE `scoretotals` SET `currentTotal` = '$newTotal' WHERE `scoretotals`.`SongID` = $id";
        $con->updateQuery($q);
        echo $value['age'] . " : ";
        echo $oldTotal . " -> ";
        echo $newTotal . "</br>";
    }
}

if(isset($_GET['age'])){
    updateAge($data,$myConn);
}
if(isset($_GET['decay'])){
    decay($data,$myConn);
}

$endtime = microtime(true); // Bottom of page

printf("Page loaded in %f seconds", $endtime - $starttime );
?>