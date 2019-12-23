<?php
    if(empty($_SESSION['login_id'])){
      header('location: login.php');
    }elseif($_SESSION['user_status']=='admin'){
      header('location: admin.php');
    }else{
      $userID = $_SESSION['login_id'];
    }
?>

<form action="admin_action.php" method="post">
    <div class="form-group mt-5">
        <input type="text" name="admin_search" class="form-control w-75 d-inline mb-5" placeholder="Search trainer username or trainer address">
        <button class="btn btn-lg btn-danger btn-inline text-uppercase ml-2" type="submit" name="user_serch">GO</button><br>

        <select name="order" class="form-control w-75 text-center mx-auto d-inline mb-5">
            <option value="Order" disabled selected>Choose Price Ascending or Descending</option>
            <option value="Ascending order">Ascending order</option>
            <option value="Descending order">Descending order</option>
        </select>
        <button class="btn btn-lg btn-danger btn-inline text-uppercase ml-2" type="submit" name="user_order">GO</button><br>

        <select name="gender" class="form-control w-75 text-center mx-auto d-inline">
            <option value="" disabled selected>Choose Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <button class="btn btn-lg btn-danger btn-inline text-uppercase ml-2" type="submit" name="user_gender">GO</button>
    </div>
</form>