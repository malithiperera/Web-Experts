<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_stockmanager_addproduct.css">
    <title>Products</title>
 
</head>
<body>
<div class="header">
<?php
require 'view_headertype2.php';
?>
</div>
    <div class="container">
<div class="form">
    <h3>Product Profile</h3>
<form action="upload.php"  method="post" enctype="multipart/form-data">

<p>Product Name</p>
<input type="text" name="name">

<p>Descrption</p>
<input type="text" name="des">
<p>Price</p>
<input type="text" name="price">
<p>Image</p>
<input type="file" name="file" style="width:200px">
<br>
<input type="submit" name="submit" value="submit">

 <?php
                    // if(isset($_SESSION["error"])){
                    //     $error = $_SESSION["error"];
                    //     echo "<span>$error</span>";
                    
                ?>   


</form>




</div>
</div>
</body>
</html>
<!-- <?php
    // unset($_SESSION["error"]);
?> -->