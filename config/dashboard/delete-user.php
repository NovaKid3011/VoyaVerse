<?php
include '../../admin/admin.php';
include '../fetch_image.php';

if(!isset($_SESSION['authenticated'])){
  head('index.php');
}else{
  $role = new role();
  $identify = $role->identify();
  if($identify){
    if(isset($_GET['deleteid'])){
      $user_id = $_GET['deleteid'];
  
      $admin = new admin();
      $message = "The user has been deleted.";
      $page = "pages/dashboard.php?tab=5";
      $admin->delete_user($user_id, $message, $page);
    }
  }else{
    head('index.php');
  }
}

?>