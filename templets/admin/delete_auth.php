<?php


spl_autoload_register(function($class){
  require_once("../../".$class.'.php');
  });

 
$rid = $_REQUEST['id'];
$obj3 = new Posts();
$obj3->delauthor($rid);
   header('location:author_list.php'); 
?>