<?php

    include 'user_action.php';
    $userID = $_SESSION['login_id'];
    $didi = $Users->displayoneuser($userID);

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
      .namename{
        color:#bd2130;
      }
  </style>

</head>

<body class="d-flex flex-column">

    <?php include 'sidebar_user.php' ?>

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center">
        <div class="w-100 vh-100">
        <div id="page-content">
        <div class="row justify-content-center m-0 text-center">
            <h2 class='display-2'>THANK YOU FOR SHOPPING, <span class="namename">
            <?php  
                  foreach($didi as $key => $row){
                    echo $row['username'];
                    echo " !!!";
                  }
             ?>
            </h2></span><br>
            <h2 class="display-2">PLEASE GO TO HISTORY PAGE AND CONFIRM THE PURCASES YOU BOUGHT.</h2>
            <h2 class="display-2">AND PLEASE CONTINUE SHOPPING.</h2>
            <a href="trainerlist_new.php" role="button" class="btn btn-lg btn-danger btn-block text-uppercase p-5 mt-5 hotaka">GO BACK TO TOP</a>
        </div>  
        </div>
        </div>
      </div> 
    </section>      
  </body>
</html>