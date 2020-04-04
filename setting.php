<?php
    include 'user_action.php';

    if(empty($_SESSION['login_id'])){
      header('location: login.php');
    }elseif($_SESSION['user_status']=='admin'){
      header('location: admin.php');
    }else{
      $userID = $_SESSION['login_id'];
      $display = $Users->display_onesetting($userID);
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

</head>

<body class="d-flex flex-column">

    <?php include 'sidebar_user.php' ?>

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="about">
      <div class="w-100 vh-100">
        <div id="page-content">
            <h2 class='display-2 text-center font-weight-bold mb-5' style="text-decoration: underline">SETTING</h2>
           <div class="row justify-content-center m-0 text-center">
                <div class="col-md-12 p-0">

                <form action="user_action.php" method="post" class="form-signin" enctype="multipart/form-data">

                  <div class="row mr-0 ml-0 mt-5">
                    <div class="col-6">
                      <div class="form-label-group">
                          <label for="trainerlname">Fisrt name</label>
                          <input type="text" id="trainerfname" name="fname" class="form-control mb-3" placeholder=" <?php foreach($display as $key => $row){echo $row['user_fname'];} ?>" required autofocus maxlength="100">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-label-group">
                          <label for="trainerlname">Last name</label>
                          <input type="text" id="trainerlname" name="lname" class="form-control mb-3" placeholder=" <?php foreach($display as $key => $row){echo $row['user_lname'];} ?>" required maxlength="100">
                      </div>                        
                    </div>
                  </div>

                  <div class="row mt-5 mr-0 ml-0">
                      <div class="col-4">
                        <div class="form-label-group">
                        <label for="traineruname">Username</label>
                        <input type="text" id="traineruname" name="uname" class="form-control mb-3" placeholder=" <?php foreach($display as $key => $row){echo $row['username'];} ?>" required maxlength="100">
                        </div>
                      </div>                      
                      <div class="col-4">
                        <div class="form-label-group">
                        <label for="traineremail">Email</label>
                        <input type="email" id="traineremail" name="email" class="form-control mb-3" placeholder=" <?php foreach($display as $key => $row){echo $row['user_email'];} ?>" required maxlength="100">
                        </div>
                      </div>                      
                      <div class="col-4">
                        <div class="form-label-group">
                          <label for="trainerpassword">Password</label>
                          <input type="password" id="trainerpassword" name="password" class="form-control mb-3" placeholder="" required maxlength="100">
                        </div>
                      </div>                      
                  </div>

                  <input type="hidden" name="id" value="<?php foreach($display as $key => $row){echo $row['user_id'];} ?>">

                  <input type="file" name="images" class="mt-5" placeholder="Image" maxlength="100">

                  <button class='btn btn-lg btn-danger btn-block text-uppercase mt-5' type='submit' name='setting'>EDIT</button>
                </form>
              </div>
           </div>
        </div>
      </div> 
    </section>      
  </body>
</html>
