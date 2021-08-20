<?php
session_start();
$typee= $_SESSION['typee'];
$aid=$_SESSION['aid'];

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
<body>
   <div class="navigation">
    <div class="left">
    <h2>iBlog</h2>
   <a href="index.php">Home</a>
    </div>
 <div class="right">
 <ul>
  <li><a href="contact.php">Contact Us</a></li>
  <li><a href="admin_dash.php">Admin</a></li>
</ul>
</div>

</div>
<center>
    <div class="post">
        <h2>Create New Post</h2>
    </div>
    <div class="post">
<form action="#" method="post"> 
   <textarea name="title" id="" cols="44" rows="2" placeholder= " Enter blog Title" required></textarea>
   <div><div class="desc">
   <textarea name="short_desc" id="" cols="44" rows="5"  placeholder= " Enter short description" required></textarea>
   </div>
   <div>
       <textarea name="content" id="" cols="44" rows="8" placeholder= " Enter total description" required></textarea>
   </div>
   <div>
       <input type="submit" value="Add Post" name="submit">
   </div>
   </div>
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

    $qry="INSERT INTO `post`( `author_id`, `title`, `short_desc`, `content`) VALUES (' $aid','$title','$desc','$content')" ;
    $run=mysqli_query($conn,$qry);
    }


}else{
    echo" ";
}


?>