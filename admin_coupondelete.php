<?php

include 'admin_action.php';

if(empty($_SESSION['login_id'])){
    header('location: login.php');
  }elseif($_SESSION['user_status']=='user'){
    header('location: trainerlist_new.php');
  }else{
    $coupon_id = $_GET['coupon_id'];
    $Admin->delete_coupon($coupon_id);
  }

?>