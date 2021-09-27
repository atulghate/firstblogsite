<?php
session_start();
// $typee = $_SESSION['typee'];
spl_autoload_register(function ($class) {
  require_once($class . '.php');
});

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="\..\css&scss\form.css">
  <link rel="stylesheet" href="\..\css&scss\footer1.css">
  <link rel="stylesheet" href="\..\css&scss\nav.css">

  


  <!-- <link rel="stylesheet" href="login.css"> -->
</head>

<body>

  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">iBLOG</label>
    <ul>
    
        <li><a href="index.php">Home</a></li>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="#">About us</a></li>
      <li><a href="#">services</a></li>

      <?php
      if (isset($_SESSION['typee'])) {
      ?>
        <li><a href="admin_dash.php">Admin</a></li>
        <li><a href="logout.php">Logout</a></li>

      <?php
      }
      ?>
    </ul>
  </nav>
  <div class="form_div">
    <form action="#" method="post">
      <div class="container">
        <h3>Register Here</h2>
        <label for=""><b>full name</b></label>
        <input type="text" name="fname" required>

        <label for=""><b>email</b></label>
        <input type="text" name="email" id="" required>
        <label for=""><b>mobile</b></label>
        <input type="text" name="mobile" id="" required>
        <label for=""><b>password</b></label>
        <input type="password" name="password" id="" required>
        <div>
          <label for=""><b>gender</b></label>
          <input type="radio" name="gender" value="male" required>Male
          <input type="radio" name="gender" id="" value="female" required>Female
        </div>
        <button type="submit" name="submit">Register</button>

      </div>
    </form>
  </div>
  



  <?php include("footer.php") ?>
</body>

</html>
<?php


if (isset($_POST['submit'])) {

  $fname = $_POST['fname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $type = "author";


  $obj = new Posts();
  $obj->createauthor($fname, $gender, $email, $mobile, $password, $type);
}
?>