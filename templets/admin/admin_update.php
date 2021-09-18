<?php
session_start();
$typee = $_SESSION['typee'];
if (isset($_SESSION['typee'])) {
    $typee = $_SESSION['typee'];
} else {
    header('location:index.php');
}
spl_autoload_register(function ($class) {
    require_once($class.'.php');
});
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="\..\css&scss\index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">iBLOG</label>
        <ul>
            <li><a href="/../index.php">Home</a></li>
            <li><a href="/../logout.php">Logout</a></li>
            <li><a href="author_dash.php">Back</a></li>
        </ul>
    </nav>
    <center>
        <div class="boxx">
            <div class="post">
                <h1>Edit Your Post</h1>
            </div>
            <!-- <form action="#" method="post" enctype="multipart/form-data"> -->

            <div class="post">
                <?php
                // include("dbcon.php");
                $pid = $_REQUEST['id'];
                $obj4 = new Admin();
                $data = $obj4->getpostbyid($pid);

                foreach ($data as $f) {

                ?>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <textarea name="title" id="" cols="44" rows="2" placeholder=" Enter blog Title"><?php echo $f['title']; ?></textarea>
                        <div>
                            <div class="desc">
                                <textarea name="short_desc" id="" cols="44" rows="5" placeholder=" Enter short description"><?php echo $f['short_desc']; ?></textarea>
                            </div>
                            <div>
                                <textarea name="content" id="" cols="44" rows="8" placeholder=" Enter total description"><?php echo $f['content']; ?></textarea>
                            </div>
                            <div class="upimage">
                                <input type="file" name="fileToUpload" id="fileToUpload">

                            </div>
                            <div>
                                <input type="submit" value="Update Post" name="submit">
                            </div>
                    </form>
                    <div class="post">
                        <hr>
                    </div>
                <?php


                }
                ?>
            </div>
            </form>
    </center>
    </div>
</body>

</html>
<?php




if (isset($_POST['submit'])) {

    $rid = $_REQUEST['id'];
    $title = $_POST['title'];
    $desc = $_POST['short_desc'];
    $content = $_POST['content'];
    $imagename = $_FILES['fileToUpload']['name'];
    $tempimage = $_FILES["fileToUpload"]["tmp_name"];

    // $target_dir = "\..\..\imagess";

    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    move_uploaded_file($tempimage,"../../imagess/$imagename");

    $rid = $_REQUEST['id'];
    $obj1 = new Admin();
    $obj1->postupdate($rid, $title, $desc, $content, $imagename);
    header('location:admin_dash.php');
?> <script>
        alert('Your post sucsessfully  updated');
    </script> <?php


            }

                ?>