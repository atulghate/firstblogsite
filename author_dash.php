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
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>
<body>
<nav>
  <input type="checkbox"  id="check">
  <label for="check" class="checkbtn">
  <i class="fas fa-bars"></i> 
  </label>
  <label class="logo">iBLOG</label>
 <ul>
     <li><a href="index.php">Home</a></li>
  <li><a href="logout.php">Logout</a></li>
  
  </ul>
  </nav>
<center>
    <div class="boxx">
    <div class="phead">
        <h1>Create New Post</h1>
    </div>
<form action="#" method="post" enctype="multipart/form-data">

<div class="pppost">  
   <textarea name="title" id="" cols="44" rows="2" placeholder= " Enter blog Title" required></textarea>
</div>
       <div class="desc">
   <textarea name="short_desc" id="" cols="44" rows="5"  placeholder= " Enter short description" required></textarea>
   </div>
   <div class="ctext">
       <textarea name="content" id="" cols="44" rows="8" placeholder= " Enter total description" required></textarea>
   </div>
   <div class="upimage">
       <span>Upload images</span>
   <input type="file" name="image" required>
   </div>
   <div class="psubmit">
       <input type="submit" value="Add Post" name="submit">
   </div>
   </form>
   <div class="post">
       <hr>
   </div>

</div>

<div class="hpost">
 <h1>MY POST</h1>
</div>
<?php

include("dbcon.php");

$qry="SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id WHERE post.author_id=$aid AND author_info.fname='$aname'  ";

 $run=mysqli_query($conn,$qry);
   $data = mysqli_fetch_assoc($run);
  while($data = mysqli_fetch_assoc($run)){

 ?>
   </div>
   <div class="content" id="ccontent">
  <div class="title">
      <h1> <?php echo $data['title'];?></h1>
      <hr>
  </div>
   <div class="desc">
  <h3><h3>
   <h3><?php echo $data['short_desc'];?>
  <hr>
     Date&time:<b><?php echo $data['datetime'];?></b>
   </div>
   <div class="btn">
   <a href="update.php?id=<?php echo $data['cid']?>"  name="edit">EDIT POST</a>
   <a href="delete.php?id=<?php echo $data['cid']?>"  name="edit">DELETE POST</a>

   </div>
   </div>
   <?php } ?>


</center>
</body>
</html>
<?php

include("dbcon.php");
if(isset($_POST['submit'])){
    if(isset($_POST['content'])){
    $title = $_POST['title'];
    $desc = $_POST['short_desc'];
    $content = $_POST['content'];
     $imagename = $_FILES['image']['name'];

     $tempimage = $_FILES['image']['tmp_name'];
     move_uploaded_file($tempimage,"imagess/$imagename");
    

    $qry="INSERT INTO `post`( `author_id`, `title`, `short_desc`, `content`,`image`) VALUES (' $aid','$title','$desc','$content','$imagename')" ;
    $run=mysqli_query($conn,$qry);
    }


}else{
    echo" ";
}


?>