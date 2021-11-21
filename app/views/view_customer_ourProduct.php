<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/web-Experts/public/login/index");
}

?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Home </title>
  <link rel="stylesheet" href="../../public/styles/view_rep_Home.css">
  <link rel="stylesheet" href="../../public/styles/view_customer_ourproduct.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<div class="sidebar">
    <div class="logo-details">

      <div class="logo_name">Himalee Dairy Product</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="#">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="../customer/place_order_view">

          <i class='bx bxs-cart-add'></i>
          <span class="links_name">Place Order</span>
        </a>
        <span class="tooltip">Place Order</span>
      </li>

      <li>
        <a href="#" onclick="pop_up_report()">
          <i class='bx bx-line-chart'></i>
          <span class="links_name">Reports</span>
        </a>
        <span class="tooltip">Reports</span>
      </li>
      <li>
        <a href="../customer/our_products">
          <i class="fas fa-ice-cream"></i>
          <span class="links_name">Our Products</span>
        </a>
        <span class="tooltip">Our Products</span>
      </li>
      <li>
        <a href="../customer/view_notification">
          <i class='bx bx-bell'></i>
          <span class="links_name">Notification</span>
        </a>
        <span class="tooltip">Notification</span>
      </li>
      <li>
        <a href="../customer/profile">
          <i class="far fa-user-circle"></i>
          <span class="links_name">Profile</span>
        </a>
        <span class="tooltip">Profile</span>
      </li>
      <li>
        <a href="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="links_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <img src="profile.jpg" alt="profileImg">
          <div class="name_job">
            <div class="name"></div>
            <div class="job">Customer</div>
          </div>
        </div>
        <i class="fas fa-store" id="log_out"></i>
      </li>
    </ul>
  </div>

  <section class="home-section">
<div class="header">
  <?php
require 'view_headertype2.php';
?>
</div>
  <div class="body">
   
    
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
   
    </section>
   


    <script src="../../public/java script/view_rep_Home.js"></script>
    
</body>

</html>