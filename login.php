<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
   <link rel="stylesheet" href="log.css"> 
</head>
<body>
<div class="navigation">

    
    <div class="left">
    <a href="#">iBlog</a>
   <a href="index.php">Home</a>
    </div>
    <div class="right">
      <ul>
      <li> <a href="registretion.php">Register</a></li>
       </ul>
    </div>
   <div class="logbox">
     <h1>Login Here</h1>
     <form action="#" method="post">
       <p>Username</p>
       <input type="text" name="email" placeholder="Enter Your Email" required>
       <p>Password</p>
       <input type="text" name="password" placeholder="Enter Your Email" required>
       <input type="submit" value="submit" name="login">
      </form>
   </div>

</body>
</html>
<?php
  include("dbcon.php");
  if(isset($_POST['login'])){
  $email= $_POST['email'];
  $pass=$_POST['password'];
  $qry= "SELECT * FROM `author_info` WHERE `email`='$email'  AND `password`='$pass' ";
  $run= mysqli_query($conn,$qry);
  $row=mysqli_num_rows($run);
  if($row < 1){
     
      ?>
     <script>alert('please enter correct password and username');</script> 
  <?php
  }
  else{

    
      $data = mysqli_fetch_assoc($run);
      if($data['type']=='admin'){
      $_SESSION['typee']= $data['type'];
      $_SESSION['aid']= $data['author_id'];
      header("location:admin_dash.php");
     } 
     elseif($data['type']=='author'){
      $_SESSION['pass']= $data['fname'];
      $_SESSION['aid']=$data['author_id'];
      header("location:index.php");
      
  }
}
 }
  ?>
        