<?php

session_start();

class Database{
    private $servername = 'us-cdbr-iron-east-01.cleardb.net';
    private $username = 'ba0573e0eef412';
    private $password = '2d72cda0';
    private $database_name = 'heroku_80a99531d86acfb';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->database_name);

        if($this->conn->connect_error){
            die('cannot connect'.$this->conn->connect_error);
        }else{
            return $this->conn;
        }
    }

}


?>