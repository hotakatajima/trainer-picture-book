<?php

include 'database.php';

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

    // public function add_another($settle,$coupon,$user_id){
    //     $amount_settle = count($settle);

    //     for($i=0;$i<$amount_settle;$i++){
    //     $sql = "UPDATE cart SET user_id = '',trainer_id = '',quantity = '',settle = '$settle[$i]',coupon = '$coupon[$i]' WHERE userid = '$user_id'";
    //     $result = $this->conn->query($sql);
    //     }

    //     if($result == false){
    //         die('cannot add cart'.$this->conn->connect_error);
    //     }else{
    //         header('location: cart.php');
    //     }
    // }

}
?>