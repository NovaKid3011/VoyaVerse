<html>

<div class="box">
  <div>Total Users:</div>
  <div>
    <?php
      $sql = "SELECT * FROM users";
      $result = $role->conn->query($sql);
      if($result){
        $row = $result->num_rows;
        echo $row;
      }
    ?>
  </div>
  <div></div>
</div>

<div class="box">
  <div>Total Posts:</div>
  <div>
    <?php
      $sql = "SELECT * FROM posts";
      $result = $role->conn->query($sql);
      if($result){
        $row = $result->num_rows;
        echo $row;
      }
    ?>
  </div>
  <div></div>
</div>

</html>