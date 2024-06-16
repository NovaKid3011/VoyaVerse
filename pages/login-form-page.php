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
  <link rel="stylesheet" href="../css/pages/login-form-page.css">
</head>
<body>
  
  <main>

    <div class="container">

      <h1>Log In</h1>
      
      <form action="../config/login_post.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="submit">Log In</button>
        <button type="button" onclick="window.location.href = '../index.php'">Back</button>

        <p class="reminder">Not yet registered?<a href="signup-form-page.php">Sign up</a></p>
      </form>

    </div>

  </main>

</body>
</html>