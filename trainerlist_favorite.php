<?php

    include 'user_action.php';
    $userID = $_SESSION['login_id'];

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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

      html,body {
            height: 100%;
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

            td{
                padding:20px;
            }

            .buy{
                font-size:24px;
            }

            .font{
              font-size:24px;
            }

  </style>

</head>

<body class="d-flex flex-column">

    <?php include 'sidebar_user.php' ?>

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center">
        <div class="w-100 vh-100">
        <div id="page-content">
        <h2 class='display-2 text-center font-weight-bold mb-5' style="text-decoration: underline">FAVORITE</h2>

        <div class="row justify-content-center m-0 text-center">
 
      <?php
                $display = $Users->display_favorite($userID);
                foreach($display as $key => $row){ 

                    $image = $row['trainer_image'];
                    $delete_id = $row['trainer_id'];
                    $cart_id = $row['cart_id'];

                    echo "<table class='table-striped w-50 text-center mx-auto decline mb-5 table-bordered'>";
                    
                    if($row['trainer_image']== null){
                        echo "<tr>";
                        echo "<td colspan=2><img src='upload/img.png' class='mt-2 mb-2 img-thumbnail rounded-circle'></td>";
                        echo "</tr>";
                      }else{
                        echo "<tr>";
                        echo "<td colspan=2><img src='upload/$image' class='mt-2 mb-2 img-thumbnail rounded-circle'></td>";
                        echo "</tr>"; 
                      }

                      echo "<tr>";
                      echo "<td>NAME</td><td>".$row['trainer_fname'].$row['trainer_lname']."</td>";
                      echo "</tr>";
          
                      echo "<tr>";
                      echo "<td>GENDER</td><td>".$row['trainer_gender']."</td>";
                      echo "</tr>";
  
                      echo "<tr>";
                      echo "<td>MONER PER HOUR</td><td>".$row['trainer_price']."</td>";
                      echo "</tr>";
                      
                      echo "<form action='user_action.php' method='post'>";
                      echo "<tr>";
                      echo "<td>QUANTITY(hour)</td><td>".$row['quantity']."</td>";
                      echo "</tr>";

                      echo "<tr>";
                      echo "<td>SUM</td><td>".$row['trainer_price']*$row['quantity']."</td>";
                      echo "</tr>";
           
                      echo "<tr>";
                      echo "<td colspan=2>";
                      echo "<a href='user_action.php?actiontype=putcart&user_id=$userID&delete_id=$delete_id&cart_id=$cart_id'  class='btn btn-lg btn-danger btn-inline-block text-uppercase mr-1 ml-1'>PUT INTO CART</a>";
                      echo "<a href='user_action.php?actiontype=deletes&favorite_id=$cart_id'  class='btn btn-lg btn-danger btn-inline-block text-uppercase mr-1 ml-1'>DELETE THIS TRAINER</a>";
                      echo "</td>";
                      echo "</tr>";
                      echo "</form>";
        
                      echo "</table>";
                }               
                    

          ?> 
            </div>
          </form>
        </div>
      </div> 
    </section>      
  </body>
</html>