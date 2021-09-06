<?php
session_start();
if(isset($_SESSION['pass'])){
  $aid= $_SESSION['aid'];
  $aname= $_SESSION['pass'];
}else{
    header('location:index.php');
}

spl_autoload_register(function($class){
  require_once($class.'.php');
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

    <link rel="stylesheet" href="log.css">
</head>
<body>
<nav>
  <input type="checkbox"  id="check">
  <label for="check" class="checkbtn">
  <i class="fas fa-bars"></i> 
  </label>
  <label class="logo">iBLOG</label>
    <ul>
      <li><a href="author_dash.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>

    </ul>
    </nav>
   <center>
   <?php 

  
  $fid = $_SESSION['aid'];
  $obj = new getpost();
   $datas = $obj->get1data("SELECT * FROM `Author_info` WHERE author_id= $fid ");
       
   foreach ($datas as $f){


  ?>
     
<div class="regbox">
   <h1>My Details</h1>
    <form action="#" method="post">
<table>
        <th>Full Name</th>
        <td><input type="text" name="fname" value="<?php echo $f['fname'];?>" placeholder="Enter Name" required ></td>
    </tr>
    <tr>
      <th>Gender</th>
      <td><input type="radio" name="gender"  value="male" required>Male
      <input type="radio" name="gender" value="female" required>Female
    </td>
    </tr>
    <tr><th> Email</th>
     <td><input type="text" name="email" value="<?php echo $f['email'];?>" placeholder="Enter Email" required></td>
</tr>
<tr>
    <th>Mobile</th>
    <td><input type="text" name="mobile" value="<?php echo $f['mobile'];?>" placeholder="Enter Mobile" required></td>
</tr>
<tr><th> password</th>
     <td><input type="text" name="password"  value="<?php echo $f['password'];?>" placeholder="Enter Password"  required></td>
</tr>
</table>
<div class="sub">
    <input type="submit" name="submit"></th></tr>
  </div>
  </form>
  <?php
 }

 ?>
</center>

</div>
</body>
</html>
<?php



if(isset($_POST['submit'])){
  
 $fname =$_POST['fname'];
 $gender =$_POST['gender'];
 $email =$_POST['email'];
 $mobile =$_POST['mobile'];
 $password =$_POST['password'];
 

$aid = $_SESSION['aid'];

$obj1 = new update1();
$obj1->update ('author_info',['fname'=> $fname,'gender'=>$gender,'email'=>$email,'mobile'=> $mobile,'password'=> $password ], 'author_id= "'.$aid.'"');
 
 
  header("location:index.php");
}else{
  echo " ";
}

  ?>
 

