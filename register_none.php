<?php

include 'classes/login_class.php';

if(!empty($_SESSION['login_id'])){

  if($_SESSION['user_status']=='admin'){
    header('location: admin.php');
  }else{
    header('location: trainerlist.php');
  }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
                        :root {
            --input-padding-x: 1.5rem;
            --input-padding-y: .75rem;
            }

            body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
            }

            .card-signin {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
            }

            .card-signin .card-title {
            margin-bottom: 2rem;
            font-weight: 300;
            font-size: 1.5rem;
            }

            .card-signin .card-body {
            padding: 2rem;
            }

            .form-signin {
            width: 100%;
            }

            .form-signin .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            transition: all 0.2s;
            }

            .form-label-group {
            position: relative;
            margin-bottom: 1rem;
            }

            .form-label-group input {
            height: auto;
            border-radius: 2rem;
            }

            .form-label-group>input,
            .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x);
            }

            .form-label-group>label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            /* Override default `<label>` margin */
            line-height: 1.5;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
            }

            .form-label-group input::-webkit-input-placeholder {
            color: transparent;
            }

            .form-label-group input:-ms-input-placeholder {
            color: transparent;
            }

            .form-label-group input::-ms-input-placeholder {
            color: transparent;
            }

            .form-label-group input::-moz-placeholder {
            color: transparent;
            }

            .form-label-group input::placeholder {
            color: transparent;
            }

            .form-label-group input:not(:placeholder-shown) {
            padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
            padding-bottom: calc(var(--input-padding-y) / 3);
            }

            .form-label-group input:not(:placeholder-shown)~label {
            padding-top: calc(var(--input-padding-y) / 3);
            padding-bottom: calc(var(--input-padding-y) / 3);
            font-size: 12px;
            color: #777;
            }

            .btn-google {
            color: white;
            background-color: #ea4335;
            }

            .btn-facebook {
            color: white;
            background-color: #3b5998;
            }

            /* Fallback for Edge
            -------------------------------------------------- */

            @supports (-ms-ime-align: auto) {
            .form-label-group>label {
                display: none;
            }
            .form-label-group input::-ms-input-placeholder {
                color: #777;
            }
            }

            /* Fallback for IE
            -------------------------------------------------- */

            @media all and (-ms-high-contrast: none),
            (-ms-high-contrast: active) {
            .form-label-group>label {
                display: none;
            }
            .form-label-group input:-ms-input-placeholder {
                color: #777;
            }
            }
    </style>
  </head>

  <body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="alert alert-danger mt-5">This password already exsists. Enter another password.</div>
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form action="login_action.php" method="post" class="form-signin">
              <div class="form-label-group">
                <input type="text" id="inputfname" name="fname" class="form-control" placeholder="First Name" required autofocus>
                <label for="inputfname">First Name</label>
              </div>

              <div class="form-label-group">
                <input type="text" id="inputlname" name="lname" class="form-control" placeholder="Last Name" required>
                <label for="inputlname">Last Name</label>
              </div>

              <div class="form-label-group">
                <input type="text" id="inputuname" name="uname" class="form-control" placeholder="Username" required>
                <label for="inputuname">Username</label>
              </div>
              
              <div class="form-label-group">
                <input type="email" id="inputemail" name="email" class="form-control" placeholder="Email" required>
                <label for="inputemail">Email</label>
              </div>

              <div class="form-label-group mb-5">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="add_user">register</button>
              <hr class="my-4">
              <a href="login.php" class="btn btn-lg btn-google btn-block text-uppercase">Go back to login</a>
              
            </form>
          </div>
        </div>
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