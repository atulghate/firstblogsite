<?php
session_start();

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
   <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@0,400;0,700;1,300;1,400&display=swap" rel="stylesheet"> 
</head>
<body>
<div class="navigation">
    
    <div class="left">
    <h2>iBlog</h2>
   <a href="index.php">Home</a>
    </div>
 <div class="right">
 <ul>
  <li><a href="logout.php">Logout</a></li>

  <?php
 if(isset($_SESSION['typee'])){
 ?> <li><a href="admin_dash.php">Admin</a></li>
 <li><a href="logout.php">Logout</a></li>
 <?php
}?>

</ul>
 </div>
 
</div>
<div class="content">
<?php
include("dbcon.php");
  $rid = $_REQUEST['id'];
  
 $qry="SELECT * FROM `post` WHERE cid = $rid";
 $run = mysqli_query($conn,$qry);
 foreach( $run as $f){
   ?> <div class="title">
      <h1> <?php echo $f['title'];?></h1>  
  </div>
    <div class="desc">
   <?php echo $f['content'];?>
   </div>
    <div class="time">
     Date&time:<?php echo $f['datetime'];?> 
     </div>
    
    <div class="btnn">
      <a href="index.php">back</a>
    </div>
  <hr>
   </div>
  <?php } ?>
        
</div>
</body>
</html>