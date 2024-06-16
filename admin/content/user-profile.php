<html>

<?php

$user_id = $_SESSION['auth_user']['user_id'];


$db = new databaseConnection();
$query = "SELECT * FROM Users WHERE ID = '$user_id'";
$result = $db->conn->query($query);
if($result){
    $row = $result->fetch_assoc();
    $id = $row['ID'];
    $fname = $row['First_name'];
    $lname = $row['Last_name'];
    $photo = $row['Photo'];
    $gender = $row['Gender'];
    $email = $row['Email'];
    $role_id = $row['Role'];
    $date = $row['User_added'];
?>

<div class="box">

  <div class="column image">
    <img src="<?php echo "../images/profile/".$photo ?>" width="250px">
  </div>

  <div class="column name">
    <div>
      <h1>First Name:</h1>
      <p><?php echo $fname ?></p>
    </div>
    <div>
      <h1>Last Name:</h1>
      <p><?php echo $lname ?></p>
    </div>
  </div>

  <div class="column">
    <div>
      <h1>Gender:</h1>
      <p><?php echo $gender ?></p>
    </div>
  </div>

  <div class="column">
    <div>
      <h1>Email:</h1>
      <p><?php echo $email ?></p>
    </div>
  </div>

  <div class="column">
    <div>
      <h1>Role:</h1>
      <p>
        <?php
          if($role_id == 1){
            echo "Admin";
          }else{
            echo "User";
          }
        ?>
      </p>
    </div>
  </div>

  <div class="column">
    <div>
      <h1>Created in:</h1>
      <p><?php echo $date ?></p>
    </div>
  </div>

</div>

<?php
}
?>

</html>