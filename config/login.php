<?php

include 'db.php';

class login{
  private $conn;

  public function __construct(){
    $db = new databaseConnection();
    $this->conn = $db->conn;
  }

  public function userLogin($email, $password){
    $checkLogin = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = $this->conn->query($checkLogin);
    if($result->num_rows > 0){
      $data = $result->fetch_assoc();
      if(password_verify($password, $data['Password'])){
        $this->userAuthentication($data);
        return true;
      }
    }else{
      return false;
    }

  }

  public function userAuthentication($data){
    $_SESSION['authenticated'] = true;
    $_SESSION['auth_user'] = [
      'user_id' => $data['ID'],
      'user_fname' => $data['First_name'],
      'user_lname' => $data['Last_name'],
      'user_email' => $data['Email']
    ];
  }

}

?>