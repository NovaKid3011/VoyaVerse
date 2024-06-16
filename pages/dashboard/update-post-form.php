<?php

include ('../../config/fetch_image.php');
include_once '../../includes/message.php';

if(!isset($_SESSION['authenticated'])){
  redirect("Unauthorized Access to this page!!", "index.php");
}

?>

<html>
<link rel="stylesheet" href="../../../VoyaVerseProject/css/manage/post.css">


<main>

  <div class="container">

    <h1>Post</h1>

    <form action="../../config/dashboard/update-post.php?updateid=<?php echo $_GET['updateid'] ?>" method="post" enctype="multipart/form-data">
      <div class="title">
        <input type="text" name="new_title" placeholder="Enter your title">
      </div>
      <div class="desc">
        <input type="text" name="new_desc" placeholder="Enter your description">
      </div>
      <div class="image">
        <input type="file" name="new_image">
      </div>

      <button type="submit" name="update">Update Post</button>
      <button type="button" onclick="window.location.href = '../dashboard.php?tab=3'">Back</button>
    </form>

  </div>

</main>

</html>