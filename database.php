
<?php
class database{


    private $db_host="localhost";
    private $db_user="root";
    private $db_pass="";
    private $db_name="blogsite";

    private $conn=false;
    private $mysqli="";
    private $result=array();
     
    public function connect(){
            $this->mysqli = new mysqli($this-> db_host,$this-> db_user,$this-> db_pass,$this-> db_name);
        
            return $this->mysqli;
        
        }

    }?>