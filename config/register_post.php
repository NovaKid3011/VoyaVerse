<?php

include 'register.php';

if(isset($_POST['submit'])){
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $photo = $_FILES['photo']['name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confpassword = $_POST['confirmpassword'];

  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

  $register = new register();
  $result_password = $register->confirmPassword($password, $confpassword);
  if($result_password){
    $result_user = $register->isUserExists($email);
    if($result_user){
      redirect("Email already exist." , "pages/signup-form-page.php");
    }else{
      $register_query = $register->registration($fname, $lname, $photo, $gender, $email, $passwordHash);
      if($register_query){
        head("pages/login-form-page.php");
      }else{
        redirect("Something went wrong." , "pages/signup-form-page.php");
      }
    }
  }else{
    redirect("Password does not match." , "pages/signup-form-page.php");
  }

}

?>