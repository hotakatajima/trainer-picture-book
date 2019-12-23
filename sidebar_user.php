<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="setting.php">
      <span class="d-block d-lg-none">You can find your favorite trainers.</span>
      <span class="d-none d-lg-block">
        <?php
            $tenta = $Users->display_onesetting($userID);

            foreach($tenta as $key => $row){
              $image = $row['user_image'];
              
              if(empty($row['user_image'])){
                echo "<img class='img-fluid img-profile rounded-circle mx-auto mb-2' src='upload/dog.jpg'>";
              }else{
                echo "<img class='img-fluid img-profile rounded-circle mx-auto mb-2' src='upload/$image'> ";
              }
            }
        ?>
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="trainerlist_new.php">TOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="trainerlist_favorite.php">Favorite</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="trainerlist_history.php">Purchase History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="setting.php">Setting</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>