<?php

    include 'admin_action.php';

    // if(empty($_SESSION['login_id'])){
    //   header('location: login.php');
    // }else{
    //   $userID = $_SESSION['login_id'];
    //   $didi = $Admin->display_onetrainers($userID);
    // }

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
                height :650px;
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

            .btn-google {
            color: white;
            background-color: #ea4335;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            /* padding: 1rem; */
            transition: all 0.2s;
            }

            .btn-facebook {
            color: white;
            background-color: #3b5998;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            /* padding: 1rem; */
            transition: all 0.2s;
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

  </style>

</head>

<body class="d-flex flex-column">

    <?php include 'sidebar.php' ?>

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="about">
        <div class="w-100 vh-100">
        <div id="page-content">

      <div class="row justify-content-center m-0 text-center">
        <div class="col-md-12 p-0">
          <!-- <h1 class="font-weight-light mt-4 text-white">Welcome to admin page !!!</h1>
          <p class="lead text-white-50"> is qualified for editing database!!!</p>
          <a href='logout.php' role='button' class='logout btn btn-lg btn-danger p-3 pr-5 pl-5 text-uppercase'>Logout</a> -->
          
          <!-- <div class="addittion">
            <a href='admin_add.php' role='button' class='btn btn-lg btn-danger w-50 p-5 text-uppercase mt-5 mb-5'>Add new trainer</a>
          </div> -->

            
          <form action="admin_action.php" method="post">
            <div class="form-group mt-5">
                <div class="alert alert-danger w-75 mb-5 mx-auto">Sorry, trainers you entered doesnt exist. Please search again.</div>
                <input type="text" name="admin_search" class="form-control w-75 d-inline mb-5" placeholder="Search trainer username">
                <button class="btn btn-lg btn-danger btn-inline text-uppercase ml-2" type="submit" name="user_serch">GO</button>
                <!-- <button class="btn btn-lg btn-danger btn-inline text-uppercase ml-2" type="submit" name="admin_serch">GO</button> -->
                <!-- <a href="search_outcome.php?trainer_lname=" role="button" class="btn btn-lg btn-danger btn-inline-block w-25 text-uppercase ml-2">GO</a> -->
            </div>
          </form>

          <?php  

            $list = $Admin->display_trainer();

            foreach($list as $key => $row){
              $userID = $row['trainer_id'];

                echo "<div class='alert alert-primary d-inline-block w-100 mt-5 display-3'>";


                if($row['trainer_image']== null){
                  echo "<i class='fas fa-user post'></i><br><br><br>";
                }else{
                  $image = $row['trainer_image'];
                  echo "<div class='big'>";
                  echo "<img src='upload/$image' class='img-thumbnail rounded-circle pos'><br><br><br>";
                  echo "</div>";
                }
                
                echo "<div class='display-4'>";

                echo "<div class='big'>";
                echo "NAME : ";
                echo $row['trainer_fname'].$row['trainer_lname'];
                echo "</div><br>";
                
                
                echo "<div class='big'>";
                echo "GENDER : ";
                echo $row['trainer_gender'];
                echo "</div><br>";

                echo "<div class='big'>";
                echo "PRICE(per hour) : ";
                echo $row['trainer_price'];
                echo "</div><br>";  

                echo "ADDRESS : <br>";
                echo "<div class='big'>";
                echo $row['trainer_address']."<br>";
                echo "</div>";            
                
                echo "<a href='user_edit.php?trainer_id=$userID' role='button' class='btn btn-lg btn-google btn-inline-block p-4 text-uppercase jojo'>READ MORE</a>";
                echo "</div>";

                echo "</div>";
            }

          ?>

          </div>
        </div>
      </div>

      <!-- <div class="bulk navbar navbar-expand-lg navbar-dark bg-primary mt-5 mb-3 text-center" id="confirm">
            <h1 class="text-light pt-3 pl-3">CONFIRM YOYR SHOPPING</h1>
      </div> -->


      </div> 
    </section>      
  </body>
</html>
