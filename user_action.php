<?php

include 'classes/user_class.php';

session_start();

$Users = new User;

if(isset($_POST['add_cart'])){
    $trainer_id = $_POST['trainer_id'];
    $user_id = $_POST['user_id'];

    $Users->add_cart($trainer_id,$user_id);
}

if($_GET['actiontype'] == 'delete'){
    $cart = $_GET['cart_id'];

    $Users->delete_cart($cart);
}

if(isset($_POST['edit_cart'])){
    $quan = $_POST['quan'];
    $userID = $_POST['user_id'];
    $delete_id = $_POST['delete_id'];
    $cart_id = $_POST['cart_id'];
    
    for($x = 0; $x <count($delete_id);$x++){
        $Users->edit_cart($quan[$x],$userID[$x],$delete_id[$x],$cart_id[$x]);
    }
    
    header('location:cart.php');
   
}

// --------------favorite-------------------

if(isset($_POST['add_favorite'])){
    $trainer_id = $_POST['trainer_id'];
    $user_id = $_POST['user_id'];

    $Users->add_favorite($trainer_id,$user_id);
}

if($_GET['actiontype'] == 'deletes'){
    $favorite = $_GET['favorite_id'];

    $Users->delete_favorite($favorite);
}

if($_GET['actiontype'] == 'putcart'){

    $trainer_id = $_GET['delete_id'];
    $user_id = $_GET['user_id'];
    $cart_id = $_GET['cart_id'];

    $Users->add_carts($trainer_id,$user_id,$cart_id);
}

// --------------confirm-------------------

if(isset($_POST['confirm'])){
    $cart_id = $_POST['cart_id'];
    $userID = $_POST['user_id'];
    $delete_id = $_POST['delete_id'];
    $quan = $_POST['quan_id'];
    // $settle = $_POST['settle'];
    // $coupon = $_POST['coupon'];

    $Users->add_confirm($userID,$delete_id,$quan,$cart_id);
}

// if(isset($_POST['enter'])){
//     $settle = $_POST['settle'];
//     $coupon = $_POST['coupon'];
//     $user_id = $_POST['user_id'];

//     $Users->add_another($settle,$coupon,$user_id);
// }


?>