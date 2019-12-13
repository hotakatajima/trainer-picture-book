<?php


include 'admin_action.php';

if(empty($_SESSION['login_id'])){
  header('location: login.php');
}else{    
session_start();
session_unset();
session_destroy();

header('location: login.php');

}

?>