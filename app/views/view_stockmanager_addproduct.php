<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<form action="../product/add_product"  method="post" autocomplete="off">

<p>Product Id</p>
<input type="text" name="id" required>
<p>Product Name</p>
<input type="text" name="name" required>
<p>Category</p>
<select name="category" id="type">
    <option value="Yoghurt">Yoghurd</option>
    <option value="IceCream">IceCream</option>
    <option value="Curd">Curd</option>
    <option value="Milk">Freash Milk</option>
  </select>
<!-- <input type="text" name="category" required> -->
<p>Descrption</p>
<input type="text" name="des" required>
<p>Price</p>
<input type="text" name="price" required>
<p>Image</p>
<input type="file" name="file" style="width:300px" class="custom-file-input" required>
<br>
<input type="submit" name="submit" value="Add to Product">
<div class="error">
<?php

                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
      
      ?>  
      </div>


</form>




</div>






    </div>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>