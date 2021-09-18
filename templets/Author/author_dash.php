<?php
session_start();
if(isset($_SESSION['pass'])){
  $aid= $_SESSION['aid'];
  $aname= $_SESSION['pass'];
}else{
    header('location:index.php');
}

spl_autoload_register(function($class){
//   require_once($class.'.php');
 require_once("../../".$class.'.php');
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

    <link rel="stylesheet" href="\..\css&scss\index.css">
   
</head>
<body>
<nav>
  <input type="checkbox"  id="check">
  <label for="check" class="checkbtn">
  <i class="fas fa-bars"></i> 
  </label>
  <label class="logo">iBLOG</label>
 <ul>
     <li><a href="/../index.php">Home</a></li>
     <li> <a href="author_post.php">My post</a></li>

  <li><a href="logout.php">Logout</a></li>
  
  </ul>
  </nav>
  <center>
  <div class="box1">
        <h2>Create New Post</h2>
    
    <div class="post">
<form action="#" method="post" enctype="multipart/form-data"> 
   <textarea name="title" id="" cols="44" rows="2" placeholder= " Enter blog Title" required></textarea>
   <div class="desc">
   <textarea name="short_desc" id="" cols="44" rows="5"  placeholder= " Enter short description" required></textarea>
   </div>
   <div>
       <textarea name="content" id="" cols="44" rows="8" placeholder= " Enter total description" required></textarea>
   </div>
   <div class="uploadimg ">
   <input type="file" name="image" required>
   </div>
   <div class="btnn">
       <input type="submit" value="Add Post" name="submit">
   </div>
   </div>

   </center>


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
     move_uploaded_file($tempimage,"../../imagess/$imagename");

     $aid= $_SESSION['aid'];
     $obj = new Posts();
    $obj->addPost($aid,$title,$desc,$content,$imagename);
     header("location:author_post.php");
 
    //  $obj->insert1('post',['author_id'=>$aid,'title'=>$title,'short_desc'=>$desc,'content'=>$content,'image'=>$imagename,]);

    }


}


?>