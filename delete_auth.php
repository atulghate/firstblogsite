<?php


spl_autoload_register(function($class){
    require($class.'.php');
  });

 
$rid = $_REQUEST['id'];
$obj3 = new delete1();
$obj3->delete('author_info','author_id = "'.$rid.'"');
 
   header('location:author_list.php'); 
?>
