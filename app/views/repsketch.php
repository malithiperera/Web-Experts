<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/web-Experts/public/login/index");
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="../../public/styles/sidebar.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_button.css">
  
    
</head>

<body>

    <!-- START SIDE BAR -->

  <div class="sidebar">

<div class="logo-details">

  <div class="logo_name">Himalee Dairy Products</div>
  <i class='bx bx-menu' id="btn"></i>
</div>

<ul class="nav-list">

  <li>
    <a href="../salesRep/customer_registration">
      <i class='fas fa-user-plus fa-lg'></i>
      <span class="links_name">Customer Registration</span>
    </a>
    <span class="tooltip">Customer Registration</span>
  </li>

  <li>
    <a href="#">
      <i class='bx bx-user open-button' onclick="openForm()"></i>
      <span class="links_name ">Customer Profile</span>
    </a>
    <!-- <span class="tooltip">Customer Profile</span> -->
    <div class="form-popup" id="myForm">
      <div class="form-container">

        <label for="cus_id"><b>Enter Customer ID</b></label>
        <input type="text" placeholder="Enter ID" id="searchCus_cusId" required>

        <button class="btn" onclick="searchRep()">Search</button>
        <button class="btn cancel" onclick="closeForm()">Close</button>
      </div>
    </div>
  </li>

  <li>
    <!-- <a href="../orders/create_bill"> -->
    <a href="../customer/place_order_view">
      <i class='bx bxs-cart-add'></i>
      <span class="links_name">Place Order</span>
    </a>
    <span class="tooltip">Place Order</span>
  </li>

  <!-- <li>
    <a href="../salesRep/product_list">
      <i class="fas fa-clipboard-list"></i>
      <span class="links_name">Product List</span>
    </a>
    <span class="tooltip">Product List</span>
  </li> -->

  <li>
    <a href="../salesRep/view_report">
      <i class='bx bx-line-chart'></i>
      <span class="links_name">Reports</span>
    </a>
    <span class="tooltip">Reports</span>
  </li>

  <li>
    <a href="../salesRep/view_notifications">
      <i class='bx bx-bell'></i>
      <span class="links_name">Notifications</span>
    </a>
    <span class="tooltip">Notifications</span>
  </li>

  <li>
    <a href="../salesRep/achievements">

      <i class="fas fa-trophy"></i>
      <span class="links_name">Achievements</span>
    </a>
    <span class="tooltip">Achievements</span>
  </li>

  <li>
    <a href="../salesRep/profile">
      <i class="far fa-user-circle"></i>
      <span class="links_name">Profile</span>
    </a>
    <span class="tooltip">Profile</span>
  </li>

  <li>
    <a href="../login/logout">
      <i class="fas fa-sign-out-alt"></i>
      <span class="links_name">Logout</span>
    </a>
    <span class="tooltip">Logout</span>
  </li>

  <li class="profile">
    <div class="profile-details">
      <img src="profile.jpg" alt="profileImg">
      <div class="name_job">
        <div class="name">ABC</div>
        <div class="job">Sales Rep</div>
      </div>
    </div>
    <i class="fas fa-store" id="log_out"></i>
  </li>

</ul>

</div>

<!-- END SIDE BAR -->

    <section class="home-section">
    <div class="header">
      <?php  require 'view_headertype2.php'; ?>
    </div>
  

    
    </section>



    



    <script>
        

        
    </script>

    <script src="../../public/java script/side_bar.js"></script>
</body>

</html>