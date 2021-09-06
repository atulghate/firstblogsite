<?php
session_start();
if(isset($_SESSION['pass'])){
  $aid= $_SESSION['aid'];
  $aname= $_SESSION['pass'];
}else{
    header('location:index.php');
}

spl_autoload_register(function($class){
  require_once($class.'.php');
});
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
   <input type="file" name="image" >
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
</center>
<?php
    $aid= $_SESSION['aid'];
    $obj = new getpost();
     $datas = $obj->get1data("SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id WHERE post.author_id= $aid");
     
         
     foreach ($datas as $data){
?>
    
    <div class="mcontent">
      <div class="lcontent">
      <div class="imgee" id="imgee1">
      <div class="title">
      <h2> <?php  echo $data['title'];?></h2>  
   </div>
   <div class="time">
      Posted On : <?php echo $data['datetime'];?>
      </div>
      <img src="imagess\<?php echo $data['image'];?>">
      </div>
      </div>
    <div class="content">
  
    <div class="desc">
      <?php echo $data['short_desc'];?>
    </div>
    <div class="time1">
        Author : <?php echo $data['fname'];?>
    </div>
    <div class="btnn">
     <a href="update.php?id=<?php echo $data['cid']?>"  name="edit">EDIT POST</a>
     <a href="delete.php?id=<?php echo $data['cid']?>"  name="edit">DELETE POST</a>
     <a href="comment1.php?id=<?php echo $data['cid']?>"  name="edit"> Comments&nbsp; </a>


    </div>
    <hr>
    </div>
    </div>
  <?php  
     }
  ?>
    <div class="footer">
 </body>
 </html>
<?php


if(isset($_POST['submit'])){
    if(isset($_POST['content'])){
   $title = $_POST['title'];
    $desc = $_POST['short_desc'];
    $content = $_POST['content'];
     $imagename = $_FILES['image']['name'];

     $tempimage = $_FILES['image']['tmp_name'];
     move_uploaded_file($tempimage,"imagess/$imagename");

     $aid= $_SESSION['aid'];
     $obj = new insert();
    $obj->insert1('post',['author_id'=>$aid,'title'=>$title,'short_desc'=>$desc,'content'=>$content,'image'=>$imagename,]);
    // header("location:index.php");
 

    }


}


?>