<?php
 
  spl_autoload_register(function($class){
    require($class.'.php');
  });

 
$rid = $_REQUEST['id'];
$obj3 = new delete1();
$obj3->delete('comment_tb','rid = "'.$rid.'"');
 
   header('location:index.php'); 
?>

