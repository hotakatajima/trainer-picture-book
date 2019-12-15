<?php

include 'database.php';

class User extends Database{
    public function add_cart($trainer_id,$user_id){
        $sql = "INSERT INTO cart(user_id,trainer_id)VALUES('$user_id','$trainer_id')";
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

    public function delete_cart($userID,$delete_id){
        $sql = "DELETE FROM cart WHERE user_id = '$userID' AND trainer_id = '$delete_id' ";
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannot delete cart'.$this->conn->connect_error);
        }else{
            header('location: cart.php');
        }
    }

    public function add_confirm($userID,$delete_id,$quan){
        $sql = "INSERT INTO confirm(user_id,trainer_id,quantity)VALUES($userID,$delete_id,$quan)";
        $result = $this->conn->query($sql);

        if($result == false){
            die('cannnot add to confirm'.$this->conn->connect_error);
        }else{
            header('location: cart_confirm.php');
        }
    }

}
?>