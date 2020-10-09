<?php

require 'conf.php';

include __DIR__ . '/User.php';

include __DIR__ . '/Song.php';

class DBCon
{
    private $host;

    private $database;

    private $username;

    private $password;

    private $link;

    

    public function __construct($host, $database, $username, $password)
    {
        $this->host = $host;

        $this->database = $database;

        $this->username = $username;

        $this->password = $password;
    }

    public function __destruct()
    {
        if ($this->link) {
            mysqli_close($this->link);
        }
    }

    public function Connect()
    {
        $this->link = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if (!$this->link) {

            //TODO

            //set Error Var parse error var to session[error]

            //send error var with url param e.g ?error=$eror
            printf("Connect failed: %s\n", $this->link->connect_error);
            exit();
            // $error = mysqli_error($this->link);
            // echo $error;
            // die();
            // $new = "error.php?error=" . $error;
            //$this->redirect($new);
        }
    }



    public function checkLatestVotes()
    {
        //checks db.view for new votes returns obj array
        $sql = "SELECT * FROM `Song_User_rating2` ORDER BY `Song_User_rating2`.`RateID` DESC LIMIT 3";

        $result  = mysqli_query($this->link, $sql);

        $rows = mysqli_fetch_all($result, 1);

        return $rows;
    }

    public function checkMonthTop($month)
    {
        $query = "SELECT *  FROM `Song_and_Score` WHERE `weekgroup` LIKE '%$month%' ORDER BY `Song_and_Score`.`Total`  DESC  LIMIT 3";

        $result = mysqli_query($this->link, $query);

        $all = mysqli_fetch_all($result, 1);

        return $all;
    }

    public function changeVote($id, $userID, $score)
    {

        //SELECT `RateID` FROM `songrate` WHERE `SongID` = 100 AND `UserID` = 2

        $query =  "SELECT `RateID` FROM `songrate` WHERE `SongID` = $id AND `UserID` = $userID";

        $result = mysqli_query($this->link, $query);

        $RateID = mysqli_fetch_row($result);

        $this->updateVote($RateID, $userID, $score);

        // return $id;
    }

    public function updateVote($RateID, $userID, $score)
    {
        $rate = $RateID[0];

        $qry = "UPDATE `songrate` SET `Rating` = $score WHERE `RateID` = $rate ";

        mysqli_query($this->link, $qry);
    }

    public function updatePassword($user, $password)
    {
        $passHassed = hash("sha512", trim($password));

        // $query = "UPDATE `users` SET `password` = '$password' WHERE `id` = '$user'";

        $query =  "UPDATE `users` SET `password` = '$passHassed' WHERE `users`.`id` = $user";

        mysqli_query($this->link, $query);

        //vardump(mysqli_query($this->link, $query));
    }

    public function DeleteSong($SID)
    {

        //DELETE FROM `song` WHERE `song`.`SongID`

        $query = "DELETE FROM `song` WHERE `song`.`SongID` = $SID";

        mysqli_query($this->link, $query);
    }

    // TODO

    // Registration

    public function Login($uname, $pwd)
    {
        $query = "SELECT * FROM `users` WHERE `username` = '$uname' AND `password` ='$pwd'";

        $result = mysqli_query($this->link, $query);

        $row = mysqli_fetch_array($result, 1);

        if ($row == null) {
            throw new ErrorException("The username or password provided is incorrect.");
        } else {
            return new User($row['id'], $row['username'], $row['password'], $row['full_name']);
        }
    }

    public function SelectQuery($query)
    {
        $result = mysqli_query($this->link, $query);

        $row = mysqli_fetch_array($result, 1);

        return $row;
    }

