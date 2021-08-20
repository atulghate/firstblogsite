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
      <li><a href="login.php">LogIn</a></li>
    </ul>
  </div>
   </div>
   <center>
<div class="regbox">
   <h1>Register Here</h1>
    <form action="#" method="post">
<table>
        <th>Enter Full Name</th>
        <td><input type="text" name="fname" placeholder="Enter Name" ></td>
    </tr>
    <tr>
      <th>Gender</th>
      <td><input type="radio" name="gender"  value="male">Male
      <input type="radio" name="gender" id="" value="female">Female
    </td>
    </tr>
    <tr><th> Email</th>
     <td><input type="text" name="email" placeholder="Enter Email" required></td>
</tr>
<tr>
    <th>Mobile</th>
    <td><input type="text" name="mobile" placeholder="Enter Mobile" required></td>
</tr>
<tr><th>Create password</th>
     <td><input type="text" name="password" placeholder="Enter Password"  required></td>
</tr>
<tr>
  <th>Enter user type</th>
  <td><input type="text" name="type" placeholder="Enter type" ></td>
</tr>
</table>
<div class="sub">
    <input type="submit" name="submit" ></th></tr>
  </div>
  </form>
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
  // echo $type;

 $query= "INSERT INTO `author_info`( `fname`, `gender`, `email`, `mobile`, `password`,`type`) VALUES ('$fname','$gender','$email','$mobile','$password','$type')";
 $runn= mysqli_query($conn,$query);
 
   header("location:index.php");
}else{
  echo " ";
}

  ?>
 
