<?php

    include 'user_action.php';

    if(empty($_SESSION['login_id'])){
      header('location: login.php');
    }elseif($_SESSION['user_status']=='admin'){
      header('location: admin.php');
    }else{
      $userID = $_SESSION['login_id'];
      $settle = $_GET['settle'];
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

        <div class="row justify-content-center m-0 text-center">

        <div class='row justify-content-center m-0 text-center'>
        <div class='card w-100 mb-5'>
          <div class='card-header'>
              <h2 class='display-2'>ESTIMATE</h2>
          </div>
          <div class='card-body'>
            <?php
                $sum = 0;
                $dispaly = $Users->display_cart($userID);

                foreach($dispaly as $key => $row){
                  echo "<h3>TRAINER NAME :".$row['trainer_fname'].$row['trainer_lname']."</h3>";
                  echo "<h3>PRICE :".$row['trainer_price']."</h3>";
                  echo "<h3>TIME(hour) :".$row['quantity']."</h3>";
                  echo "<h3>SUM :".$row['trainer_price']*$row['quantity']."</h3>";
                  echo "<hr>";

                  $sum += $row['trainer_price']*$row['quantity'];
                }
                echo "<div class='alert alert-danger'>";
                echo "<h3>TOTAL AMOUNT: $sum</h3>";
                echo "<h3>COUPON: NOTHING</h3>";
                echo "<h3>HOW TO SETTLE: ";
                if($settle == 'Credit'){
                  echo "Credit card (5% OFF)";
                  echo "</h3>";
                  echo "<h3>FIANL AMOUNT: ".floor($sum * 0.95)."</h3>";
                }elseif($settle == 'Convenience'){
                  echo "Convenience store payment (3% OFF)";
                  echo "</h3>";
                  echo "<h3>FIANL AMOUNT: ".floor($sum * 0.97)."</h3>";
                }else{
                  echo "Bank transfer";
                  echo "</h3>";
                  echo "<h3>FIANL AMOUNT: ".floor($sum)."</h3>";
                }
                echo "</div>";
            ?>
          </div>
        </div>
                   
      <?php
                foreach($dispaly as $key => $row){

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
                      echo "<td>MONEY PER HOUR</td><td>".$row['trainer_price']."</td>";
                      echo "</tr>";
  
                      echo "<form action='user_action.php' method='post'>";
                      echo "<tr>";
                      echo "<td>TIME(hour)</td>";
                      echo "<td>";
                      echo "<div class='form-group'>";
                      echo "<input type='number' name='quan[]' class='form-control' >";
                      echo "</div>";
                      echo "</td>";
                      echo "</tr>"; 
           
                      echo "<tr>";
                      echo "<td colspan=2>";
                      echo "<input type='hidden' name='user_id[]' value='$userID'>";
                      echo "<input type='hidden' name='delete_id[]' value='$delete_id'>";
                      echo "<input type='hidden' name='cart_id[]' value='$cart_id'>";
                      echo "<button class='btn btn-lg btn-danger btn-inline-block text-uppercase mr-1 ml-1' type='submit' name='edit_cart'>EDIT THIS</button>"; 
                      echo "<a href='user_action.php?actiontype=delete&cart_id=$cart_id'  class='btn btn-lg btn-danger btn-inline-block text-uppercase mr-1 ml-1'>DELETE THIS</a>";
                      echo "</td>";
                      echo "</tr>";
        
                      echo "</table>";
                }               
                    

          ?> 
          </div>
        </form>

          <table class='table-striped w-100 text-center mx-auto decline mb-5 table-bordered'>
          <form action="user_action.php" method="post">
            <tr>
              <td><span class="font">HOW TO SETTLE</span><br>Credit card: 5% off<br>Convenience store payment: 3% off</td>
                <td>
                  <div class='form-group'>
                  <select name='settle' class='form-control' required>
                  <option value="" selected disabled>Choose how to settle</option>
                  <option value="Credit">Credit card</option>
                  <option value="Convenience">Convenience store payment</option>
                  <option value="Bank">Bank transfer</option>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td><span class="font">COUPON</span></td>
                <td>
                  <div class='form-group'>
                    <input type="text" name="coupon" placeholder="Enter the number of coupon" maxlength="9" class="form-control">
                </div>
              </td>
            </tr>
            <tr>
              <td colspan=2>
                <button class='btn btn-lg btn-danger btn-block text-uppercase mr-1 ml-1' type='submit' name='enter'>ENTER</button>  
              </td>
            </tr>
            </form>
          </table>

          <?php
                echo "<form action='user_action.php' method='post' class='w-100 mt-5'>";
                    $displaycart = $Users->display($userID);
                    foreach($displaycart as $key => $row){
                      $quan_id = $row['quantity'];
                      $delete_id = $row['trainer_id'];
                      echo "<input type='hidden' name='user_id[]' value='$userID'>";
                      echo "<input type='hidden' name='delete_id[]' value='$delete_id'>";
                      echo "<input type='hidden' name='quan_id[]' value='$quan_id'>";
                    }
                    echo "<button class='btn btn-lg btn-danger btn-block text-uppercase p-5 mb-5 mr-1 ml-1' type='submit' name='confirm'>CONFIRM</button>"; 
                echo "</form>";
          ?>

        </div>
      </div> 
    </section>      
  </body>
</html>