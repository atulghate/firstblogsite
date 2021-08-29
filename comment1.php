<?php 

include("dbcon.php");

 error_reporting(0); 
if(isset($_POST['submit'])){
    $cid = $_REQUEST['id'];
    $cname = $_POST['cname'];
    $msg = $_POST['comment'];
    $email=$_POST['email'];
   
    $qry="INSERT INTO `comment_tb`( `cid`, `cname`, `comment`,`email`) VALUES (' $cid','$cname','$msg','$email')" ;
    $run=mysqli_query($conn,$qry);


	if ($run) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="com.css">
    <link rel="stylesheet" href="style.css">

	<title>Comment </title>
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
    <div>
        <h2>Write Your Comments</h2>
    </div>
	<div class="wrapper">
		<form action="" method="POST" class="form">
			<div class="row">
				<div class="input-group">
					<label for="name">Name</label>
					<input type="text" name="cname" id="cname" placeholder="Enter your Name" required>
				</div>
				<div class="input-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="Enter your Email" required>
				</div>
			</div>
			<div class="input-group textarea">
				<label for="comment">Comment</label>
				<textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Post Comment</button>
			</div>
           
		</form>
		<div class="prev-comments">
			<?php  
                $cid = $_REQUEST['id'];
                include("dbcon.php");
                $qry="SELECT * FROM `comment_tb` WHERE `cid`='$cid' ORDER BY rid DESC ";
                $run=mysqli_query($conn,$qry);
                 $count=0;
                 while($data = mysqli_fetch_assoc($run)){
			?>
			<div class="single-item">
				<h4><?php echo $data['cname']; ?></h4>
				 <a href="mailto:<?php echo $data['date']; ?>"><?php echo $data['date']; ?></a> 
				<p><?php echo $data['comment']; ?></p>
			</div>
			<?php

			
			}
			
			?>
		</div>
	</div>
</body>
</html>