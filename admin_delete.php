<?php

include 'admin_action.php';

if(empty($_SESSION['login_id'])){
  header('location: login.php');
}elseif($_SESSION['user_status']=='user'){
  header('location: trainerlist_new.php');
}else{
  $userID = $_GET['trainer_id'];
  $Admin->delete_trainer($userID);
}

?>