<?php

include 'admin_action.php';

if(empty($_SESSION['login_id'])){
  header('location: login.php');
}elseif($_SESSION['user_status']=='admin'){
  header('location: admin.php');
}else{
  $userIDs = $_GET['trainer_id'];
  $userID = $_SESSION['login_id'];
  $got = $Admin->display_onetrainers($userIDs);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FIND YOUR FAVORITE TRAINERS</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

  <style>
      .fa-arrow-circle-down{
        font-size:160px;
      }

      html,
            body {
            height: 100%;
            }

            #page-content {
            flex: 1 0 auto;
            }

            #sticky-footer {
            flex-shrink: none;
            }

            .d-inline-block{
                width :350px;
                height :750px;
            }

            .big{
                position: relative;
            }

            .pos{
                position:absolute;
                top:20px;
                left :20px;
            }

            .post{
                position:absolute;
                top:40px;
                left :40px;
            }

            .jojo{
              position :absolute;
              bottom: 20px;
              right:20px;
            }

            .alert-primary{
                font-size: 18px;
                padding: 10px;
            }

            .text-uppercase{
                font-size: 14px;
            }

            .fas{
              font-size:160px;
            }
            
            .img-thumbnail{
              width:190px;
              height:190px;
              overflow: hidden;
            }

            .addittion a{
              font-size: 22px;
            }

            .ceter{
              margin:0 auto;
            }

            .font-weight-light{
              position :relative;
            }

            .logout{
              position :absolute;
              top:50px;
              right:50px;
            }

            table{
                width:1200px;
                table-layout: fixed;
                font-size:24px;
                margin-top:650px;
            }

            td{
                padding: 30px;
                  /*word-break: break-all;*/
                overflow-wrap : break-word;
            }

            .btn{
              font-size: 24px;
            }
  </style>

</head>

<body class="d-flex flex-column">
<section class="resume-section d-flex align-items-center">

  <?php include 'sidebar_admin.php' ?>

        <?php  
            $user_id = $_SESSION['login_id'];

            echo "<table class='table-striped text-center mx-auto decline mb-5 table-bordered'>";

            if($got['trainer_image']== null){
                echo "<tr>";
                echo "<td colspan=2>";
                echo "<i class='fas fa-user'></i><br><br>";
                echo "<p>This trainer doesnt put photo!!!</p>";
                echo "</td>";
                echo "</tr>";
            }else{
                $image = $got['trainer_image'];
                echo "<tr>";
                echo "<td colspan=2>";
                echo "<img src='upload/$image' class='img-thumbnail rounded-circle'>";
                echo "</td>";
                echo "</tr>";
            }

            echo "<tr>";
            echo "<td>NAME</td><td>".$got['trainer_fname'].$got['trainer_lname']."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>USER NAME</td><td>".$got['trainer_uname']."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>GENDER</td><td>".$got['trainer_gender']."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>PHONE NUMBER</td><td>".$got['trainer_phone']."</td>";
            echo "</tr>";    

            echo "<tr>";
            echo "<td>EMAIL</td><td>".$got['trainer_email']."</td>";
            echo "</tr>";    

            echo "<tr>";
            echo "<td>DESCRIPTION</td><td>".$got['trainer_description']."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>PRICE(per hour)</td><td>".$got['trainer_price']."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>ADDRESS</td><td>".$got['trainer_address']."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td colspan=2>";
            echo "<form action='user_action.php' method='post'>";
            echo "<input type='hidden' name='trainer_id' value='$userIDs'>";
            echo "<input type='hidden' name='user_id' value='$user_id'>";
            echo "<button class='btn btn-lg btn-danger btn-inlile-block text-uppercase p-5 w-25 mr-5' type='submit' name='add_favorite'>FAVORITE</button>"; 
            echo "<button class='btn btn-lg btn-danger btn-inlile-block text-uppercase p-5 w-25 ml-5' type='submit' name='add_cart'>CART</button>"; 
            echo "</form>";
            echo "</td>";
            echo "</tr>";


            echo "</table>"; 
          ?>

    </section>      
  </body>
</html>
