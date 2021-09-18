<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>  
  <input type="checkbox"  id="check">
  <label for="check" class="checkbtn">
  <i class="fas fa-bars"></i> 
  </label>
  <label class="logo">iBLOG</label>
    <ul>
  <li> <a href="index.php">Home</a></li>
  <?php
  if(isset($_SESSION['pass'])){
  ?>
  <li><a href="logout.php">Logout</a></li>
 <?php } ?>
  <?php
 if(isset($_SESSION['typee'])){
 ?> <li><a href="admin_dash.php">Admin</a></li>
 <li><a href="logout.php">Logout</a></li>
 <?php
}?>

</ul>
 </nav>
    <div class="mainbox2">
    <center>
    <div>
    <form action="#" method="post">
        <div class="c_by">
      <span>Your Name</span>
        <input type="text" name="cname" id="" required>
        </div>
        <div class="comment">
     <span> Comment</span>
        <textarea name="comment" id="" cols="24" rows="3" required>

        </textarea>
        </div>
        <div>
        <input type="submit" value="submit" name="submit">
        </div>
    </form>
    </div>
   
<div class="section">
         
    

<?php
$cid = $_REQUEST['id'];
include("dbcon.php");
$qry="SELECT * FROM `comment_tb` WHERE `cid`='$cid' ORDER BY rid DESC ";
$run=mysqli_query($conn,$qry);
 $count=0;
 while($data = mysqli_fetch_assoc($run)){
   $count++;
 ?>
    
   <div class="com_by">
   <span> <?php echo $count;?></span> Comment By : <?php echo  $data['cname'];?>
   </div>
    <div class="msg1">
        <p>
            <?php echo $data['comment'];?>
        </p>
    </div>
    <hr>
   <?php
 }
 ?>
  </center>
 </div>
 </div>
 </body>
</html>




<?php
if(isset($_POST['submit'])){
    $cid = $_REQUEST['id'];
    $cname = $_POST['cname'];
    $msg = $_POST['comment'];
   
    $qry="INSERT INTO `comment_tb`( `cid`, `cname`, `comment`) VALUES (' $cid','$cname','$msg')" ;
    $run=mysqli_query($conn,$qry);

   

}else{
    echo" ";
}

?>