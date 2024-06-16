<?php

include ('../../config/fetch_image.php');
include_once '../../includes/message.php';

if(!isset($_SESSION['authenticated'])){
  redirect("Unauthorized Access to this page!!", "index.php");
}
?>

<html>
<link rel="stylesheet" href="../../css/manage/user.css">

<main>

  <div class="container">

    <h1>Update User</h1>
    
    <form action="../../config/dashboard/update-user.php?updateid=<?php echo $_GET['updateid'] ?>" method="post" enctype="multipart/form-data">
      <div class="username">
        <input type="text" name="new_fname" placeholder="New First Name" required>
        <input type="text" name="new_lname" placeholder=" New Last Name" required>
      </div>
      <input type="file" name="new_photo" id="photo" required>
      <div class="gender">
        <p>Select Gender:</p>
        <select name="new_gender" id="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
      </div>
      <input type="email" name="new_email" placeholder="New Email" required>

      <button type="submit" name="update_profile">Update</button>
      <button type="button" onclick="window.location.href = '../dashboard.php?tab=2'">Back</button>
    </form>

  </div>

</main>

</html>