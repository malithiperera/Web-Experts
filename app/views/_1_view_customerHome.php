<?php session_start();

if (!isset($_SESSION['username'])) {
  header("Location:http://localhost/web-Experts/public/login/index");
}

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Customer Home </title>
  <link rel="stylesheet" href="../../public/styles/view_customer_Home.css">

  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <style>
    .field {
      display: flex;
      flex-direction: column;
    }
  </style>

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
        <a href="../customer/view_report">
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
    <section class="cards-section">

      <div class="top">
        <div class="card-1">
          <p><i class="fas fa-user-tie"></i><br>Customer Id</p>
          <p id="top-detail-1"><?php echo $_SESSION['userid'];  ?></p>
        </div>
        <div class="card-1">
          <p><i class="fas fa-map-marker"></i><br>Route</p>
          <p id="top-detail-1"><span id=route></span></p>
        </div>
        <div class="card-1">
          <p><i class="fas fa-user-tie"></i><br>Sales Rep</p>
          <p id="top-detail-1"><span id=rep></span></p>
        </div>
      </div>
      <div class="cards">
        <div class="card">
          <p><i class="fas fa-ice-cream"></i><br>KINDS OF PRODUCTS</p>
          <p id="top-detail"><span id='pro'>10</span></p>
        </div>
        <div class="card">
          <p><i class="fas fa-shopping-cart"></i><br>Pending deliveries</p>
          <p id="top-detail"><span id='del'>10</span></p>
        </div>
        <div class="card">
          <p><i class="fas fa-exclamation-circle"></i><br>Overdue Payment</p>
          <p id="top-detail"><span id='del'>10</span></p>
        </div>
        <div class="card">
          <p><i class="fas fa-money-check"></i><br>Pending Cheque</p>
          <p id="top-detail">10</p>
        </div>
        <div class="card">
          <p><i class="fas fa-money-bill-alt"></i><br>Pending Payments</p>
          <p id="top-detail"><span id='pen_pay'>10</span></p>
        </div>


      </div>
    </section>

    <section class="detail">
      <div class="left">


        <div class="discount">
          <h3>New discount Prodcuts</h3>


          <div class="item">
            <p>H201 Ice cream 80g-10% </p>
            <a href="">View Product</a>
          </div>
          <div class="item">
            <p>H201 Ice cream 80g-10% </p>
            <a href="">View Product</a>
          </div>
          <div class="item">
            <p>H201 Ice cream 80g-10% </p>
            <a href="">View Product</a>
          </div>
          <div class="item">
            <p>H201 Ice cream 80g-10% </p>
            <a href="">View Product</a>
          </div>
          <div class="item">
            <p>H201 Ice cream 80g-10% </p>
            <a href="">View Product</a>
          </div>
          <div class="graph">
            <h3>Selling Products</h3>

            <div id="barchart_values" style="width: 600px; height: 500px;"></div>
          </div>

        </div>
      </div>
      <div class="right">

        <div class="confirm">
          <h2>Confirmations</h2>
          <br>

          <div class="content">
            <a href="">
              <p>Order 1</p>
            </a>
          </div>

          <button>Confirm</button>

        </div>

        <div class="orders">

          <h2>Pending Orders</h2>



          <div class="field">
            <!-- <div class="order-no">
              <label for="">Order Id:</label><input type="text" id=onum readonly>
              <br>
              <label for="">Order Date:</label><input type="text" id=o_date readonly>
              <br>
              <label for="">Amount:</label><input type="text" id=amount readonly>
            </div>
            <div class="content">
              <a href="../customer/view_orders" class="order_view" id="order_view">view</a>
            </div> -->


          </div>


        </div>

        <div class="payment">
          <h2>Due Payment</h2>



          <div class="field">
            <div class="order-no">
              <p class="onum">Order Id:002</p>
              <p class="onum">Delivery Id:008</p>
              <p class="date">Date:2020.10.03</p>
            </div>
            <div class="content">
              <a href="">view</a>
            </div>
          </div>


          <div class="field"><button onclick=pop_func() class="show">Show more</button>
          </div>


        </div>

    </section>


  </section>

  <div class="pop-up">
    <div class="order-pop">
      <h3>Due Payments</h3>
      <br>

      <table class="Payments">
        <tr>
          <th>Order Id</th>
          <th>Deliver ID</th>
          <th>Due Date</th>
          <th>Amount</th>
          <th>Pay Now</th>
        </tr>
        <tr>
          <td>001</td>
          <td>09.10.2021</td>
          <td>09.10.2021</td>
          <td id="order_id">12000</td>
          <td><button type="submit" id="payhere-payment"><i class="fas fa-credit-card"></button></td>


        </tr>
      </table>
    </div>

  </div>

  <script src="../../public/java script/view_customer_Home.js"></script>

  <script>
    order_id = document.getElementById('onum');
    order_date = document.getElementById('o_date');
    order_amount = document.getElementById('amount');
    order_view = document.getElementById('order_view');
    product = document.getElementById('pro');
    del = document.getElementById('del');
    pen_pay = document.getElementById('pen_pay');
    route = document.getElementById('route');
    rep = document.getElementById('rep');






    function fill_details_home() {
      fetch('http://localhost/web-Experts/public/customer/get_details_home')
        .then(response => response.json())
        .then(data => {

          order_id.value = data[0]['order_id'];
          order_date.value = data[0]['date'];
          amount.value = data[0]['amount'];
          order_view.value = data[0]['order_id'];
        });


    }

    fill_details_home();




    function load_cards() {

      fetch('http://localhost/web-Experts/public/customer/load_card')
        .then(response => response.json())
        .then(data => {
          console.log(data);
          product.innerHTML = data[0][0]['count_products'];
          del.innerHTML = data[0][1]['pending_orders'];
          pen_pay.innerHTML = data[0][2]['count_deliver'];
          route.innerHTML = data[0][3]['routes'];
          rep.innerHTML = data[0][4]['rep_name'];


        });
    }

    load_cards();
  </script>




  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", {
          role: "style"
        }],
        ["Ice Cream", 8.94, "#32a852"],
        ["Yoghurts", 10.49, "#31aab5"],
        ["Curd", 19.30, "#e6b815"],
        ["Fresh-Milk", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
        {
          calc: "stringify",
          sourceColumn: 1,
          type: "string",
          role: "annotation"
        },
        2
      ]);

      var options = {
        title: "Product Buying Summary",
        width: 600,
        height: 400,
        bar: {
          groupWidth: "95%"
        },
        legend: {
          position: "none"
        },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
    }
  </script>

  <!-- script for pending orders -->
  <script>
    let field = document.querySelector('.field');

    function get_pending_orders() {
      var user_id = '<?php echo $_SESSION['userid']; ?>';
      let data_set = {
        user_id: user_id
      }

      fetch('http://localhost/web-Experts/public/customer/get_pending_orders', {
          method: 'POST',

          headers: {
            'Content-Type': 'application/json'

          },

          body: JSON.stringify(data_set)
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);
          for (i = 0; i < data.length; i++) {

            field.innerHTML += `
            
            <table class="pending_order_tabel">
              <tr>
                <td>
                  <table>
                    <tr><td>Order ID : <br>${data[i]['order_id']}</td></tr>
                    <tr><td>Order Date : <br>${data[i]['date']}</td></tr>
                    <tr><td>Amount : <br>${data[i]['amount']}</td></tr>
                  </table>
                </td>
                <td><button onclick="location.href = '../customer/view_orders?order_id=${data[i]['order_id']}&cus_id=${data[i]['cus_id']}&route_id=${data[i]['route_id']}';">view</button></td>
              </tr>
            </table>
            
            `;

          }
        });

    }
    get_pending_orders();
  </script>

</body>

</html>