<?php

session_start();

class Database{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $database_name = 'fist_portfolio';
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