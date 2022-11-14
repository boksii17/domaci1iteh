<?php

class User{
    public $id;
    public $name;
    public $password;

    public function __construct($id=null,$name=null,$password=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
    }

    public static function logInUser($usr, mysqli $conn){

        $name = $usr->name;
        $password = $usr->password;

        $query = "SELECT * FROM user WHERE name='$usr->name' and password='$usr->password'";
        return $conn->query($query);
    }
}


?>