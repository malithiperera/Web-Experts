
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Product</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="../../public/styles/view_customer_ourproduct.css">
</head>
<body>
    <div class="body">
    <div class="header">
        <?php
require 'view_headertype2.php';
?>

        </div>
    
        <section class="logo">
            <div class="content">
        <h3>Our Products</h3>
          </div>
         </section>

            <section class="yoghurt">
        <h4>Yoghurts <span>Products </span></h4>
            <div class="main-card">
<?php
        
        while($data = mysqli_fetch_array($this->added1))
        {
        
      
        $image_name = '../../public/images/uploads/'.$data["image"];
?>

<div class="card"> 
     <div class="card-image"><img src="<?php echo $image_name; ?>" alt="" ></div>
     <h2><?php echo $data['product_name'] ?></h2>
     <p><span class="topic"> Id:</span><?php echo $data['product_id'] ?></p>
     <p><?php echo $data['description'] ?></p>
     <p>Rs.<?php echo $data['price'] ?></p>
 </div>
<?php }


  ?>

</div>
</section>
<section class="icecream">
            <h4>Ice Cream <span>Products </span></h4>
            <div class="main-card">
<?php
        
        while($data = mysqli_fetch_array($this->added))
        {
      
        $image_name = '../../public/images/uploads/'.$data["image"];
?>

<div class="card">
     <div class="card-image"><img src="<?php echo $image_name; ?>" alt="" ></div>
     <h2><?php echo $data['product_name'] ?></h2>
     <p>Product Id:<?php echo $data['product_id'] ?></p>
     <p><?php echo $data['description'] ?></p>
     <p>Rs.<?php echo $data['price'] ?></p>
 </div>
<?php }


  ?>

</div>

    </section>

<section class="curd">
            <h4>Curd <span>Products </span></h4>
            <div class="main-card">
<?php
        
        while($data = mysqli_fetch_array($this->added2))
        {
      
        $image_name = '../../public/images/uploads/'.$data["image"];
?>

<div class="card">
     <div class="card-image"><img src="<?php echo $image_name; ?>" alt="" ></div>
     <h2><?php echo $data['product_name'] ?></h2>
     <p>Product Id:<?php echo $data['product_id'] ?></p>
     <p><?php echo $data['description'] ?></p>
     <p>Rs.<?php echo $data['price'] ?></p>
 </div>
<?php }


  ?>

</div>
    </section>

    <!-- <section class="curd">
            <h4>Fresh Milk <span>Products </span></h4>
            <div class="main-card">
<?php
        
        while($data = mysqli_fetch_array($this->added3))
        {
      
        $image_name = '../../public/images/uploads/'.$data["image"];
?>

<div class="card">
     <div class="card-image"><img src="<?php echo $image_name; ?>" alt="" ></div>
     
 </div>
<?php }


  ?>

</div>
    </section> -->

<div class="btn">
    <a href="../customer/back_cus_home">Back</a>
    <!-- <button onclick="">Back</button> -->
    <div class="footer1">
<?php require 'view_footer.php'; ?>

</div>
</body>
</html>