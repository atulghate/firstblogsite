<?php
session_start();

spl_autoload_register(function ($class) {
  require_once($class . '.php');
});
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Indexpage</title>
  <link rel="stylesheet" href="css&scss\index.css">
  <link rel="stylesheet" href="css&scss\footer1.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ropa+Sans:ital@1&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

  <nav>

    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">iBLOG</label>
    <ul>

      <li> <a class="active" href="index.php">Home</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">About us</a></li>
      <?php
      if ($_SESSION['typee'] == "admin") {
      ?>
        <li><a href="templets\admin\admin_dash.php">Admin</a></li>
        <li><a href="logout.php">Logout</a></li>

      <?php
      }
      ?>
      <?php
      if (isset($_SESSION['pass'])) {
      ?>

        <li><a href="templets\author\author_dash.php">Author</a></li>
        <li><a href="templets\Author\author_info.php">My Details</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php
      }
      if ($_SESSION['pass']  == false) {
      ?>

        <li><a href="login.php">login</a></li>
        <li><a href="registretion.php">Register </a></li>

      <?php
      }
      ?>

    </ul>
    <!-- <div class="iconn">
<img src="sun.png" id="icon">
</div>  -->
  </nav>
  
  <div class="bigbox">
    <?php

    $obj = new Posts();
    $datas = $obj->getPost();
    foreach ($datas as $data) {
    ?>
      <div class="postbox">
        <div class="mcontent">
          <div class="lcontent">
            <div class="imgee">
              <div class="title">
                <h2> <?php echo $data['title']; ?></h2>
              </div>
              <div class="time">
                Posted On : <?php echo $data['datetime']; ?>
              </div class="pimg">
              <img src="imagess\<?php echo $data['image']; ?>">      
            </div>
          </div>
          <div class="content">


            <div class="desc">
              <?php echo substr( $data['short_desc'],0 , 330 );?>
            </div>
            <div class="time1">
              Author : <?php echo $data['fname']; ?>
            </div>
            <div class="btnn">
              <a href="templets\Author\content.php?id=<?php echo $data['cid'] ?>" name="edit">Read More</a>
              <a href="templets\admin\comment1.php?id=<?php echo $data['cid'] ?>" name="edit"> Comments&nbsp; </a>

              <div>


              </div>

            </div>

          </div>

        </div>

      <?php } ?>
      <!-- </div> -->
      <!-- </div> -->

      <!-- <footer class="footer"></footer> -->
      <script>
        var icon = document.getElementById("icon");
        icon.onclick = function() {
          document.body.classList.toggle("darkmode");
          if (document.body.classList.contains("darkmode")) {

            icon.src = "imagess\sun.png";

          } else {
            icon.src = "imagess\moonicon.png";
          }
        }
      </script>



<?php  include("footer.php");   ?>
</body>

</html>
