<?php

spl_autoload_register(function($class){
    require_once($class.'.php');
});

// include("db_oop.php");
  class getpost extends database{
  
    public function get1data($qry){
        
          $sql = null;
          $sql .=  $qry ;
        
          $result = $this->connect()->query($sql);
          $numrows = $result->num_rows;
          if($numrows > 0){
              while($row = $result->fetch_assoc()){
                  $data[]=$row; 
              }
              return $data; 
          }

        }

    }
    
?> 
