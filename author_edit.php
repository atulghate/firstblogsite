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
  <div class="right">
    <ul>
    <li><a href="author_list.php">Back</a></li>  
    </ul>
  </div>
   </div>
   <center>
   <?php 
include("dbcon.php");
  $rid = $_REQUEST['id'];
  
 $qry="SELECT * FROM `author_info` WHERE  author_id= $rid ";
 $run = mysqli_query($conn,$qry);
 foreach( $run as $f){
 
     ?> 
<div class="regbox">
   <h1>Update Author Inforamtion</h1>
    <form action="#" method="post">
<table>
        <th>Enter Full Name</th>
        <td><input type="text" name="fname"  value="<?php echo $f['fname']?>" ></td>
    </tr>
    <tr>
      <th>Gender</th>
      <td><input type="radio" name="gender"  value="male" required>Male
      <input type="radio" name="gender" id="" value="female" required>Female
    </td>
    </tr>
    <tr><th> Email</th>
     <td><input type="text" name="email" value="<?php echo $f['email']?>" required></td>
</tr>
<tr>
    <th>Mobile</th>
    <td><input type="text" name="mobile" value="<?php  echo $f['mobile']?>" required></td>
</tr>
<tr><th>Create password</th>
     <td><input type="text" name="password" value="<?php echo $f['password']?>" required></td>
</tr>
<tr>
  <th>Enter user type</th>
  <td><input type="text" name="type" value="<?php  echo $f['type']?>" required ></td>
</tr>
</table>
<div class="sub">
    <input type="submit" name="submit" value="UPDATE" ></th></tr>
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
 $type=$_POST['type']; 
 $qry="UPDATE `author_info` SET `fname`='$fname',`gender`='$gender',`email`='$email',`mobile`='$mobile',`password`='$password',`type`='$type' WHERE author_id =$rid";
$runn= mysqli_query($conn,$qry);
  
    header("location:author_list.php");
}else{
  echo " ";
}

  ?>
 
