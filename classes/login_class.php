<?php

include 'database.php';

class Login extends Database{

    public function add_user($fname,$lname,$uname,$email,$password){
        $insetusers = "INSERT INTO login(username,password)VALUES('$uname','$password')";
        $results = $this->conn->query($insetusers);

        if($results == true){
            $loginID = $this->conn->insert_id;
            
            $sql = "INSERT INTO users(user_fname,user_lname,user_email,user_status,login_id)VALUES('$fname','$lname','$email','user','$loginID')";
            $result = $this->conn->query($sql);

            if($result == false){
                die('cannot add user'.$this->conn->connect_error);
            }else{
                header('location: login.php');
            }
        }else{
            die('cannot add users'.$this->conn->connect_error);
        }
    }

    public function login_user($uname,$password){
        $loginusers = "SELECT * FROM users INNER JOIN login ON users.login_id = login.login_id WHERE username = '$uname' AND password = '$password' ";
        $result = $this->conn->query($loginusers);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $status = $row['user_status'];
            
            if($status == 'user'){
                $_SESSION['login_id'] = $row['login_id'];
                header('location: trainerlist.php');
            }else{
                $_SESSION['login_id'] = $row['login_id'];
                header('location: admin.php');
            }
            
        }else{
            return FALSE;
        }
    }

}
?>