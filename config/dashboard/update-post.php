<?php
include '../../admin/admin.php';
include '../fetch_image.php';

if(!isset($_SESSION['authenticated'])){
  head('pages/dashboard.php');
}else{
  if(isset($_POST['update'])){
    if(isset($_GET['updateid'])){
      $post_id = $_GET['updateid'];

      $new_title = $_POST['new_title'];
      $new_desc = $_POST['new_desc'];
      $new_image = $_FILES['new_image']['name'];
  
      $admin = new admin();
      $message = "The post has been updated.";
      $page = "pages/dashboard.php?tab=3";
      $admin->update_post($post_id, $new_title, $new_desc, $new_image, $message, $page);
    }else{
      $page = "pages/dashboard/update-post-form.php";
      redirect("Something wrong with the ID", $page);
    }
  }else{
    $page = "pages/dashboard.php?tab=3";
    redirect("Something wrong with the form.", $page);
  }
}

?>