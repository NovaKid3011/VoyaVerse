<?php

include 'db.php';

class register{
  private $conn;

  public function __construct(){
    $db = new databaseConnection();
    $this->conn = $db->conn;
  }
  
  public function registration($fname, $lname, $photo, $gender, $email, $password){
    $extension = substr($photo,strlen($photo)-4,strlen($photo));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    if(!in_array($extension,$allowed_extensions)){
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }else{
      $imgnewfile=md5($photo).$extension;
      move_uploaded_file($_FILES["photo"]["tmp_name"],"../images/profile/".$imgnewfile);
    }

    $register_query = "INSERT INTO Users (First_name, Last_name, Photo, Gender, Email, Password)
    VALUES ('$fname', '$lname', '$imgnewfile', '$gender', '$email', '$password')";
    $result = $this->conn->query($register_query);
    return $result;
  }

  public function isUserExists($email){
    $checkUser = "SELECT email FROM  Users WHERE email = '$email' LIMIT 1";
    $result = $this->conn->query($checkUser);
    if($result->num_rows > 0){
      return true;
    }else{
      return false;
    }
  }
  
  public function confirmPassword($password,$c_password){
    if($password == $c_password){
      return true;
    }else{
      return false;
    }
  }
}

?>