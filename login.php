<?php
session_start();
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
  <title>login</title>
  <!-- <link href="login.css" media="all  " rel="stylesheet" type="text/css" /> -->
  <link rel="stylesheet" href="css&scss\form.css">
  <link rel="stylesheet" href="css&scss\footer1.css">
  <link rel="stylesheet" href="css&scss\index.css">



  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<nav>
  <input type="checkbox" id="check">
  <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
  </label>
  <label class="logo">iBLOG</label>
  <ul>

    <li> <a class="active" href="index.php">Home</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="registretion.php">Register</a></li>
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

<body>



  <div class="form_div">
    <form class="form22" action="#" method="post">

      <div class="container">
        <h3 class="h22">Login Form</h2>
          <label><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="email" value="<?php if (isset($_COOKIE['emailcookie'])) {
                                                                                echo $_COOKIE['emailcookie'];
                                                                              } ?>" placeholder="Enter Your Email" required>

          <label><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" value="<?php if (isset($_COOKIE['passwordcookie'])) {
                                                                                        echo base64_decode($_COOKIE['passwordcookie']);
                                                                                      } ?>" placeholder="Enter Your Email" required>

          <button type="submit" name="login">Login</button>
          <div class="rememberme">
            <input type="checkbox" name="rememberme" id="remember"> Remember me &nbsp; &nbsp; &nbsp; &nbsp;
          </div>
          <!-- <span class="cancelbtn">
        <a href="index.php">Cancel</a>
      </span> -->
      </div>

    </form>
  </div>
  <?php include("footer.php");   ?>
</body>

</html>
<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $obj = new Posts();
  $datas = $obj->getlogin($email, $pass);
  if (!isset($datas)) {
?>
    <script>
      alert('please enter correct password and username');
    </script>
<?php
  } else {


    // $data = mysqli_fetch_assoc($run);
    foreach ($datas as $data) {
      if ($data['type'] == 'admin') {
        $_SESSION['typee'] = $data['type'];
        $_SESSION['aid'] = $data['author_id'];

        if (isset($_POST['rememberme'])) {

          setcookie('emailcookie', $email, time() + 86400);
          setcookie('passwordcookie', base64_encode($pass), time() + 86400);


          // header("location:admin_dash.php");
          header("location:templets\admin\admin_dash.php");
        } else {
          header("location:templets\admin\admin_dash.php");
        }
      } elseif ($data['type'] == 'author') {
        $_SESSION['pass'] = $data['fname'];
        $_SESSION['aid'] = $data['author_id'];
        if (isset($_POST['rememberme'])) {

          setcookie('emailcookie', $email, time() + 86400);
          setcookie('passwordcookie', base64_encode($pass), time() + 86400);

          header("location:index.php");
        } else {
          header("location:index.php");
        }
      }
    }
  }
}
?>