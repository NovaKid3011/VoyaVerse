<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../VoyaVerseProject/css/index.css">
  <title>VoyaVerse</title>
</head>
<body>
  
<?php
include_once 'includes/message.php';
?>


<div class="header">
  <?php
    include "includes/header.php";
  ?>
</div>

<div class="body">

  <div class="content <?php echo $activeTab == '1' ? 'active' : ''; ?> home">
    <?php include 'pages/home-page.php' ?>
  </div>

  <div class="content <?php echo $activeTab == '2' ? 'active' : ''; ?> about">
    <?php include 'pages/about-page.php' ?>
  </div>

  <div class="content <?php echo $activeTab == '3' ? 'active' : ''; ?> destination">
    <?php include 'pages/destination-page.php' ?>
  </div>

  <div class="content <?php echo $activeTab == '4' ? 'active' : ''; ?> blog">
    <?php include 'pages/blog-page.php' ?>
  </div>

  <div class="content <?php echo $activeTab == '5' ? 'active' : ''; ?> contact">
    <?php include 'pages/contact-page.php' ?>
  </div>

</div>

<div class="footer">
  <?php
    include "includes/footer.php";
  ?>
</div>

</body>
</html>