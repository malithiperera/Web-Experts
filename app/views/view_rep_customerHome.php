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
  <link rel="stylesheet" href="../../public/styles/view_rep_customerHome.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <a href="../salesRep/home">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
  <li>
    <a href="../salesRep/customer_registration">
      <i class='fas fa-user-plus fa-lg'></i>
      <span class="links_name">Customer Registration</span>
    </a>
    <span class="tooltip">Customer Registration</span>
  </li>
  <li>
<a href="../salesRep/customer_home">
<i class='bx bx-money'></i>
  <span class="links_name">Payments</span>
</a>
<span class="tooltip">Payments</span>
<!-- </li>
  <li>
    <a href="#">
      <i class='bx bx-user open-button' onclick="openForm()"></i>
      <span class="links_name ">Customer Profile</span>
    </a> -->
    <!-- <span class="tooltip">Customer Profile</span> -->
    <!-- <div class="form-popup" id="myForm">
      <div class="form-container">

        <label for="cus_id"><b>Enter Customer ID</b></label>
        <input type="text" placeholder="Enter ID" id="searchCus_cusId" required>

        <button class="btn" onclick="searchRep()">Search</button>
        <button class="btn cancel" onclick="closeForm()">Close</button>
      </div>
    </div>
  </li> -->

  <li>
    <!-- <a href="../orders/create_bill"> -->
    <a href="../salesRep/offline_placeOrder">
      <i class='bx bxs-cart-add'></i>
      <span class="links_name">Place Order</span>
    </a>
    <span class="tooltip">Place Order</span>
  </li>

  <li>
    <a href="../salesRep/returns">
      <i class="fas fa-exchange-alt"></i>
      <span class="links_name">Returns</span>
    </a>
    <span class="tooltip">Returns</span>
  </li>

  <!-- <li>
    <a href="../salesRep/view_report">
      <i class='bx bx-line-chart'></i>
      <span class="links_name">Reports</span>
    </a>
    <span class="tooltip">Reports</span>
  </li> --> 

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
    <a href="../  customer/profile">
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

<!-- ADD HEADER -->
<section class="home-section">
    <div class="header">
        <?php require 'view_headertype2.php'; ?>
    </div>

    <section class="cards-section">
      <div class="cards">
        <!-- <div class="card">
          <p><i class="fas fa-user"></i><br>Customer ID</p>
          <p id="result">C1025</p>
        </div>
        <div class="card">
          <p><i class="fas fa-map-marker-alt"></i><br>Route ID</p>
          <p id="result">103</p>
        </div>
        <div class="card">
          <p><i class="fas fa-toggle-on"></i><br>Status</p>
          <p id="result">Active</p>
        </div>
        <div class="card">
          <p><i class="fas fa-credit-card"></i><br>Credit Period</p>
          <p id="result">3 weeks</p>
        </div> -->

      </div>
    </section>
    <h2>DELIVERED</h2>
    <div class="table-wrapper">
      <table class="fl-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Amount</th>
            <th>Pay Now</th>

          </tr>
        </thead>
        <?php
        if ($this->result->num_rows > 0) {
          while ($row = $this->result->fetch_assoc()) {
            if ($row['status'] == "D") {
              echo "<tr>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . $row['date'] . "</td>
                    <td>" . $row['amount'] . "</td>
                    <td><button onclick=\"location.href='../salesRep/cashPayment';\">Cash</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick=\"location.href='../salesRep/chequePayment';\">Cheque</button></td>
                    
        </tr>";
            }
          }
        }

        ?>

      </table>
    </div>
    <h2>NOT DELIVERED</h2>
    <div class="table-wrapper">
      <table class="fl-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Amount</th>

          </tr>
        </thead>
        <?php
        if ($this->result1->num_rows > 0) {
          while ($row = $this->result1->fetch_assoc()) {
            if ($row['status'] == "not-delivered") {
              echo "<tr>
                    <td>" . $row['order_id'] . "</td>
                    <td>" . $row['date'] . "</td>
                    <td>" . $row['amount'] . "</td>
                  </tr>";
            }
          }
        }
        ?>

      </table>
    </div>
    <div><input type="submit" value="Back" id="confirm" onclick="window.location.href='../salesRep/home';"></div>

    <script src="../../public/java script/view_rep_Home.js"></script>

    <script>
      let cus_id = '<?php $_GET['cus_id'] ?>';

      fetch('http://localhost/web-Experts/public/salesRep/search_customer', {
          method: 'POST', // *GET, POST, PUT, DELETE, etc.
         
          headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
          },
          
          body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);
        });
    </script>


</body>

</html>