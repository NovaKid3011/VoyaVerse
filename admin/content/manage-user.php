<html>

<div class="container">
  <table>
    <tr>
      <td>User ID</td>
      <td>First Name</td>
      <td>Last Name</td>
      <td>Photo</td>
      <td>Gender</td>
      <td>Email</td>
      <td>Role</td>
      <td>Delete</td>
      <td>Edit</td>
    </tr>
    <tr>
      <?php
        $role = new role();
        $identify = $role->identify();
        if($identify){
          $query = "SELECT * FROM users";
          $result = $role->conn->query($query);
          if($result){
            while($row = $result->fetch_assoc()){
              $id = $row['ID'];
              $fname = $row['First_name'];
              $lname = $row['Last_name'];
              $photo = $row['Photo'];
              $gender = $row['Gender'];
              $email = $row['Email'];
              $role = $row['Role'];
      ?>

      <td><?php echo $id ?></td>
      <td><?php echo $fname ?></td>
      <td><?php echo $lname ?></td>
      <td><img src="<?php echo "../images/profile/".$photo ?>" width="100px" alt="image"></td>
      <td><?php echo $gender ?></td>
      <td><?php echo $email ?></td>
      <td><?php echo $role ?></td>
      <td><div class="button_delete"><a href="../config/dashboard/delete-user.php?deleteid=<?php echo $id; ?>">Delete</a></div></td>
      <td><div class="button_update"><a href="dashboard/update-user-form.php?updateid=<?php echo $id ?>">Update</a></div></td>

    </tr>

      <?php
            }
          }
        }
      ?>
    
  </table>
</div>

</html>