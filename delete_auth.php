<?php
include("dbcon.php");
$rid = $_REQUEST['id'];
$qry = " DELETE FROM `author_info` WHERE author_id= $rid ";
$run= mysqli_query($conn,$qry);

// header('location:admin_dash.php');
?>
<script>alert('Your post sucsessfully updated');</script> 
 <?php header('location:author_list.php'); 
?>