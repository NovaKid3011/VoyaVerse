<?php

include 'login.php';

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $_SESSION['email'] = $email;

  $login = new login();
  $checkLogin = $login->userLogin($email, $password);
  if($checkLogin){
    head("index.php");
  }else{
    redirect("Invalid Email or Password." , "pages/login-form-page.php");
  }
}

?>