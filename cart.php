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

  </style>

</head>

<body class="d-flex flex-column">

    <?php include 'sidebar.php' ?>

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center">
        <div class="w-100 vh-100">
        <div id="page-content">

        <div class="row justify-content-center m-0 text-center">

      <!-- <--?php
      if(isset($_POST['confirm'])){
        echo"<div class='row justify-content-center m-0 text-center'>";
        echo"<div class='card w-100 mb-5'>";
          echo "<div class='card-header'>";
              echo "<h2 class='display-2'>ESTIMATE</h2>";
          echo"</div>";
          echo"<div class='card-body'>";
              
          echo"</div>";
        echo"</div>";
      }
      ?> -->
           
      <?php
                $dispaly = $Users->display_cart($userID);
                foreach($dispaly as $key => $row){

                    $image = $row['trainer_image'];
                    $delete_id = $row['trainer_id'];

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
                      echo "<td>QUANTITY(hour)</td>";
                      echo "<td>";
                      echo "<div class='form-group'>";
                      echo "<select name='quan[]' class='form-control' required>";
                      for($i=1;$i<=100;$i++){
                          echo "<option value='$i'>$i</option>";    
                      }
                      echo "</select>";
                      echo "</div>";
                      echo "</td>";
                      echo "</tr>"; 
  
                      // echo "<tr>";
                      // echo "<td>SUM</td><td>".$row['trainer_price']."</td>";
                      // echo "</tr>";
           
                      echo "<tr>";
                      echo "<td colspan=2>";
                      echo "<input type='hidden' name='user_id[]' value='$userID'>";
                      echo "<input type='hidden' name='delete_id[]' value='$delete_id'>";
                      // echo "<button class='btn btn-lg btn-danger btn-inline-block text-uppercase ml-3' type='submit' name='delete_cart'>EDIT QUANTITY</button>"; 
                      echo "<button class='btn btn-lg btn-danger btn-block text-uppercase ml-3' type='submit' name='delete_cart'>DELETE THIS TRAINER</button>"; 
                      echo "</td>";
                      echo "</tr>";
        
                    echo "</table>";
                }
               
          ?>    
      </div>
        <table class='table-striped w-100 text-center mx-auto decline mb-5 table-bordered'>
          <tr>
            <td>HOW TO SETTLE</td>
              <td>
                <div class='form-group'>
                <select name='settle' class='form-control' required>
                <option value="" selected disabled>Choose how to settle</option>
                <option value="Credit card" disabled>Credit card</option>
                <option value="Convenience store payment" disabled>Convenience store payment</option>
                <option value="Bank transfer">Bank transfer</option>
                </select>
              </div>
            </td>
          </tr>

          <tr>
            <td>COUPON</td>
              <td>
                <div class='form-group'>
                  <input type="text" name="coupon" placeholder="Enter the number of coupon" maxlength="9" class="form-control">
              </div>
            </td>
          </tr>
        </table>
          <button class='btn btn-lg btn-danger btn-block text-uppercase w-100 p-5 mb-5 buy' type='submit' name='confirm'>CONFIRM</button>
         
          </form>
        </div>
      </div> 
    </section>      
  </body>
</html>