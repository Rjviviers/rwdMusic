<?php
$starttime = microtime(true); // Top of page

include ('head.php');
$currentdate = getdate();
$currentMonth = $currentdate['mon'];
$currentYear = $currentdate['year'];
$data = $myConn->getSongsTotals();
$yeardiff = 0;
$monthdiff = 0;
// print_r($data);
//[totalid] => 49 [SongID] => 23 [Total] => 16 [weekgroup] => week4.03.19 [lowestScore] => 0 [highestScore] => 0 [age] => 11 
//A3-(0.1*0)
foreach ($data as $value) {
    //[1] = month , 
    $id = $value['SongID'];
    $song = $myConn->getSongDetails($value['SongID']);

    $ageraw = $song['DatePosted'];
    $songTempDate = explode('-',$ageraw);
    $songYearPosted = $songTempDate[0];
    //song [DatePosted] [0] = year
    $songMonthPosted = $songTempDate[1];
    
    if ($songYearPosted == 0000) {
        $v = explode(".",$song["WeekGroup"]);
         $songMonthPosted = $v[1];
        $v = $v[2]+2000 ;
        $yeardiff = $currentYear - $v;
        $monthdiff = $currentMonth - $songMonthPosted;
    }else{
        
        $yeardiff = $currentYear - $songYearPosted;
        $monthdiff = $currentMonth - $songMonthPosted;
    }
    $yearToMonth = $yeardiff * 12;
    $age = $yearToMonth + $monthdiff;
    // echo $id . " : ". $age;
    $q =  "UPDATE `scoretotals` SET `age` = '$age' WHERE `scoretotals`.`SongID` = $id";
    $myConn->updateQuery($q);
    
}




$endtime = microtime(true); // Bottom of page

printf("Page loaded in %f seconds", $endtime - $starttime );
?>