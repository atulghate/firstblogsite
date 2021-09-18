<?php

  class Author extends database{
  
    public function get1data($qry ){
        
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

        public function getdatabyId($condition=null ){
        
          $sql = "SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id
       WHERE  ";
        if($condition != null){
            $sql .= "post.author_id =  $condition";}

          $result = $this->connect()->query($sql);
          $numrows = $result->num_rows;
          if($numrows > 0){
              while($row = $result->fetch_assoc()){
                  $data[]=$row; 
              }
              return $data; 
          }

        }

    
    public function update($table, $para = array(),$where = null){
     
      $args = array();
  
      foreach($para as $key => $value){
          $args[] = "$key = '$value'";
      }
       $sql = "UPDATE $table SET " . implode(', ', $args);
         if($where != null){
             $sql.= "  WHERE $where";
         }
      //   echo $sql;
       $this->connect()->query($sql);
  }
  

    public function delete($table,$where = null,$condition = null){
        
        $sql = " DELETE FROM $table";
         if($where != null){
             $sql .= " WHERE  $where";
             if($condition != null){
                 $sql .= " AND $condition";
             }
         }
         
       if($this->connect()->query($sql)){
           echo"true";
       }else {   echo "false";}
   
  }
//    public function insert1 ($table,$para=array()){
        
//         $table_columns = implode(', ', array_keys($para));
//         $table_value= implode("', '",$para);
//         $sql= "INSERT INTO $table ( $table_columns) VALUES (' $table_value') ";
//          $this->connect()->query($sql);
            
//     }

    public function insert2 ($aid,$title,$desc,$content,$imagename){
        
        // $table_columns = implode(', ', array_keys($para));
        // $table_value= implode("', '",$para);
        $sql= "INSERT INTO `post`( `author_id`, `title`, `short_desc`, `content`, `datetime`, `image`) VALUES ('$aid','$title','$desc','$content','$imagename')";
         $this->connect()->query($sql);
            
    }
}
    // //  $obj->insert1('post',['author_id'=>$aid,'title'=>$title,'short_desc'=>$desc,'content'=>$content,'image'=>$imagename,]);
    //  `post`( `author_id`, `title`, `short_desc`, `content`, `datetime`, `image`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')