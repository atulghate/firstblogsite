<?php
spl_autoload_register(function($class){
  require_once($class.'.php');
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="log.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body>
<nav>
  <input type="checkbox"  id="check">
  <label for="check" class="checkbtn">
  <i class="fas fa-bars"></i> 
  </label>
  <label class="logo">iBLOG</label>
    <ul>
    
    <li> <a class="active" href="index.php">Home</a></li>
    <li><a href="author_dash.php">Back</a></li>
   <li><a href="logout.php">Logout</a></li> 
  <li><a href="admin_dash.php">Admin</a></li>
  </ul>
  </nav>
   <center>
   <?php 

            
            $rid = $_REQUEST['id'];
            $obj = new getpost();
             $datas = $obj->get1data("SELECT * FROM `author_info` WHERE  author_id= $rid ");
                 
             foreach ($datas as $f){
 
     ?> 
<div class="regbox">
   <h1>Update Author Inforamtion</h1>
    <form action="#" method="post">
<table>
        <th>Enter Full Name</th>
        <td><input type="text" name="fname"  value="<?php echo $f['fname']?>" ></td>
    </tr>
    <tr>
      <th>Gender</th>
      <td><input type="radio" name="gender"  value="male" required>Male
      <input type="radio" name="gender" id="" value="female" required>Female
    </td>
    </tr>
    <tr><th> Email</th>
     <td><input type="text" name="email" value="<?php echo $f['email']?>" required></td>
</tr>
<tr>
    <th>Mobile</th>
    <td><input type="text" name="mobile" value="<?php  echo $f['mobile']?>" required></td>
</tr>
<tr><th>Create password</th>
     <td><input type="text" name="password" value="<?php echo $f['password']?>" required></td>
</tr>
<tr>
  <th>Enter user type</th>
  <td><input type="text" name="type" value="<?php  echo $f['type']?>" required ></td>
</tr>
</table>
<div class="sub">
    <input type="submit" name="submit" value="UPDATE" ></th></tr>
  </div>
  </form>
  <?php
}
?>
</center>

</div>
</body>
</html>
<?php






if(isset($_POST['submit'])){
  
 $fname =$_POST['fname'];
 $gender =$_POST['gender'];
 $email =$_POST['email'];
 $mobile =$_POST['mobile'];
 $password =$_POST['password'];
 $type=$_POST['type']; 


$rid = $_REQUEST['id'];
$obj1 = new update1();
$obj1->update ('author_info',['fname'=> $fname,'gender'=>$gender,'email'=>$email,'mobile'=> $mobile,'password'=> $password,'type'=> $type ], 'author_id= "'.$rid.'"');

   header("location:author_dash.php");


    if ($obj1) {
      echo " <script>alert(' Updated successfully.')</script>";
    } else {
      echo "<script>alert(' does not add.')</script>";
    }
    header("location:author_dash.php");
}else{
  echo " ";
}

  ?> 
 
