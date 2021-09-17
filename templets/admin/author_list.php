
<?php
session_start();
$typee= $_SESSION['typee'];
if(isset($_SESSION['typee'])){
  $typee= $_SESSION['typee'];
}else{
    header('location:index.php');
}

spl_autoload_register(function($class){
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
    <link rel="stylesheet" href="\..\css&scss\index.css">
     <link rel="stylesheet" href="log.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body>
<nav id="navx">
  <input type="checkbox"  id="check">
  <label for="check" class="checkbtn">
  <i class="fas fa-bars"></i> 
  </label>
  <label class="logo">iBLOG</label>
    <ul>
   <li>  <a href="admin_dash.php">Home</a></li> 
      <li><a href="author_list.php">Authors List</a></li>
     <li> <a href="logout.php">Logout</a></li>
</nav>
   <center>
<?php 


$obj = new Posts();
$j=9;
 $datas = $obj->gettableinfo();
    $count=0;
?>
 <table>
     <tr>
         <th>No.</th>
         <th>Name</th>
         <th>Mobile</th>
         <th>Password</th>
         <th>EDIT</th>
         <th>DELETE</th>
     </tr>
  <?php foreach( $datas as $f){ $count++; ?>
 
    <tr> <td><?php echo $count;?></td>
        <td><?php echo $f['fname'] ; ?></td>
        <td><?php echo $f['mobile'];?></td>
        <td><?php echo $f['password'];?></td>
        <td><a href="author_edit.php?id=<?php echo $f['author_id'] ?>">EDIT</a></td>
        <td><a href="templets\admin\delete_auth.php?id=<?php echo $f['author_id'] ?>">DELETE</a></td>

    </tr>
 
 <div>

 </div>
 </center>
<?php
 }

?>
</body>
</html>