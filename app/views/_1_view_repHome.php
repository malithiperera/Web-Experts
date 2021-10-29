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
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

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
          <form action="../salesRep/customer_home" class="form-container">

            <label for="email"><b>Enter Customer ID</b></label>
            <input type="text" placeholder="Enter ID" name="email" required>

            <button type="submit" class="btn" src=>Search</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
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
        <!-- <span class="tooltip">Reports</span> -->
      </li>
      <li>
        <a href="../salesRep/view_notifications">
          <i class='bx bx-bell'></i>
          <span class="links_name">Notifications</span>
        </a>
        <!-- <span class="tooltip">Notifications</span> -->
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
        <a href="#">
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
  <section class="home-section">
    <section class="cards-section">
    <div class="top">
        <div class="card-1">
          <p><i class="fas fa-user-tie"></i><br>Rep Id</p>
          <p id="top-detail-1"><?php echo $_SESSION['userid'];  ?></p>
        </div>
        <div class="card-1">
          <p><i class="fas fa-trophy"></i><br>Target</p>
          <p id="top-detail-1"><span id=rep></span></p>
        </div>
      </div>
      <div class="cards">
        <div class="card">
          <p><i class="fas fa-ice-cream"></i><br>Kinds of Products</p>
          <p id="item">10</p>
        </div>
        <div class="card">
          <p><i class="fas fa-shopping-cart"></i><br>Pending deliveries</p>
          <p id="item">1</p>
        </div>
        <div class="card">
          <p><i class="fas fa-users"></i><br>No of Customers</p>
          <p id="item">10</p>
        </div>
        <div class="card">
          <p><i class="fas fa-map-marker-alt"></i><br>No of Routes</p>
          <p id="item">10</p>
        </div>

      </div>
    </section>
    <h2>ORDERS</h2>
    <div class="table-wrapper">
      <table class="fl-table">
        <thead>
          <tr>
            <th>Route</th>
            <th>Shop</th>

          </tr>
        </thead>
        <tbody class="orders">
      
     
        <tbody>
      </table>
    </div>


    <script src="../../public/java script/view_rep_Home.js"></script>
    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>

       <!-- fill table -->
    <script>
      var orders_table = document.querySelector('.orders');

      const fill_table = () => {
        fetch('http://localhost/web-Experts/public/salesRep/fill_home',{

        })
        .then(response => response.json())
        .then(data=>{

          for (i = 0; i < data.length; i++) {
                
                        orders_table.innerHTML += `

                            <tr >
                               
                                
                                <td><a href="../salesRep/product_list?route_id=${data[i]['route_id']}">${data[i]['route_name']}</a></td>
                                <td><a href="../salesRep/product_list?route_id=${data[i]['cus_id']}">${data[i]['shop_name']}</a></td>
                                
                                
                            
                  
                            </tr>
                        
                        `;
                        
                    }
              console.log(data);
        });
      }
      fill_table();
    </script>

</body>

</html>