    public function GetMonthList()
    {
        $query = "SELECT Distinct `weekGroup` FROM `song` ORDER BY `weekGroup` Desc";

        $weeks = array();

        $monthAndYearText = array();

        $result = mysqli_query($this->link, $query);

        $row = mysqli_fetch_all($result, 1);

        foreach ($row as $value) {
            $tempStor =  explode('.', $value["weekGroup"]);

            $monthAndYear =$tempStor[2].".". $tempStor[1];

            $weeks[] =  $monthAndYear;
        }

        

           

        

        $weeksUnique = array_unique($weeks);

        rsort($weeksUnique);

        $count = 0 ;

        foreach ($weeksUnique as $value) {
            if ($count<10) {
                $month = explode('.', $value);

                $monthText = date('F', strtotime("20$month[0]-$month[1]-01"));

                $yearText = $month[0];

                $monthAndYearText = $monthText." ".$yearText;

                echo "<tr>";

                echo "<td> $monthAndYearText </td> ";

                echo "<td class=''><a class='btn btn-warning float-right' href='month.php?month=$value'> Go </a></td>";

                echo "</tr>";

                $count++;
            }
        }

        //var_dump($monthAndYearText);
    }

    public function GetMonthText($month)
    {
        $month = explode('.', $month);

        $monthText = date('F', strtotime("20$month[0]-$month[1]-01"));

        return $monthText;
    }

    public function InsertQuery($query)
    {

        //sanitise
        try {
            mysqli_query($this->link, $query);
        } catch (exception $th) {
            echo $th;
            die();
        }
    }

    public function GetUser($id)
    {
        if ($id == 2) {
            return "ruan";
        }

        if ($id == 3) {
            return "werner";
        }

        if ($id == 4) {
            return "danie";
        }
    }

    public function GetSongScore($songID)
    {

        // $temp = 0;

        $scores = array();

        $query = "SELECT `Rating` FROM `songrate` WHERE `songID` = $songID";

        $rating = mysqli_query($this->link, $query);

        while ($rate = mysqli_fetch_array($rating, 1)) {
            $scores[]= $rate["Rating"];
        }

        if (array_sum($scores) != 0) {
            $avg = array_sum($scores)/count($scores);

            return $avg;
        } else {
            return "no rating yet";
        }
    }

    public function GetSingleSongTotal($id)
    {
        $query = "SELECT `Total` FROM `scoretotals` WHERE `SongID` = $id";

        $result = mysqli_query($this->link, $query);

        $row = mysqli_fetch_array($result, 1);

        return $row;
    }

    public function redirect($url)
    {
        ob_start();

        header('Location: '.$url);

        ob_get_clean();
    }

