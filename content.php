<?php
include("dbcon.php");
session_start();
//  error_reporting(0);
spl_autoload_register(function($class){
  require_once($class.'.php');
});
 
if(isset($_POST['submit'])){
    // $cid = $_REQUEST['id'];
    $cid = $_REQUEST['id'];
    $cname = $_POST['cname'];
    $msg = $_POST['comment'];
    $email=$_POST['email'];


    $obj = new insert();
     $obj->insert1('comment_tb',['cid'=>$cid,'cname'=>$cname,'comment'=>$msg,'email'=>$email,]);
     
    

	if ($run) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>content</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="com.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@0,400;0,700;1,300;1,400&display=swap" rel="stylesheet"> 
  
</head>
<body>  
<nav>
     
     <input type="checkbox"  id="check">
     <label for="check" class="checkbtn">
     <i class="fas fa-bars"></i> 
     </label>
     <label class="logo">iBLOG</label>
    
       <ul>
       
       <li> <a class="active" href="index.php">Home</a></li>
       <li><a href="contact.php">Contact Us</a></li>
     <!-- <li><a href="logout.php">Logout</a></li> -->
     <li><a href="#">About us</a></li>
     <?php
    if(isset($_SESSION['typee'])){
    ?> 
     <li><a href="admin_dash.php">Admin</a></li>
     <li><a href="logout.php">Logout</a></li>
   
     <?php
    }
   ?> 
   <?php
     if(isset($_SESSION['pass'])){
     ?>
     
    <li><a href="author_dash.php">Author</a></li>
    <li><a href="author_info.php">My Details</a></li>
    <li><a href="logout.php">Logout</a></li>
    

    <?php
   }
    if( $_SESSION['pass']  ==false){
     ?> 
     
     <li><a href="login.php">login</a></li>
      <li><a href="registretion.php">Register </a></li>
 
             
<?php
}
?>
</ul>
<div class="iconn">
      <img src="sun.png" id="icon">
       </div>

</nav> 


  
<?php
 
 
		$rid = $_REQUEST['id'];
		$obj = new getpost();
		$datas = $obj->get1data("SELECT * FROM `post` WHERE cid = $rid");  
		 foreach ($datas as $f){
				  
   ?> 
    
    <div class="mcontent">

<div class="lcontent">
<div class="imgee">
   <div class="title">
     <h2> <?php  echo $f['title'];?></h2>  
  </div>
  <div class="time">
     Posted On : <?php echo $f['datetime'];?>
     </div>
     <img src="imagess\<?php echo $f['image'];?>">
     </div>
   </div>
<div class="content">
    <div class="desc">
   <?php echo $f['content'];?>
   </div>
   
    
    <div class="btnn">
      <a href="index.php">back</a>
      <input type="button" value="comment" class="cctbn" id="cbtn">

    </div>
   
   </div>
  <?php } ?>
     <hr>   
</div>
</div>

	<div class="wrapper" id="cboxx">
		<form action="" method="POST" class="form">
			<div class="row">
				<div class="input-group">
					<label for="name">Name</label>
					<input type="text" name="cname" id="cname" placeholder="Enter your Name" required>
				</div>
				<div class="input-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="Enter your Email" >
				</div>
			</div>
			<div class="input-group textarea">
				<label for="comment">Comment</label>
				<textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
			</div>
			<div class="input-group">
				<button name="submit" class="btn" >Post Comment</button>
			</div>
           
		</form>
		<div class="prev-comments">
			<?php  
               
                  
                  $cid = $_REQUEST['id'];
                  $obj = new getpost();
                   $datas = $obj->get1data("SELECT * FROM `comment_tb` WHERE `cid`='$cid' ORDER BY rid DESC  ");  
                    foreach ($datas as $data){
			?>
			<div class="single-item">
				<h4><?php echo $data['cname']; ?></h4>
				 <a href="mailto:<?php echo $data['date']; ?>"><?php echo $data['date']; ?></a> 
				<p><?php echo $data['comment']; ?></p>
                <?php 
                if(isset($aname)){ ?>
                <a href="delete_com.php?id=<?php echo $data['rid']?>">DELETE</a>
                <?php } ?>
			</div>
			<?php

			
			}
      		
			?>
      </div>
    </div>
			
<script>
      var icon= document.getElementById("icon");
      icon.onclick =function(){
        document.body.classList.toggle("darkmode");
        if( document.body.classList.contains("darkmode")){
          
          icon.src= "sun.png";
             
          }else{
            icon.src= "moonicon.png";
          }
      }
      
      document.getElementById("cbtn").addEventListener("click",function()
       {
        var box1= document.getElementById("cboxx"); 
        if(box1.style.display=="none")
        {
          box1.style.display="block";
        }else{
          box1.style.display="none";
        }
       })
   </script>
</body>
</html>