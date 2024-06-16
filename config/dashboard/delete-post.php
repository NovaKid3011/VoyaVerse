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
      $message = "The post has been deleted.";
      $page = "pages/dashboard.php?tab=3";
      $admin->delete_post($user_id, $message, $page);
    }
  }else{
    head('index.php');
  }
}

?>