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



    nav ul li a .open{
     display: none;

    }
  </style>

</head>

<body>
  <div class="sidebar">
    <div class="logo-details">

      <div class="logo_name">H</div>
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
        <a href="../customer/viewreport">
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
        <a href="../customer/send_request">
        <i class="fas fa-comment-dollar"></i>
          <span class="links_name">Credit Request</span>
        </a>
        <span class="tooltip">Credit Request</span>
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
      <?php require 'view_headertype2.php'; ?>
    </div>
    <section class="cards-section">

      <div class="top">
        <div class="card-1">
          <p><i class="fas fa-user-tie"></i><br>Customer Id</p>
          <p id="top-detail-1"><?php echo $_SESSION['userid'];  ?></p>
          <p id="top-detail-1"><span id='shop'></span></p>
        </div>
        <div class="card-1">
          <p><i class="fas fa-map-marker"></i><br>Route</p>
          <p id="top-detail-1"><span id=route></span></p>
          <p id="top-detail-1"><span id=route>Kakirawa West</span></p>

        </div>
        <div class="card-1">
          <p><i class="fas fa-user-tie"></i><br>Sales Rep</p>
          <p id="top-detail-1"><span id=rep></span></p>
          <p id="top-detail-1"><span id="">0717890172</span></p>
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
          <p id="top-detail"><span id='del'>0</span></p>
        </div>
        <div class="card">
          <p><i class="fas fa-money-check"></i><br>Pending Cheque</p>
          <p id="top-detail">0</p>
        </div>
        <div class="card">
          <p><i class="fas fa-money-bill-alt"></i><br>Pending Payments</p>
          <p id="top-detail"><span id='pen_pay'>1</span></p>
        </div>


      </div>
    </section>

    <section class="detail">
      <div class="left">


        <div class="discount">
          <h3 id="dis-head">New discount Prodcuts</h3>
          <table class="dis-table">
            <tbody class="dis-pro">


            </tbody>


          </table>


          <h3>Selling Products</h3> -->

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
          <div class="button-confirm"> <button id="payhere-payment">Confirm</button>
            <button id="view-del">View</button>
          </div>


        </div>

        <div class="orders">

          <h2>Pending Orders</h2>



          <div class="field">



          </div>


        </div>

        <div class="payment">
          <h2>Due Payment</h2>



          <div class="field-name">

          </div>



        </div>


      </div>

    </section>
    <div class="pop-up-report" id="pop-up-report">
      <?php require 'view_all_report_popup.php'; ?>
    </div>

  </section>

  <script>
    const myslide = document.querySelectorAll('.myslide'),
      dot = document.querySelectorAll('.dot');
    let counter = 1;
    slidefun(counter);

    let timer = setInterval(autoSlide, 8000);

    function autoSlide() {
      counter += 1;
      slidefun(counter);
    }

    function plusSlides(n) {
      counter += n;
      slidefun(counter);
      resetTimer();
    }

    function currentSlide(n) {
      counter = n;
      slidefun(counter);
      resetTimer();
    }

    function resetTimer() {
      clearInterval(timer);
      timer = setInterval(autoSlide, 8000);
    }

    function slidefun(n) {

      let i;
      for (i = 0; i < myslide.length; i++) {
        myslide[i].style.display = "none";
      }
      for (i = 0; i < dot.length; i++) {
        dot[i].className = dot[i].className.replace(' active', '');
      }
      if (n > myslide.length) {
        counter = 1;
      }
      if (n < 1) {
        counter = myslide.length;
      }
      myslide[counter - 1].style.display = "block";
      dot[counter - 1].className += " active";
    }
  </script>



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
    shop = document.getElementById('shop');






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



    //load cards 
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
          shop.innerHTML = data[0][5]['shop_name'];


        });
    }

    load_cards();



    //discounts
    function discounts() {
      dis_pro = document.querySelector('.dis-pro');

      fetch('http://localhost/web-Experts/public/customer/discounts')
        .then(response => response.json())
        .then(data => {
          console.log(data);
          let item = document.querySelector('.item');
          for (i = 0; i < data.length; i++) {
            let new_price = data[i]['price'] * (100 - data[i]['discount']) / 100;
            dis_pro.innerHTML += `<tr class="pro-list">
              
              <td>${data[i]['product_name']}</td>
              <td>${data[i]['description']}</td>
              <td class="dis">${data[i]['discount']}%</td>
              <td class="old-price">RS.${data[i]['price']}</td>
              <td class="new-price">RS.${new_price}<td>
            </tr>`;



          }

        });
    }
    discounts();
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
               
                    <tr><td><span>Order ID :</span>${data[i]['order_id']}</td></tr>
                    <tr><td><span>Order Date :</span>${data[i]['date']}</td></tr>
                    <tr><td><span>Amount :</span>RS.${data[i]['amount']}</td></tr>
                
                </td>
                <td><button  onclick="location.href = '../customer/view_orders?order_id=${data[i]['order_id']}&cus_id=${data[i]['cus_id']}&route_id=${data[i]['route_id']}';"><i class="fas fa-eye"></i>view</button></td>
                
              </tr>+
            </table>
            
            `;

          }
        });

    }
    get_pending_orders();

    function get_deliveries() {
      let field_name = document.querySelector('.field-name');


      fetch('http://localhost/web-Experts/public/customer/get_deliveries')
        .then(response => response.json())
        .then(data => {
          console.log(data);
          for (i = 0; i < data.length; i++) {

            field_name.innerHTML += `

