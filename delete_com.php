<?php
include("dbcon.php");
$rid = $_REQUEST['id'];
$qry = " DELETE FROM `comment_tb` WHERE rid= $rid ";
$run= mysqli_query($conn,$qry);

  header('location:index.php'); 
 
?>