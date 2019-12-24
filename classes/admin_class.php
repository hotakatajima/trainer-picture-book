<?php

include 'database.php';

if(empty($_SESSION['login_id'])){
    header('location: login.php');
}

class Admin extends Database{

    public function add_trainer($fname,$lname,$uname,$email,$description,$phone,$address,$trainergender,$image,$price){

        $image = $_FILES['image']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir .basename($_FILES['image']['name']);

        $inserttrainer = "INSERT INTO product(trainer_fname,trainer_lname,trainer_uname,trainer_email,trainer_description,trainer_phone,trainer_address,trainer_gender,trainer_image,trainer_price)VALUES('$fname','$lname','$uname','$email','$description','$phone','$address','$trainergender','$image','$price')";
        $result = $this->conn->query($inserttrainer);

        if($result == false){
            die('cannot add trainer'.$this->conn->connect_error);
        }else{
            move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
            header('location: admin.php');
        }
    }

    public function display_trainer(){
        $displaytrainer = "SELECT * FROM product";
        $result = $this->conn->query($displaytrainer); 

        if($result->num_rows >0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[] = $rows;
            }return $row;
        }else{
            return false;
        }
    }

    public function displayorder_trainerdesc(){
        $displaytrainer = "SELECT * FROM product ORDER BY trainer_price desc";
        $result = $this->conn->query($displaytrainer); 

        if($result->num_rows >0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[] = $rows;
            }return $row;
        }else{
            return false;
        }
    }

    public function displayorder_trainerasc(){
        $displaytrainer = "SELECT * FROM product ORDER BY trainer_price asc";
        $result = $this->conn->query($displaytrainer); 

        if($result->num_rows >0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[] = $rows;
            }return $row;
        }else{
            return false;
        }
    }

    public function displayorder_trainermale(){
        $displaytrainer = "SELECT * FROM product WHERE trainer_gender = 'Male'";
        $result = $this->conn->query($displaytrainer); 

        if($result->num_rows >0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[] = $rows;
            }return $row;
        }else{
            return false;
        }
    }

    public function displayorder_trainerfemale(){
        $displaytrainer = "SELECT * FROM product WHERE trainer_gender = 'Female'";
        $result = $this->conn->query($displaytrainer); 

        if($result->num_rows >0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[] = $rows;
            }return $row;
        }else{
            return false;
        }
    }

    public function display_onetrainers($userID){
        $displayalltrainer = "SELECT * FROM product WHERE trainer_id = '$userID'";
        $result = $this->conn->query($displayalltrainer);

        if($result == false){
            die('cannot one trainer'.$this->conn->connect_error);
        }else{
            return $result->fetch_assoc();
        }
    }

    public function delete_trainer($userID){
        $delete_trainer = "DELETE FROM product WHERE trainer_id = '$userID'";
        $result = $this->conn->query($delete_trainer);

        if($result == false){
            die('cannot delete trainer'.$this->conn->connect_error);
        }else{
            header('location: admin.php');
        }
    }

    public function edit_trainer($userID,$fname,$lname,$uname,$email,$description,$phone,$address,$trainergender,$image,$price){

        $image = $_FILES['images']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir .basename($_FILES['images']['name']);

        $edit_trainer = "UPDATE product SET trainer_fname = '$fname',trainer_lname = '$lname', trainer_uname = '$uname', trainer_email = '$email', trainer_description = '$description', trainer_phone = '$phone',trainer_address = '$address',trainer_gender = '$trainergender', trainer_image = '$image', trainer_price = '$price' WHERE trainer_id = '$userID' ";
        $result = $this->conn->query($edit_trainer);

        if($result == false){
            die('cannot edit trainer'.$this->conn->connect_error);
          }else{
            move_uploaded_file($_FILES['images']['tmp_name'],$target_file);
            header('location: admin.php');
        }
    }

    public function search_trainer($search){

        $serch = "SELECT * FROM product WHERE trainer_uname LIKE '%$search%' OR trainer_address LIKE '%$search%'";
        $result = $this->conn->query($serch);

        if($result->num_rows>0){
            $row = array();
            while($rows = $result->fetch_assoc()){
                $row[] = $rows;
            }return $row;
        }else{
            return false;
        }
    }
    
    public function display_login($id){
        $sql = "SELECT * FROM login WHERE login_id = '$id' ";
        $result = $this->conn->query($sql);

        if($result == false){
            if($result->num_rows>0){
                $row = array();
                while($rows = $result->fetch_assoc()){
                    $row[]=$rows;
                }return $row;
            }else{
                die('cannot display login user'.$this->conn->connect_error);
            }
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