<?php

    include 'admin_action.php';

    if(empty($_SESSION['login_id'])){
      header('location: login.php');
    }else{
      $userID = $_SESSION['login_id'];
      $didi = $Admin->display_onetrainers($userID);
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Sticky Footer Classes */

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

            /* Other Classes for Page Styling */

            body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
            }

            .d-inline-block{
                width :350px;
                height :530px;
                /* border-radius: 10rem; */
            }

            .big{
                width :310px;
                text-align: center;
                overflow: scroll;
            }

            .alert-primary{
                font-size: 18px;
                padding: 20px;
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
              font-size:140px;
            }
            
            .img-thumbnail{
              width:195px;
              height:195px;
              overflow: hidden;
            }

            .addittion a{
              font-size: 22px;
            }

            .ceter{
              margin:0 auto;
            }

            .logout{
              position :absolute;
              top:50px;
              right:50px;
            }

    </style>
  </head>
  <body class="d-flex flex-column">
  <div id="page-content">
    <!-- <div class="container text-center"> -->
      <div class="row justify-content-center m-0 text-center">
        <div class="col-md-12 p-0">
          <h1 class="font-weight-light mt-4 text-white">Welcome to admin page !!!</h1>
          <p class="lead text-white-50"><?php echo $didi['trainer_fname'].$didi['trainer_lname'] ?> is qualified for editing database!!!</p>
          <a href='logout.php' role='button' class='logout btn btn-lg btn-danger p-3 pr-5 pl-5 text-uppercase'>Logout</a>
          
          <div class="addittion">
            <a href='admin_add.php' role='button' class='btn btn-lg btn-danger w-50 p-5 text-uppercase mt-5 mb-5'>Add new trainer</a>
          </div>
          <hr>
            
          <form action="admin_action.php" method="post">
            <div class="form-group mt-5">
                <div class="alert alert-danger w-50 mx-auto">Sorry, trainers you entered doesnt exist. Please search agein.</div>
                <input type="text" name="search" class="form-control w-25 d-inline p-3 mt-5" placeholder="Search trainer username">
                <button class="btn btn-lg btn-danger btn-inline text-uppercase ml-2" type="submit" name="admin_serch">GO</button>
                <!-- <a href="search_outcome.php?trainer_lname=" role="button" class="btn btn-lg btn-danger btn-inline-block w-25 text-uppercase ml-2">GO</a> -->
            </div>
          </form>

          <?php  

            $list = $Admin->display_trainer();

            foreach($list as $key => $row){
              $userID = $row['trainer_id'];

                echo "<div class='alert alert-primary d-inline-block m-5'>";

                if($row['trainer_image']== null){
                    echo "<i class='fas fa-user'></i><br><br><br>";
                }else{
                  $image = $row['trainer_image'];
                  echo "<div class='big'>";
                  echo "<img src='upload/$image' class='img-thumbnail rounded-circle'>";
                  echo "</div>";
                }
                
                echo "NAME : <br>";
                echo "<div class='big'>";
                echo $row['trainer_fname'].$row['trainer_lname']."<br><br>";
                echo "</div>";
                
                echo "GENDER : <br>";
                echo "<div class='big'>";
                echo $row['trainer_gender']."<br><br>";
                echo "</div>";           

                echo "UNAME : <br>";
                echo "<div class='big'>";
                echo $row['trainer_uname']."<br><br>";
                echo "</div>";                  
                
                echo "<a href='admin_edit.php?trainer_id=$userID' role='button' class='btn btn-lg btn-google btn-inline-block  text-uppercase mt-2 mb-2'>More detail</a>";
                // echo "<hr>";
                // echo "<a href='admin_delete.php?trainer_id=$userID' role='button' class='btn btn-lg btn-facebook btn-block text-uppercase mt-2 mb-2'>Delete this trainer</a>";
                echo "</div>";                
            }

          ?>

        </div>
      </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>