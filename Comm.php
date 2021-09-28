<?php

class Comm extends Db {



    public function comment1($cid)
    {
      $sql = "SELECT * FROM comment_tb   WHERE cid = ?  ORDER BY rid";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$cid]);
      $result = $stmt->fetchAll();
  
      return $result;
    }




    public function addcomment($cid, $cname, $msg, $email)
    {
      $sql = "INSERT INTO comment_tb (cid,cname,comment,email) VALUES (?, ?, ?, ?)";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$cid, $cname, $msg, $email]);
    }


    public function delPost($id)
    {
      $sql = "DELETE FROM comment_tb WHERE rid = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
    }


}
?>