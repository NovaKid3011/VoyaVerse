<html>

<div class="container">

  <div class="button">
    <a href="dashboard/post-form.php">Add Post</a>
  </div>
  <table>
    <tr>
      <td>Post ID</td>
      <td>Title</td>
      <td>Description</td>
      <td>Image</td>
      <td>User</td>
      <td>Posted In</td>
      <td>Delete</td>
      <td>Edit</td>
    </tr>
    <tr>
      <?php
        $role = new role();
        $identify = $role->identify();
        if($identify){
          $query = "SELECT * FROM posts";
          $result = $role->conn->query($query);
          if($result){
            while($row = $result->fetch_assoc()){
              $id = $row['ID'];
              $title = $row['Title'];
              $desc = $row['Description'];
              $image = $row['Image'];
              $user = $row['User'];
              $date = $row['Date_Uploaded'];
      ?>

      <td><?php echo $id ?></td>
      <td><?php echo $title ?></td>
      <td><?php echo $desc ?></td>
      <td><img src="<?php echo "../images/post/".$image ?>" width="100px" alt="image"></td>
      <td><?php echo $user ?></td>
      <td><?php echo $date ?></td>
      <td><div class="button_delete"><a href="../config/dashboard/delete-post.php?deleteid=<?php echo $id; ?>">Delete</a></div></td>
      <td><div class="button_update"><a href="dashboard/update-post-form.php?updateid=<?php echo $id ?>">Update</a></div></td>

    </tr>

    <tr>
      <?php
            }
          }
        }else{
          $fname = $_SESSION['auth_user']['user_fname'];
          $lname = $_SESSION['auth_user']['user_lname'];

          $query = "SELECT * FROM Posts WHERE user = '$fname $lname'";
          $result = $role->conn->query($query);
          if($result){
            while($row = $result->fetch_assoc()){
              $id = $row['ID'];
              $title = $row['Title'];
              $desc = $row['Description'];
              $image = $row['Image'];
              $user = $row['User'];
              $date = $row['Date_Uploaded'];
      ?>

      <td><?php echo $id ?></td>
      <td><?php echo $title ?></td>
      <td><?php echo $desc ?></td>
      <td><img src="<?php echo "../images/post/".$image ?>" width="100px" alt="image"></td>
      <td><?php echo $user ?></td>
      <td><?php echo $date ?></td>
      <td><div class="button_delete"><a href="../config/dashboard/delete-post.php?deleteid=<?php echo $id; ?>">Delete</a></div></td>
      <td><div class="button_update"><a href="dashboard/update-post-form.php?updateid=<?php echo $id ?>">Update</a></div></td>

    </tr>

      <?php
            }
          }
        }
      ?>
    
  </table>

</div>

</html>