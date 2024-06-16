<?php

include_once '../db.php';

class admin{
  public $conn;

  public function __construct(){
    $db = new databaseConnection();
    $this->conn = $db->conn;
  }

  public function add_user(){

  }

  public function update_user($user_id, $message, $page, $fname, $lname, $photo, $gender, $email, $role){
    $id = $user_id;

    $extension = substr($photo,strlen($photo)-4,strlen($photo));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    if(!in_array($extension,$allowed_extensions)){
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }else{
      $imgnewfile=md5($photo).$extension;
      $move = move_uploaded_file($_FILES["new_photo"]["tmp_name"],"../../images/profile/".$imgnewfile);
    }

    if(!$move){
      echo "Not uploaded because of error #".$_FILES["new_photo"]["error"];
    }else{
      $sql = "UPDATE Users SET First_name = '$fname', Last_name = '$lname', Photo = '$imgnewfile', Gender = '$gender', Email = '$email', Role = '$role' WHERE ID = '$id'";
      $result = $this->conn->query($sql);
      if($result){
        redirect($message, $page);
      }else{
        redirect("Something went wrong.", $page);
      }
    }
  }

  public function delete_user($user_id, $message, $page){
    $id = $user_id;

    $sql = "DELETE FROM Users WHERE ID = '$id'";
    $result = $this->conn->query($sql);
    if($result){
      redirect($message, $page);
    }else{
      redirect("Something went wrong.", $page);
    }
  }

  public function add_post($title, $desc, $image, $username, $message, $page){

    $extension = substr($image,strlen($image)-4,strlen($image));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    if(!in_array($extension,$allowed_extensions)){
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }else{
      $imgnewfile=md5($image).$extension;
      $move = move_uploaded_file($_FILES["image"]["tmp_name"],"../../images/post/".$imgnewfile);
    }

    if(!$move){
      echo "Not uploaded because of error #".$_FILES["image"]["error"];
    }else{
      $sql = "INSERT INTO Posts (Title, Description, Image, User)
      VALUES ('$title', '$desc', '$imgnewfile', '$username')";
      $result = $this->conn->query($sql);
      if($result){
        redirect($message, $page);
      }else{
        redirect("Something went wrong.", $page);
      }
    }

  }

  public function update_post($post_id, $title, $desc, $image, $message, $page){
    $id = $post_id;

    $extension = substr($image,strlen($image)-4,strlen($image));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    if(!in_array($extension,$allowed_extensions)){
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }else{
      $imgnewfile=md5($image).$extension;
      $move = move_uploaded_file($_FILES["new_image"]["tmp_name"],"../../images/post/".$imgnewfile);
    }

    if(!$move){
      echo "Not uploaded because of error #".$_FILES["image"]["error"];
    }else{
      $sql = "UPDATE Posts SET Title = '$title', Description = '$desc', Image = '$imgnewfile' WHERE ID = '$id'";
      $result = $this->conn->query($sql);
      if($result){
        redirect($message, $page);
      }else{
        redirect("Something went wrong.", $page);
      }
    }

  }

  public function delete_post($user_id, $message, $page){
    $id = $user_id;

    $sql = "DELETE FROM Posts WHERE ID = '$id'";
    $result = $this->conn->query($sql);
    if($result){
      redirect($message, $page);
    }else{
      redirect("Something went wrong.", $page);
    }
  }
}
?>