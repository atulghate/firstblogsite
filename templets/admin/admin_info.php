<?php
session_start();
$typee= $_SESSION['typee'];
if(isset($_SESSION['typee'])){
  $typee= $_SESSION['typee'];
  $fid= $_SESSION['aid'];
}else{
    header('location:index.php');
}

spl_autoload_register(function($class){
  require_once("../../".$class.'.php');
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

  <link rel="stylesheet" href="\..\css&scss\index.css">
  <link rel="stylesheet" href="\..\css&scss\login.css">
</head>

<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">iBLOG</label>
    <ul>
      <li><a href="admin_dash.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>

    </ul>
  </nav>
  
    <?php


    $fid = $_SESSION['aid'];
    $obj = new Posts($fid);
    $datas = $obj->getinfo($fid);
    foreach ($datas as $f) {


    ?>

<form action="" method="post">
    <div class="container">
      <h2>My Details</h2>
      <label for=""><b>full name</b></label>
      <input type="text" name="fname" value="<?php echo $f['fname'] ?>" required >

      <label for=""><b>email</b></label>
      <input type="text" name="email" value="<?php echo $f['email'] ?>" required >
      <label for=""><b>mobile</b></label>
      <input type="text" name="mobile" value="<?php echo $f['mobile'] ?>"  required >
      <label for=""><b>password</b></label>
      <input type="password" name="password"  value="<?php echo $f['password'] ?>"  required >

      <div>
        <label for=""><b>gender</b></label>
        <input type="radio" name="gender" value="male"  required >Male
        <input type="radio" name="gender" id="" value="female" required >Female
      </div>
      <button type="submit" name="submit">Update</button>


    </div>
  </form>
        
      <?php
    }

      ?>
  

  </div>
</body>

</html>
<?php



if (isset($_POST['submit'])) {

  $fname = $_POST['fname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $type ="admin";

  $aid = $_SESSION['aid'];

  $obj1 = new Posts();

  $obj1->updatePost($aid, $fname, $gender, $email,$mobile,$password,$type);


  header("location:admin_dash.php");
} else {
  echo " ";
}

?>