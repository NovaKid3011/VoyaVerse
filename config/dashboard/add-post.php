<?php
include '../../admin/admin.php';
include '../fetch_image.php';

if(!isset($_SESSION['authenticated'])){
  head('pages/dashboard.php');
}else{
  if(isset($_POST['submit'])){
    $fname = $_SESSION['auth_user']['user_fname'];
    $lname = $_SESSION['auth_user']['user_lname'];

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $image = $_FILES['image']['name'];
    $username = $fname . " " . $lname;

    $admin = new admin();
    $message = "The post has been added.";
    $page = "pages/dashboard.php?tab=3";
    $admin->add_post($title, $desc, $image, $username, $message, $page);
  }
}

?>