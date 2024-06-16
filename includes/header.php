<?php
include './config/fetch_image.php';
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : '1';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../VoyaVerseProject/css/header.css">
</head>
<body>
  
  <nav>

    <div class="logo">
      <h1>VoyaVerse</h1>
    </div>

    <div class="tabs">
      <ul>
        <li><a href="?tab=1" class="link <?php echo $activeTab == '1' ? 'active' : ''; ?>">Home</a></li>
        <li><a href="?tab=2" class="link <?php echo $activeTab == '2' ? 'active' : ''; ?>">About</a></li>
        <li><a href="?tab=3" class="link <?php echo $activeTab == '3' ? 'active' : ''; ?>">Destination</a></li>
        <li><a href="?tab=4" class="link <?php echo $activeTab == '4' ? 'active' : ''; ?>">Blog</a></li>
        <li><a href="?tab=5" class="link <?php echo $activeTab == '5' ? 'active' : ''; ?>">Contact</a></li>
      </ul>
    </div>

    <?php
      if(isset($_SESSION['authenticated'])){
    ?>

    <div class="dropdown">
      <div class="user">
        <a href="#" class="user-profile"><?php echo $_SESSION['auth_user']['user_fname'] . " " . $_SESSION['auth_user']['user_lname']?></a>
        <div class="photo">
          <?php
            $fetch = new fetch();
            $page = "images/profile/";
            $fetch->image_get($page);
          ?>
        </div>
      </div>
      <div class="dropdown-content">
        <ul>
          <li><a href="./pages/dashboard.php" class="dropdown-item">Dashboard</a></li>
          <li><a href="./config/logout.php" class="dropdown-item">Logout</a></li>
        </ul>
      </div>
    </div>

    <?php
      }else{
    ?>

    <div class="user">
      <ul>
        <li><a href="./pages/signup-form-page.php" class="wrapper">Sign up</a></li>
        <li><a href="./pages/login-form-page.php" class="wrapper">Log in</a></li>
      </ul>
    </div>

    <?php
      }
    ?>

  </nav>

</body>
</html>