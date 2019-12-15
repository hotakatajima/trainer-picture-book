<?php

include 'classes/user_class.php';

session_start();

$Users = new User;

if(isset($_POST['add_cart'])){
    $trainer_id = $_POST['trainer_id'];
    $user_id = $_POST['user_id'];

    $Users->add_cart($trainer_id,$user_id);
}

if(isset($_POST['delete_cart'])){
    $userID = $_POST['user_id'];
    $delete_id = $_POST['delete_id'];

    $Users->delete_cart($userID,$delete_id);
}

if(isset($_POST['confirm'])){
    $userID = $_POST['user_id'];
    $delete_id = $_POST['delete_id'];
    $quan = $_POST['quan'];

    $Users->add_confirm($userID,$delete_id,$quan);
}


?>