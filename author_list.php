<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="log.css"> -->
    
</head>
<body>

<div class="navigation">
  <div  class="left">
     <a href="#">iBlog</a>
     <a href="index.php">Home</a>
 </div>
  <div class="right1">
      <a href="author_list.php">Authors List</a>
      <a href="logout.php">Logout</a>  
  </div>
   </div>
   <center>
<?php 
include("dbcon.php");
 $qry="SELECT * FROM `author_info` WHERE `type`='author' ";
 $run = mysqli_query($conn,$qry);
 $count=0;?>
 <table>
     <tr>
         <th>No.</th>
         <th>Name</th>
         <th>Mobile</th>
         <th>Password</th>
         <th>EDIT</th>
         <th>DELETE</th>
     </tr>
  <?php foreach( $run as $f){ $count++; ?>
 
    <tr> <td><?php echo $count;?></td>
        <td><?php echo $f['fname'] ; ?></td>
        <td><?php echo $f['mobile'];?></td>
        <td><?php echo $f['password'];?></td>
        <td><a href="author_edit.php?id=<?php echo $f['author_id'] ?>">EDIT</a></td>
        <td><a href="delete_auth.php?id=<?php echo $f['author_id'] ?>">DELETE</a></td>

    </tr>
 
 <div>

 </div>
 </center>
<?php
 }
?>
</body>
</html>