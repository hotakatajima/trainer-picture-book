<?php

    include 'classes/login_class.php';

    session_start();

    if(empty($_SESSION['login_id'])){
        header('location: login.php');
    }

    $Users = new Login;

    if(isset($_POST['add_user'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        $Users->add_user($fname,$lname,$uname,$email,$password);
    }

    if(isset($_POST['signin'])){
        $uname = $_POST['uname'];
        $password = md5($_POST['password']);

        $Users->login_user($uname,$password);
    }

?>