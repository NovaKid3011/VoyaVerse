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
    <div class="text">
      <div class="title">
        <?php echo $title; ?>
      </div>
      <div class="description">
        <?php echo $desc; ?>
      </div>
      <div class="user">
        Posted by:
        <?php echo $user; ?>
      </div>
      <div class="date">
        Created in:
        <?php echo $date; ?>
      </div>
    </div>
  </div>

  <?php
      }
    }
  ?>
</div>

</html>