<?php
spl_autoload_register(function($class){
    require_once($class.'.php');
});
class insert extends database{

    public function insert1 ($table,$para=array()){
        
        $table_columns = implode(', ', array_keys($para));
        $table_value= implode("', '",$para);
        $sql= "INSERT INTO $table ( $table_columns) VALUES (' $table_value') ";
         $this->connect()->query($sql);
            
    }

}

?>