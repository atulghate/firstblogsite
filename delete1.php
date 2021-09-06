<?php

include("database.php");
  class delete1 extends database{

    public function delete($table,$where = null,$condition = null){
        
        $sql = " DELETE FROM $table";
         if($where != null){
             $sql .= " WHERE  $where";
             if($condition != null){
                 $sql .= " AND $condition";
             }
         }
         echo $sql;
       if($this->connect()->query($sql)){
           echo"true";
       }else {   echo "false";}
   
  }

  }
?>