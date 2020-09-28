<?php


class User
{
    private $id;
    private $userName;
    private $password;
    private $name;


    public function __construct($ID, $Username, $Password, $Name)
    {
        $this->id = $ID;


        $this->userName = $Username;


        $this->password = $Password;


        $this->name = $Name;
    }





    public function SetUsername($val)
    {
        $this->userName = $val;
    }


    public function SetPassword($val)
    {
        $this->password = $val;
    }


    public function SetName($val)
    {
        $this->name = $val;
    }





    public function GetID()
    {
        return $this->id;
    }


    public function GetUsername()
    {
        return $this->userName;
    }


    public function GetPassword()
    {
        return $this->password;
    }


    public function GetName()
    {
        return "$this->name";
    }
}