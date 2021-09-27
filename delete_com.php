<?php
 
  spl_autoload_register(function($class){
    require($class.'.php');
  });

 
$rid = $_REQUEST['id'];
$obj = new Comm();
$obj->delPost($rid);
   header('location:index.php'); 
?>

