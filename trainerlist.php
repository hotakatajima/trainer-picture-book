<?php

    include 'admin_action.php';
    $userID = $_SESSION['login_id'];
    $didi = $Admin->displayoneuser($userID);

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

   <section class="resume-section p-3 p-lg-5 d-flex align-items-center">
      <div class="w-100">
        <h1 class="mb-0">WELCOME TO<span class="text-primary">
          <?php  
            foreach($didi as $key => $row){
              echo $row['username'];
              echo " !!!</span><br>";
            }
          ?>
          FIND YOUR FAVORITE
          <span class="text-primary">TRAINER</span>
        </h1>
        <div class="subheading mb-5">If you have some questions, you can contact
          <a href="mailto:cart@gmail.com">cart@gmail.com</a>
        </div>
        <p class="lead mb-5">
          <h3>All you have to do is just 3 steps!!!</h3>
          <ol>
            <li>Choose some trainers you like.</li>
            <li>Decide time you want to recieve training.</li>
            <li>Press the button of conform.</li>
          </ol>
        </p>
        <div class="social-icon text-center ">
          <a href="#about">
            <i class="fas fa-arrow-circle-down"></i>
          </a>
        </div>
      </div>
    </section> 
    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="about">
        <div class="w-100 vh-100">
        <div id="page-content">

      <div class="row justify-content-center m-0 text-center">
        <div class="col-md-12 p-0">
            
          <?php include 'forms.php' ?>

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
      </div> 
    </section>      
  </body>
</html>
