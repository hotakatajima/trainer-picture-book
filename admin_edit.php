<?php

include 'admin_action.php';

if(empty($_SESSION['login_id'])){
  header('location: login.php');
}else{
  $userID = $_GET['trainer_id'];
  $got = $Admin->display_onetrainers($userID);  
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
                height :500px;
            }

            .big{
                width :310px;
                text-align: center;

                /* height :150px; */
                overflow: scroll;
            }

            .alert-primary{
                font-size: 18px;
                padding: 20px;
            }

            .text-uppercase{
                font-size: 14px;
            }

            .btn-danger{
                padding:30px 100px;
                display:inline-block;
            }
            .btn-google {
            color: white;
            background-color: #ea4335;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 2rem 6rem;
            transition: all 0.2s;
            }

            .btn-facebook {
            color: white;
            background-color: #3b5998;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 2rem 6rem;
            transition: all 0.2s;
            }

            .btn-secondary{
            color: white;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 2rem 6rem;
            transition: all 0.2s;
            }

            table{
                margin-top:100px;
                margin-bottom:50px;
                width:1200px;
                table-layout: fixed;
                font-size:24px;
                /* background: white; */
            }

            td{
                padding: 30px;
                  /*word-break: break-all;*/
                overflow-wrap : break-word;
            }

            .fas{
              font-size:140px;
            }

            .img-thumbnail{
              width:195px;
              height:195px;
              overflow: hidden;
            }

    </style>
  </head>
  <body class="d-flex flex-column">
  <div id="page-content">
        <?php

                echo "<table class='table-striped text-center mx-auto table-bordered'>";

                if($got['trainer_image']== null){
                    echo "<tr>";
                    echo "<td colspan=2>";
                    echo "<i class='fas fa-user'></i><br><br><br>";
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
                echo "<td>ADDRESS</td><td>".$got['trainer_address']."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>PRICE(per hour)</td><td>".$got['trainer_price']."</td>";
                echo "</tr>";
                echo "</table>";

                echo "<div class='text-center mb-5'>";
                echo "<a href='admin_edit_scc.php?trainer_id=$userID' role='button' class='ax-auto btn btn-lg btn-google btn-inline-block text-uppercase m-5'>Edit this trainer</a>";
                echo "<a href='admin_delete.php?trainer_id=$userID' role='button' class='btn btn-lg btn-facebook btn-inline-block text-uppercase m-5'>Delete this trainer</a>";
                echo "<hr>";
                echo "<a href='admin.php' role='button' class='btn btn-lg btn-secondary  btn-inline-block text-uppercase m-5'>Go back to admin</a>";
                echo "</div>";
                
        ?>
  </div>
  <!--    Optional JavaScript
     jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>