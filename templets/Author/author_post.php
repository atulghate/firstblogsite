<?php
session_start();
if(isset($_SESSION['pass'])){
  $aid= $_SESSION['aid'];
  $aname= $_SESSION['pass'];
}else{
    header('location:index.php');
}

spl_autoload_register(function($class){
  // require_once($class.'.php');
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
  <li><a href="logout.php">Logout</a></li>
  
  </ul>
  </nav>
  <?php
    $aid= $_SESSION['aid'];
    $obj = new Posts();
     $datas = $obj->getpostbyid($aid);   
     foreach ($datas as $data){
?>

<div class="postbox">
      <div class="mcontent">
        <div class="lcontent">
          <div class="imgee">
             <div class="title">
              <h2> <?php echo $data['title']; ?></h2>
            </div>
            <div class="time"> 
               Posted On : <?php echo $data['datetime']; ?> 
            </div class="pimg">
            <img src="\..\imagess\<?php echo $data['image']; ?>">
          </div>
        </div>
        <div class="content">
       

          <div class="desc">
            <?php echo $data['short_desc']; ?>
          </div>
          <div class="time1">
            Author : <?php echo $data['fname']; ?>
          </div>
          <div class="btnn">
     <a href="author_update.php?id=<?php echo $data['cid']?>"  name="edit">EDIT POST</a>
     <a href="delete.php?id=<?php echo $data['cid']?>"  name="edit">DELETE POST</a>
     <a href="comment1.php?id=<?php echo $data['cid']?>"  name="edit"> Comments&nbsp; </a>


    </div>


            </div>
          </div>
          <hr>
        </div>

      </div>
<?php
     }
?>
