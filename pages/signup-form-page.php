<?php
include '../includes/message.php';
include '../config/fetch_image.php';
if(isset($_SESSION['authenticated'])){
  redirect("You are already logged in.", "index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VoyaVerse</title>
  <link rel="stylesheet" href="../css/pages/signup-form-page.css">
</head>
<body>

  <main>

    <div class="container">

      <h1>Sign Up</h1>
      
      <form action="../config/register_post.php" method="post" enctype="multipart/form-data">
        <div class="username">
          <input type="text" name="firstname" placeholder="First Name" required>
          <input type="text" name="lastname" placeholder="Last Name" required>
        </div>
        <input type="file" name="photo" id="photo" required>
        <div class="gender">
          <p>Select Gender:</p>
          <select name="gender" id="gender" name="gender" required>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
          </select>
        </div>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required>

        <button type="submit" name="submit">Sign Up</button>
        <button type="button" onclick="window.location.href = '../index.php'">Back</button>

        <p class="reminder">Already have an account?<a href="login-form-page.php">Log in</a></p>
      </form>

    </div>

  </main>

</body>
</html>