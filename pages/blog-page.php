<html>

<div class="grid">
  <?php
    $db = new databaseConnection();
    $query = "SELECT * FROM Posts";
    $result = $db->conn->query($query);
    if($result){
      while($row = $result->fetch_assoc()){
        $id = $row['ID'];
        $title = $row['Title'];
        $desc = $row['Description'];
        $image = $row['Image'];
        $user = $row['User'];
        $date = $row['Date_Uploaded'];
  ?>

  <div class="grid-item">
    <div class="image">
      <img src="<?php echo "images/post/".$image ?>" alt="image">
    </div>
    <div>
      <?php echo $title; ?>
    </div>
    <div>
      <?php echo $desc; ?>
    </div>
    <div>
      Posted by:
      <?php echo $user; ?>
    </div>
    <div>
      Created in:
      <?php echo $date; ?>
    </div>
  </div>

  <?php
      }
    }
  ?>
</div>

</html>