    public function HasScore($id)
    {
        $query = "SELECT `Total` FROM `scoretotals` WHERE `SongID` = $id";

        $result = mysqli_query($this->link, $query);

        $row = mysqli_fetch_array($result, 1);

        if (is_array($row)) {
            if (count($row)!= 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function GetSongList($month)
    {
        $listOfSongs = array();

        $query = "SELECT * FROM `song` WHERE `weekGroup` LIKE '%$month%'";

        $result = mysqli_query($this->link, $query);

        $all = mysqli_fetch_all($result, 1);

        foreach ($all as $value) {
            $listOfSongs[] = new Song($value["SongID"], $value["SongName"], $value["BandName"], $value["Submited_by"], $value["WeekGroup"], $value["DatePosted"]);
        }

        return $listOfSongs;
    }

    public function allSongs()
    {
        $allSongs = array();
        $q = "SELECT * from `song`";
        $result = mysqli_query($this->link, $q);
        $all = mysqli_fetch_all($result, 1);
        return $all;
    }

    public function geturi($id)
    {
        $uri = array();
        $q = "SELECT `spotifyUri` from `spotify_uris` where `songFKey` = $id ";
        $result = mysqli_query($this->link, $q);
        $row = mysqli_fetch_all($result, 1);
        vardump($row);
        return $row;
    }
    public function GetLatestSongs()
    {
        $songlist = array();

        $query = "SELECT * FROM `song` ORDER BY `SongID` Desc  LIMIT 10";

        $result = mysqli_query($this->link, $query);

        $all = mysqli_fetch_all($result, 1);

        // var_dump($all);

        foreach ($all as  $value) {
            $songlist[] = new Song($value["SongID"], $value["SongName"], $value["BandName"], $value["Submited_by"], $value["WeekGroup"], $value["DatePosted"]);
        }

        return  $songlist;
    }

    public function CountVotes($SongID)
    {
        $query = "SELECT * FROM `songrate` WHERE `SongID` = $SongID";

        $result = mysqli_query($this->link, $query);

        $all = mysqli_fetch_all($result, 1);

        return count($all);
    }

    public function UserVotedOnSong($id, $userID)
    {
        $query = "SELECT * FROM `songrate` WHERE `SongID` = $id AND `UserID` = $userID";

        $result = mysqli_query($this->link, $query);

        $all = mysqli_fetch_all($result, 1);

        if (count($all)==1) {
            return true;
        } else {
            return false;
        }
    }

    public function NeedToVote($SongID)
    {
        $query = "SELECT * FROM `songrate` WHERE `SongID` = $SongID";

        $result = mysqli_query($this->link, $query);

        $all = mysqli_fetch_all($result, 1);

        $notvotedNumbers = array();

        $notvotedNames = array();

        $users = array("2","3","4");

        $votedUsers = array();

        foreach ($all as $value) {
            $votedUsers[] =  $value["UserID"];
        }

        foreach ($users as $value) {
            if (!in_array($value, $votedUsers)) {
                $notvotedNumbers[] = $value;
            }
        }

        if (count($notvotedNumbers) != 0) {
            foreach ($notvotedNumbers as $value) {
                $notvotedNames[] = $this->GetUser($value);
            }
        }

        return $notvotedNames;
    }

    public function RateSong($songID, $userID, $score)
    {
        $query = "INSERT INTO `songrate` (`SongID`,`UserID`,`Rating`) VALUES($songID,$userID,$score)";

        mysqli_query($this->link, $query);

        if ($this->CountVotes($songID)=="3") {
            $query  = "SELECT * FROM `songrate` WHERE `SongID` = '$songID' ";

            $result = mysqli_query($this->link, $query);

            $all    = mysqli_fetch_all($result, 1);

            $ratings = array($all[0]['Rating'] , $all[1]['Rating'], $all[2]['Rating']);

            $avg    = array_sum($ratings)/3 ;

            $avgR = round($avg, 2);

            rsort($ratings);

            $high = $ratings[0];

            sort($ratings);

            $low = $ratings[0];



            $weekQuery = "SELECT * FROM `song` WHERE `SongID` = $songID";

            $weekresult = mysqli_query($this->link, $weekQuery);

            $weekRow = mysqli_fetch_row($weekresult);

            $weekgroup = $weekRow[4];



            $inQuery = "INSERT INTO `scoretotals` (`SongID`, `Total`, `weekgroup`, `lowestScore`, `highestScore` , `age`) VALUES ('$songID', '$avgR', '$weekgroup','$low','$high','0')";

            mysqli_query($this->link, $inQuery);
        }
    }


    public function getUserStats($userID)
    {
        $users = array(2,3,4);

        $avgScoreOnSongs = array();

        

        if (in_array($userID, $users)) {
            if ($userID == 2) {
                $query = "SELECT * FROM `RuanSongs`";
            }

            if ($userID == 3) {
                $query = "SELECT * FROM `wernerSongs`";
            }

            if ($userID == 4) {
                $query = "SELECT * FROM `danieSongs`";
            }

            $result = mysqli_query($this->link, $query);

            $all = mysqli_fetch_all($result, 1);

            $numberOfSubmited =  count($all);

            foreach ($all as $key) {
                $avgScoreOnSongs[] =  $key['total'];
            }

            $avgScore = array_sum($avgScoreOnSongs)/count($avgScoreOnSongs);

            $UserStats = array( "Number Of Songs Submitted" =>$numberOfSubmited ,"Avarege Score On Songs" => $avgScore );

            return $UserStats;
        } else {
            echo "user has no stats";

            return 0;
        }
    }

    public function getTopSongs($NoOfSongs)
    {
        $query = "SELECT * FROM `Song_and_Score` ORDER BY `Total` DESC LIMIT $NoOfSongs";

        $result = mysqli_query($this->link, $query);

        $all = mysqli_fetch_all($result, 1);

        $topSongs = array();

        foreach ($all as $key) {

            //SongID	SongName	BandName	Total

            $topSongs[] = array("songid"=> $key['SongID'],"Song"=>$key['SongName'] . " - " . $key['BandName'],"Total" => $key['Total']);
        }

        return $topSongs;
    }
}