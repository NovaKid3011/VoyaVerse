<?php
include '../../admin/admin.php';
include '../fetch_image.php';

if(!isset($_SESSION['authenticated'])){
  head('pages/dashboard.php');
}else{
  $role = new role();
  $identify = $role->identify();
  if($identify){
    if(isset($_POST['update'])){
      if(isset($_GET['updateid'])){
        $user_id = $_GET['updateid'];

        $fname = $_POST['new_fname'];
        $lname = $_POST['new_lname'];
        $photo = $_FILES['new_photo']['name'];
        $gender = $_POST['new_gender'];
        $email = $_POST['new_email'];
        $new_role = $_POST['role'];

        $admin = new admin();
        $message = "The user has been updated.";
        $page = "pages/dashboard.php?tab=4";
        $admin->update_user($user_id, $message, $page, $fname, $lname, $photo, $gender, $email, $new_role);
      }else{
        $page = "pages/dashboard/update-user-form.php";
        redirect("Something wrong with the ID", $page);
      }
    }else{
      $page = "pages/dashboard.php?tab=4";
      redirect("Something wrong with the form.", $page);
    }
  }else{
    head('index.php');
  }
}
?>