<?php

include 'classes/admin_class.php';

session_start();

if(empty($_SESSION['login_id'])){
    header('location: login.php');
}else{
    $Admin = new Admin;

if(isset($_POST['admin_add'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $trainergender = $_POST['trainergender'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    
    $Admin->add_trainer($fname,$lname,$uname,$email,$description,$phone,$address,$trainergender,$image,$price);
}

if(isset($_POST['user_order'])){
    $order = $_POST['order'];

    if($order == 'Ascending order'){
        header('location: trainerlist_orderasc.php');
    }elseif($order == 'Descending order'){
        header('location: trainerlist_orderdesc.php');
    }
}

if(isset($_POST['user_gender'])){
    $gender = $_POST['gender'];

    if($gender == 'Male'){
        header('location: trainerlist_male.php');
    }else{
        header('location: trainerlist_female.php');
    }
}

if(isset($_POST['admin_edit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $trainergender = $_POST['trainergender'];
    $images = $_FILES['images']['name'];
    $id = $_POST['id'];
    $price = $_POST['price'];
    
    $Admin->edit_trainer($id,$fname,$lname,$uname,$email,$description,$phone,$address,$trainergender,$images,$price);
}

if(isset($_POST['admin_serch'])){
    $search = $_POST['search'];

    $row = $Admin->search_trainer($search);

    if ($row == true){
        header('location:admin_outcome.php?trainer_id='.$search);
    }else{
        header('location:admin_outcomes.php');
    }

}

if(isset($_POST['user_serch'])){
    $search = $_POST['admin_search'];

    $row = $Admin->search_trainer($search);

    if ($row == true){
        header('location:trainerlist_outcome.php?trainer_id='.$search);
    }else{
        header('location:trainerlist_outcomes.php');
    }
}


}

?>