<?php

include_once 'identify_role.php';

class fetch{
  public $conn;

  public function __construct(){
    $db = new databaseConnection();
    $this->conn = $db->conn;
  }

  public function image_get($page){
    if(isset($_SESSION['authenticated'])){
      $email = $_SESSION['email'];
    }

    $sqlImage = "SELECT * FROM users WHERE email = '$email'";
    $result = $this->conn->query($sqlImage);
    if($result->num_rows > 0){
      $image = $result->fetch_assoc();

      echo '<img src="' . SITE_URL . $page . $image['Photo'] . '">';
    }
  }
}
?>