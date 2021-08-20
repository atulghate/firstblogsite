<?php
session_start();
if(isset($_SESSION['pass'])){
  $aid= $_SESSION['aid'];
  $aname= $_SESSION['pass'];
}else{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
<div class="navigation">
  <div  class="left">
  <a href="#">iBlog</a>
   <a href="index.php">Home</a>
   </div>
  <div class="right1">
      <a href="logout.php">Logout</a>  
      
  
  </div>
   </div>
   <center>
   <?php 
include("dbcon.php");
 $qry="SELECT * FROM `Author_info` WHERE author_id= $aid ";
 $run = mysqli_query($conn,$qry);
 foreach( $run as $f){
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

include("dbcon.php");

if(isset($_POST['submit'])){
  
 $fname =$_POST['fname'];
 $gender =$_POST['gender'];
 $email =$_POST['email'];
 $mobile =$_POST['mobile'];
 $password =$_POST['password'];
 
 $query="UPDATE `author_info` SET `fname`='$fname',`gender`='$gender',`email`='$email',`mobile`='$mobile',`password`='$password' WHERE author_id=$aid ";
$runn= mysqli_query($conn,$query);

 
  // header("location:admin_dash.php");
}else{
  echo " ";
}

  ?>
 

