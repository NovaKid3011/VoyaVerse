<?php

include_once 'db.php';

class role{
  public $conn;

  public function __construct(){
    $db = new databaseConnection();
    $this->conn = $db->conn;
  }

  public function identify(){
    if(isset($_SESSION['authenticated'])){
      $user_id = $_SESSION['auth_user']['user_id'];
    }

    $checkAdmin = "SELECT ID,Role FROM users WHERE ID = '$user_id' AND Role = '1' LIMIT 1";
    $result = $this->conn->query($checkAdmin);
    if($result->num_rows == 1){
      return true;
    }else{
      return false;
    }
  }

}

?>