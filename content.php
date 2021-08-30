<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>content</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@0,400;0,700;1,300;1,400&display=swap" rel="stylesheet"> 
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
       <li><a href="contact.php">Contact Us</a></li>
     <!-- <li><a href="logout.php">Logout</a></li> -->
     <?php
    if(isset($_SESSION['typee'])){
    ?> 
     <li><a href="admin_dash.php">Admin</a></li>
     <li><a href="logout.php">Logout</a></li>
   
     <?php
    }
   ?> 
   <?php
     if(isset($_SESSION['pass'])){
     ?>
     
    <li><a href="author_dash.php">Author</a></li>
    <li><a href="author_info.php">My Details</a></li>
    <li><a href="logout.php">Logout</a></li>
    <?php
   }
    if( $_SESSION['pass']  ==false){
     ?> 
     
     <li><a href="login.php">login</a></li>
      <li><a href="registretion.php">Register </a></li>
 
             
<?php
}
?>
</ul>
<div class="iconn">
      <img src="sun.png" id="icon">
       </div>

</nav> 


  
<?php
include("dbcon.php");
  $rid = $_REQUEST['id'];
  
 $qry="SELECT * FROM `post` WHERE cid = $rid";
 $run = mysqli_query($conn,$qry);
 foreach( $run as $f){
   ?> 
    
    <div class="mcontent">

<div class="lcontent">
<div class="imgee">
   <div class="title">
     <h2> <?php  echo $f['title'];?></h2>  
  </div>
  <div class="time">
     Posted On : <?php echo $f['datetime'];?>
     </div>
     <img src="imagess\<?php echo $f['image'];?>">
     </div>
   </div>
<div class="content">
    <div class="desc">
   <?php echo $f['content'];?>
   </div>
   
    
    <div class="btnn">
      <a href="index.php">back</a>
      <a href="comment1.php?id=<?php echo $rid;?>"  name="edit"> COMMENTS&nbsp; </a>

    </div>
  
   </div>
  <?php } ?>
     <hr>   
</div>
</div>
</body>
</html>