<?php

class Posts extends Db
{
  public function getPost()
  {
    $sql = " SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id ORDER BY cid DESC";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function getPostedit($rid,$aid)
  {
    $sql = "SELECT * FROM `post` WHERE cid = $rid AND author_id= $aid";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }



  public function getpostbyid($condition = null)
  {
    $sql = " SELECT * FROM `post` INNER JOIN author_info ON post.author_id = author_info.author_id WHERE ";
    if ($condition != null) {
      $sql .= "post.author_id =  $condition";
    }
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result1 = $stmt->fetchAll()) {
      return $result1;
    };
  }

  public function getinfo($condition = null)
  {
    $sql = " SELECT * FROM `author_info` WHERE ";
    if ($condition != null) {
      $sql .=  "author_id =  $condition";
    }
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }


  public function getlogin($email,$pass)
  {
    $sql = " SELECT * FROM `author_info` WHERE `email`='$email'  AND `password`='$pass'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }
  
 

  public function gettableinfo()         //author info table
  {
    $sql = " SELECT * FROM `author_info`  ";
   
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }
  


  public function addPost($aid, $title, $desc, $content, $imagename)
  {
    $sql = "INSERT INTO post(author_id,title,short_desc,content,image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$aid, $title, $desc, $content, $imagename]);
  }





  public function updateblog($rid, $title, $desc, $content,$imagename)    //update post
  {
    $sql = "UPDATE post SET title = ?, short_desc = ?, content = ?, image = ? WHERE cid = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $desc, $content,$imagename, $rid]);
  }

  public function updatePost($fid, $fname, $gender, $email,$mobile,$password,$type) //update author info
  {
    $sql = "UPDATE author_info SET  fname = ?, gender = ?, email = ?, mobile = ?, password = ?, type = ? WHERE author_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([ $fname, $gender, $email,$mobile,$password,$type,$fid]);
  }




  public function createauthor($fname, $gender, $email,$mobile,$password,$type)
  {
    $sql = "INSERT INTO author_info (fname,gender,email,mobile,password,type) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$fname, $gender, $email,$mobile,$password,$type]);
  }




  public function delPost($id)
  {
    $sql = "DELETE FROM post WHERE cid = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  public function delauthor($id)
  {
    $sql = "DELETE FROM author_info WHERE author_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  public function getpostbyid1($condition = null)
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
}
