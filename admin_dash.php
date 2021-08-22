<?php
session_start();
$typee= $_SESSION['typee'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body>
  <nav>
<input type="checkbox"  id="check">
  <label for="check" class="checkbtn">
  <i class="fas fa-bars"></i> 
  </label>
  <label class="logo">iBLOG</label> 
     <ul>
    <li>  <a href="index.php">Home</a></li>
     <li> <a href="author_list.php">Authors List</a></li>
     <li> <a href="logout.php">Logout</a>  </li>
  </ul>
  </nav>
   </div>
   <div class="btnlist">
       <a href="create_admin.php">Add Post</a>
       <a href="registretion.php">Add Auther</a>
       <a href="author_list.php">Auther List</a>
       <a href="">My Details</a>
   </div>
  <?php 
   include("dbcon.php");
  $qry="SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id ORDER BY cid DESC ";
 $run=mysqli_query($conn,$qry);
  $count=0;
  while($data = mysqli_fetch_assoc($run)){
    $count++;
 ?>
   </div>
   <div class="content">
  <div class="title">
     <h2> <?php  echo "#".''.$count.'  '.$data['title'];?></h2>  
  </div>
  <div class="time">
     Posted On : <?php echo $data['datetime'];?>
     </div>
   <div class="desc">
     <?php echo $data['short_desc'];?>
   </div>
   <div class="time1">
       Author : <?php echo $data['fname'];?>
   </div>
   <div class="btnn">
   <a href="admin_edit.php?id=<?php echo $data['cid']?>"  name="edit">Edit Post</a>
   <a href="delete.php?id=<?php echo $data['cid']?>"  name="edit">Delete Post</a>

   </div>
   <hr>
   </div>
   <?php } ?>
   <div class="footer">
</body>
</html>