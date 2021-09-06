<?php
class  update1 extends database{
public function update($table, $para = array(),$where = null){
     
    $args = array();

    foreach($para as $key => $value){
        $args[] = "$key = '$value'";
    }
     $sql = "UPDATE $table SET " . implode(', ', $args);
       if($where != null){
           $sql.= "  WHERE $where";
       }
      echo $sql;
     $this->connect()->query($sql);
}
}
?>