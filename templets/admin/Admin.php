<?php
class Admin extends Db{
    
  public function getpostbyid($condition = null)
  {
    $sql = " SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id WHERE ";
    if ($condition != null) {
      $sql .= "post.cid =  $condition";
    }

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result1 = $stmt->fetchAll()) {
      return $result1;
    };
  }


  
  public function addPost($aid, $title, $desc, $content, $imagename)
  {
    $sql = "INSERT INTO post(author_id,title,short_desc,content,image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$aid, $title, $desc, $content, $imagename]);
  }



public function postupdate($rid, $title, $desc, $content,$imagename)    //update post
{
  $sql = "UPDATE post SET title = ?, short_desc = ?, content = ?, image = ? WHERE cid = ?";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$title, $desc, $content,$imagename, $rid]);
}

}
?>