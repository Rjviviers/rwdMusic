<?php
include 'head.php';

class Song
{
    private $id;
    private $songName;
    private $bandName;
    private $weekGroup;
    private $dateposted;
    private $postedByUser;


    public function __construct($ID, $SongName, $BandName, $WeekGroup, $Dateposted, $PostedByUser)
    {
        $this->id = $ID;


        $this->songName = $SongName;


        $this->bandName = $BandName;


        $this->weekGroup = $WeekGroup;


        $this->dateposted = $Dateposted;


        $this->postedByUser = $PostedByUser;
    }





    public function SetSongName($val)
    {
        $this->songName = $val;
    }


    public function SetBandName($val)
    {
        $this->bandName = $val;
    }


    public function SetWeekGroup($val)
    {
        $this->weekGroup = $val;
    }


    public function SetDateposted($val)
    {
        $this->dateposted = $val;
    }


    public function SetPostedByUser($val)
    {
        $this->postedByUser = $val;
    }


    


    public function GetID()
    {
        return $this->id ;
    }


    public function GetSongName()
    {
        return $this->songName ;
    }


    public function GetBandName()
    {
        return $this->bandName;
    }


    public function GetWeekGroup()
    {
        return $this->weekGroup;
    }


    public function GetDateposted()
    {
        return $this->dateposted;
    }


    public function GetPostedByUser()
    {
        return $this->postedByUser;
    }

    public function getUri(){
        $myConn
    }
}