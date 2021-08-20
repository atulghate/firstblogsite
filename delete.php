
<?php
include("dbcon.php");
$rid = $_REQUEST['id'];
echo $rid;
$qry = " DELETE FROM `post` WHERE cid= $rid ";
$run= mysqli_query($conn,$qry);

// header('location:admin_dash.php');
?>
<script>alert('Your post sucsessfully updated');</script> 
 <?php header('location:admin_dash.php'); 
?>