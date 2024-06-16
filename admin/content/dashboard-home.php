<html>

<div class="box-container">

  <div class="box dashhome">
    <h1>Total Users:</h1>
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

  <div class="box dashhome">
    <h1>Total Posts:</h1>
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

</div>

</html>