<table class="pending_deliveries">
  <tr>
    <td>
      
        <tr><td><span>Delivery ID :</span>${data[i]['delivery_id']}</td></tr>
        <tr><td><span>Date       :</span>${data[i]['date']}</td></tr>
        <tr><td><span>Order ID    :</span>${data[i]['order_id']}</td></tr>
        <tr><td><span>Amount      : </span>RS.${data[i]['amount']}</td></tr>
      
    </td>
    <td><button onclick="location.href = '../customer/view_orders_deliver?order_id=${data[i]['order_id']}&cus_id=${data[i]['cus_id']}&route_id=${data[i]['cus_id']}';" id="view-del"><i class="fas fa-eye"></i>view</button>
    
    <button id="payhere-payment" onclick='pay_here(${data[i]['delivery_id']})'><i class="fab fa-cc-amazon-pay"></i>Pay Now</button></td>
    
  </tr>
</table>

`;

          }


        });





    }

    get_deliveries();
    payhere.onCompleted = function onCompleted(orderId) {
      console.log("Payment completed. OrderID:" + orderId);
      //Note: validate the payment and show success or failure page to the customer
    };

    // Called when user closes the payment without completing
    payhere.onDismissed = function onDismissed() {
      //Note: Prompt user to pay again or show an error page
      console.log("Payment dismissed");
    };

    // Called when error happens when initializing payment such as invalid parameters
    payhere.onError = function onError(error) {
      // Note: show an error page
      console.log("Error:" + error);
    };

    // Put the payment variables here
    var payment = {
      "sandbox": true,
      "merchant_id": "1218797", // Replace your Merchant ID
      "return_url": undefined, // Important
      "cancel_url": undefined, // Important
      "notify_url": "http://sample.com/notify",
      "order_id": "ItemNo12345",
      "items": "Door bell wireles",
      "amount": "1000.00",
      "currency": "LKR",
      "first_name": "Saman",
      "last_name": "Perera",
      "email": "samanp@gmail.com",
      "phone": "0771234567",
      "address": "No.1, Galle Road",
      "city": "Colombo",
      "country": "Sri Lanka",
      "delivery_address": "No. 46, Galle road, Kalutara South",
      "delivery_city": "Kalutara",
      "delivery_country": "Sri Lanka",
      "custom_1": "",
      "custom_2": ""
    };

    //Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    //     payhere.startPayment(payment);
    // };


    function pay_here() {
      // document.getElementById('payhere-payment').onclick = function (e) {
      payhere.startPayment(payment);

    }

    pop_up_div = document.getElementById('pop-up-report');
    card = document.querySelector('.cards-section');
    detail = document.querySelector('.detail');

    function pop_up_report() {


      pop_up_div.style.visibility = "visible";

      card.style.opacity = "50%";
      detail.style.opacity = "50%";



    }
  </script>

  <script src="../../public/java script/view_customer_Home.js"></script>
</body>

</html>