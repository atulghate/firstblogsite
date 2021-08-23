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
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

   <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    
<nav>
  <input type="checkbox"  id="check">
  <label for="check" class="checkbtn">
  <i class="fas fa-bars"></i> 
  </label>
  <label class="logo">iBLOG</label>
    <ul>
    
    <li> <a class="active" href="index.php">Home</a></li>
    <li><a href="registretion.php">Register</a></li>
  <!-- <li><a href="logout.php">Logout</a></li> -->
  <?php
 if(isset($_SESSION['typee'])){
 ?> 
  <li><a href="admin_dash.php">Admin</a></li>
  <li><a href="logout.php">Logout</a></li>
  </ul>
  </nav>
  <?php
 }
?> 
  
 

   <div class="logbox">
     <h1>Login Here</h1>
     <form action="#" method="post">
       <p>Username</p>
       <input type="text" name="email" value="<?php if(isset($_COOKIE['emailcookie'])){ echo $_COOKIE['emailcookie'];}?>" placeholder="Enter Your Email" required>
       <p>Password</p>
       <input type="text" name="password"  value="<?php if(isset($_COOKIE['passwordcookie'])){ echo $_COOKIE['passwordcookie'];}?>" placeholder="Enter Your Email" required> 
        <div class="rm">
       <input type="checkbox" name="rememberme" id="remember">  
       <label for="remember me">  Remember Me   </label>    

       </div>
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

        if(isset($_POST['rememberme'])){

      setcookie('emailcookie',$email,time()+86400);
      setcookie('passwordcookie',$pass,time()+86400);
     
    
      header("location:admin_dash.php");
      } else{
        header("location:admin_dash.php");
      }
     } 
     elseif($data['type']=='author'){
      $_SESSION['pass']= $data['fname'];
      $_SESSION['aid']=$data['author_id'];
      if(isset($_POST['rememberme'])){ 

      setcookie('emailcookie',$email,time()+86400);
      setcookie('passwordcookie',$pass,time()+86400);
     
      header("location:index.php");
    }
      else{
        header("location:index.php");
        }
      
  }
}
 }
  ?>
        