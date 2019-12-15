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
                height :550px;
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

                    echo "<form action='user_action.php' method='post'>";
                    echo "<tr>";
                    echo "<td>QUANTITY(hour)</td>";
                    echo "<td>";
                    echo "<div class='form-group'>";
                    echo "<select name='quan' class='form-control'>";
                    for($i=1;$i<=100;$i++){
                        echo "<option value='$i'>$i</option>";    
                    }
                    echo "</select>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>"; 
         
                    echo "<tr>";
                    echo "<td colspan=2>";
                    echo "<input type='hidden' name='user_id' value='$userID'>";
                    echo "<input type='hidden' name='delete_id' value='$delete_id'>";
                    echo "<button class='btn btn-lg btn-danger btn-block text-uppercase' type='submit' name='delete_cart'>DELETE THIS TRAINER</button>"; 
                    echo "</td>";
                    echo "</tr>";
        
                    echo "</table>";
                }
          ?>    
           </div>
                    
          <button class='btn btn-lg btn-danger btn-block text-uppercase w-100 p-5 mb-5 buy' type='submit' name='confirm'>CONFIRM</button>
          </form>
        </div>
      </div> 
    </section>      
  </body>
</html>