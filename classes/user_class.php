<?php

include 'database.php';

if(empty($_SESSION['login_id'])){
    header('location: login.php');
}

class User extends Database{
    public function add_cart($trainer_id,$user_id){
        $sql = "INSERT INTO cart(user_id,trainer_id,quantity)VALUES('$user_id','$trainer_id','1')";
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannot add cart'.$this->conn->connect_error);
        }else{
            header('location: trainerlist_new.php');
        }
    }

    public function display_cart($id){
        $sql = "SELECT * FROM cart INNER JOIN users ON cart.user_id = users.user_id INNER JOIN product ON cart.trainer_id = product.trainer_id WHERE users.user_id ='$id'";
        $result = $this->conn->query($sql);

        if($result->num_rows>0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[]=$rows;
            }return $row;
        }else{
            header('location: cart_none.php');
        }
    }

    public function delete_cart($cart_id){

        $sql = "DELETE FROM cart WHERE cart_id = '$cart_id' ";
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannot delete cart'.$this->conn->connect_error);
        }else{
            header('location: cart.php');
        }
    }

    public function edit_cart($quan,$userID,$delete_id,$cart){
        // $amount_trainer = count($delete_id);

        // for($i=0;$i<$amount_trainer;$i++){
        $sql = "UPDATE cart SET user_id='$userID', trainer_id='$delete_id',quantity='$quan' WHERE cart_id = '$cart'";
        $result = $this->conn->query($sql);
    // }

        // if($result == false){
        //     die('cannot edit cart'.$this->conn->connect_error);
        //     // header('location: cart.php');
        // }else{
        //     header('location: cart.php');
        // }
    }

    public function display($id){
        $sql = "SELECT * FROM cart INNER JOIN product ON cart.trainer_id = product.trainer_id WHERE user_id ='$id'";
        $result = $this->conn->query($sql);

        if($result->num_rows>0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[]=$rows;
            }return $row;
        }else{
            die('cannot display'.$this->conn->connect_error);
        }
    }

    // confirm ---- settle , coupon--------------------------------------

    public function add_confirm($userID,$delete_id,$quan){
        $amount_trainer = count($delete_id);

            for($i=0;$i<$amount_trainer;$i++){
            $sql = "INSERT INTO confirm(user_id,trainer_id,quantity,settle,coupon)VALUES('$userID[$i]','$delete_id[$i]','$quan[$i]','L','L')";
            $result = $this->conn->query($sql);
        }

            if($result == false){
                die('cannnot add to confirm cart'.$this->conn->connect_error);
            }else{
                for($i=0;$i<$amount_trainer;$i++){
                    $sqls = "DELETE FROM cart WHERE user_id = '$userID[$i]'";
                    $results = $this->conn->query($sqls);
                }
                if($result == false){
                    die('cannnot add to confirm'.$this->conn->connect_error);
                }else{
                    header('location: cart_thanks.php');
                }
            }   
    }

    public function display_history($id){
        $sql = "SELECT * FROM confirm INNER JOIN users ON confirm.user_id = users.user_id INNER JOIN product ON confirm.trainer_id = product.trainer_id WHERE users.user_id ='$id' ";
        $result = $this->conn->query($sql);

        if($result->num_rows>0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[]=$rows;
            }return $row;
        }else{
            header('location:cart_history_none.php');
        } 
    }

    // ------ favorite -------------------------
    public function add_favorite($x,$y){
        $sql = "INSERT INTO favorite(user_id,trainer_id,quantity)VALUES('$y','$x','1')";
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannot add favorite'.$this->conn->connect_error);
        }else{
            header('location: trainerlist_new.php');
        }
    }

    public function display_favorite($id){
        $sql = "SELECT * FROM favorite INNER JOIN users ON favorite.user_id = users.user_id INNER JOIN product ON favorite.trainer_id = product.trainer_id WHERE users.user_id ='$id' ";
        $result = $this->conn->query($sql);

        if($result->num_rows>0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[]=$rows;
            }return $row;
        }else{
            header('location:cart_favorite_none.php');
        } 
    }

    public function delete_favorite($cart_id){

        $sql = "DELETE FROM favorite WHERE cart_id = '$cart_id' ";
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannot delete cart'.$this->conn->connect_error);
        }else{
            header('location: trainerlist_favorite.php');
        }
    }

    public function add_carts($x,$y,$z){
        $sql = "INSERT INTO cart(user_id,trainer_id,quantity)VALUES('$y','$x','1')";
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannot add favorite'.$this->conn->connect_error);
        }else{
            $sql = "DELETE FROM favorite WHERE cart_id = '$z' ";
            $result = $this->conn->query($sql);

            if($result == false){
                die('cannot delete favorite cart'.$this->conn->connect_error);
            }else{
                header('location: trainerlist_favorite.php');
            }
        }
    }

    public function add_cartin($x,$y){
        $sql = "INSERT INTO cart(user_id,trainer_id,quantity)VALUES('$y','$x','1')";
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannot add cart from history'.$this->conn->connect_error);
        }else{
                header('location: trainerlist_history.php');
            }
    }

    public function displayoneuser($x){
        $sql = "SELECT * FROM login WHERE login_id = '$x' ";
        $result = $this->conn->query($sql);

        if($result->num_rows>0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[]=$rows;
            }return $row;
        }else{
            die('cannot display one user'.$this->conn->connect_error);
        } 
    }

 // ------ setting -------------------------
    public function edit_setting($fname,$lname,$uname,$email,$password,$userID,$image){
        $image =  $_FILES['images']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir .basename($_FILES['images']['name']);

        $sql = "UPDATE users INNER JOIN login ON users.login_id = login.login_id SET user_fname = '$fname',user_lname = '$lname',username = '$uname', user_email = '$email',password = '$password', user_image = '$image' WHERE users.user_id = '$userID'"; 
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannot edit setting'.$this->conn->connect_error);
        }else{
            move_uploaded_file($_FILES['images']['tmp_name'],$target_file);
            header('location: setting.php');
        }
    }

    public function display_onesetting($userID){
        $sql = "SELECT * FROM users INNER JOIN login ON users.login_id = login.login_id WHERE users.user_id = '$userID'";
        $result = $this->conn->query($sql);

        if($result->num_rows>0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[]=$rows;
            }return $row;
        }else{
            die('cannot display one setting'.$this->conn->connect_error);
        } 
    }

}
?>