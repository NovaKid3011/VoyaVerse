<?php
include '../config/fetch_image.php';
include_once '../includes/message.php';
if(!isset($_SESSION['authenticated'])){
  redirect("Unauthorized Access to this page!!", "index.php");
}

$activeTab = isset($_GET['tab']) ? $_GET['tab'] : '1';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<div class="container">

  <div class="sidebar">

    <div class="logo">
      <h1>VoyaVerse</h1>
    </div>

    <div class="menu">
      <a href="?tab=1" class="<?php echo $activeTab == '1' ? 'active' : ''; ?>">Dashboard</a>
      <a href="?tab=2" class="<?php echo $activeTab == '2' ? 'active' : ''; ?>">User Profile</a>
      <a href="?tab=3" class="<?php echo $activeTab == '3' ? 'active' : ''; ?>">Manage Posts</a>
      <?php
        $role = new role();
        $identify = $role->identify();
        if($identify){
      ?>
      <a href="?tab=4" class="<?php echo $activeTab == '4' ? 'active' : ''; ?>">Manage Users</a>
      <?php
        }
      ?>
    </div>

  </div>

  <div class="content">

    <div class="top">

      <div class="tab-name">
        <h1 class="tabn <?php echo $activeTab == '1' ? 'active' : ''; ?>">Dashboard</h1>
        <h1 class="tabn <?php echo $activeTab == '2' ? 'active' : ''; ?>">User Profile</h1>
        <h1 class="tabn <?php echo $activeTab == '3' ? 'active' : ''; ?>">Manage Posts</h1>
        <h1 class="tabn <?php echo $activeTab == '4' ? 'active' : ''; ?>">Manage Users</h1>
      </div>

      <div class="user">
        <div class="name">
          <p class="p"><?php echo $_SESSION['auth_user']['user_fname'] . " " . $_SESSION['auth_user']['user_lname']?></p>
        </div>
        <div class="photo">
          <?php
            $fetch = new fetch();
            $page = "images/profile/";
            $fetch->image_get($page);
          ?>
        </div>
        <div class="dropdown">
          <div class="dropdown-content">
            <ul>
              <li><a href="../index.php" class="dropdown-item">Home</a></li>
              <li><a href="?tab=2" class="dropdown-item">User Profile</a></li>
              <li><a href="../config/logout.php" class="dropdown-item">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <div class="bottom">

      <div class="tab-content <?php echo $activeTab == '1' ? 'active' : ''; ?> content1">
        <?php include '../admin/content/dashboard-home.php'; ?>
      </div>

      <div class="tab-content <?php echo $activeTab == '2' ? 'active' : ''; ?> content2">
        <?php include '../admin/content/user-profile.php'; ?>
      </div>

      <div class="tab-content <?php echo $activeTab == '3' ? 'active' : ''; ?> content3">
        <?php include '../admin/content/manage-post.php'; ?>
      </div>

    <?php
      if($identify){
    ?>
    
      <div class="tab-content <?php echo $activeTab == '4' ? 'active' : ''; ?> content4">
        <?php include '../admin/content/manage-user.php'; ?>
      </div>

    <?php
      }
    ?>

    </div>

  </div>

</div>

</body>
</html>