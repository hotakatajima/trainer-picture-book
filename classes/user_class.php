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

    public function add_confirm($userID,$delete_id,$quan,$settle,$coupon){
        $amount_trainer = count($delete_id);

            for($i=0;$i<$amount_trainer;$i++){
            $sql = "INSERT INTO confirm(user_id,trainer_id,quantity,settle,coupon)VALUES('$userID[$i]','$delete_id[$i]','$quan[$i]','$settle','$coupon')";
            $result = $this->conn->query($sql);
        }

            if($result == false){
                die('cannnot add to confirm'.$this->conn->connect_error);
            }else{
                for($i=0;$i<$amount_trainer;$i++){
                    $sqls = "DELETE FROM cart WHERE user_id = '$userID[$i]' AND trainer_id = '$delete_id[$i]' ";
                    $results = $this->conn->query($sqls);
                }
                if($result == false){
                    die('cannnot add to confirm'.$this->conn->connect_error);
                }else{
                    header('location: cart_thanks.php');
                }
            }   
    }

    // public function final_display($id){
    //     $sql = "SELECT * FROM confirm INNER JOIN users ON confirm.user_id = users.user_id INNER JOIN product ON confirm.trainer_id = product.trainer_id WHERE confirm.user_id ='$id'";
    //     $result = $this->conn->query($sql);

    //     if($result->num_rows>0){
    //         $row = array();
    //         while($rows = $result->fetch_assoc()){
    //             $row[]=$rows;
    //         }return $row;
    //     }else{
    //         die('cannot display'.$this->conn->connect_error);
    //     }
    // }

    // public function display($id){
    //     $sql = "SELECT * FROM users WHERE user_id ='$id'";
    //     $result = $this->conn->query($sql);

    //     if($result->num_rows>0){
    //         $row = array();
    //         while($rows = $result->fetch_assoc()){
    //             $row[]=$rows;
    //         }return $row;
    //     }else{
    //         die('cannot display'.$this->conn->connect_error);
    //     }
    // }

    // public function display_quan($id){
    //     $sql = "SELECT * FROM confirm WHERE user_id ='$id'";
    //     $result = $this->conn->query($sql);

    //     if($result->num_rows>0){
    //         $row = array();
    //         while($rows = $result->fetch_assoc()){
    //             $row[]=$rows;
    //         }return $row;
    //     }else{
    //         die('cannot display'.$this->conn->connect_error);
    //     }
    // }

    // public function edit_quantity($id,$x,$y){
    //     $sql = "UPDATE confirm SET quantity = '$x' WHERE user_id ='$id' AND  trainer_id = '$y' ";
    //     $result = $this->conn->query($sql);

    //     if($result == false){
    //         die('cannot edit quantity'.$this->conn->connect_error);
    //       }else{
    //         header('location: cart.php');
    //     }
    // }


}
?>