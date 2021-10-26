

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
     <script type="text/javascript">
       google.charts.load('current', {'packages':['corechart']});
       google.charts.setOnLoadCallback(drawChart);
 
       function drawChart() {
         var data = google.visualization.arrayToDataTable([
           ['Year', 'Sales', 'Expenses'],
           ['2004',  1000,      400],
           ['2005',  1170,      460],
           ['2006',  660,       1120],
           ['2007',  1030,      540]
         ]);
 
         var options = {
           title: 'Company Performance',
           curveType: 'function',
           legend: { position: 'bottom' }
         };
 
         var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
 
         chart.draw(data, options);
       }
</script>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      
        <div class="logo_name">Himalee Dairy Product</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="#">
          <i class='bx bx-home' ></i>
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
                <p id="top-detail-1"></p>
              </div>
              <div class="card-1">
                <p><i class="fas fa-map-marker"></i><br>Route</p>
                <p id="top-detail-1">Kakirawa West</p>
              </div>
              <div class="card-1">
                <p><i class="fas fa-user-tie"></i><br>Sales Rep</p>
                <p id="top-detail-1">M.R Perera</p>
              </div>
    </div>
            <div class="cards">
              <div class="card">
                <p><i class="fas fa-ice-cream"></i><br>KINDS OF PRODUCTS</p>
                <p id="top-detail">10</p>
              </div>
              <div class="card" >
                <p><i class="fas fa-shopping-cart"></i><br>Pending deliveries</p>
                <p id="top-detail">1</p>
            </div>
            <div class="card">
                <p><i class="fas fa-exclamation-circle"></i><br>Overdue Payment</p>
                <p id="top-detail">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-money-check"></i><br>Pending Cheque</p>
                <p id="top-detail">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-money-bill-alt"></i><br>Pending Payments</p>
                <p id="top-detail">10</p>
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
             <div class="graph">
           <h3>Sales Summary</h3>
           
           <div id="curve_chart" style="width: 400px; height: 400px"></div>
          </div>

           </div>
         </div>
         <div class="right">

          <div class="confirm">
          <h2>Confirmations</h2>
          <br>
      
          <div class="content">
          <a href=""><p>Order 1</p></a>
           </div>
          
          <button>Confirm</button>
          
           </div>
           
           <div class="orders">

             <h2>Pending Orders</h2>

            
            
            <div class="field">
            <div class="order-no">
           <p class="onum"></p>
           <p class="date"></p>
           </div>
           <div class="content">
           <a href="../customer/view_orders">view</a>
           </div>
           </div>
          
            <div class="field">
             
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
    <td><button type="submit" id="payhere-payment" ><i class="fas fa-credit-card"></button></td>
   
    
  </tr>
</table>
</div>   

</div> 

<script src="../../public/java script/view_customer_Home.js"></script>
<!-- 
<script>



  var order_id=document.getElementById('order_id').innerHTML;
  
  // Called when user completed the payment. It can be a successful payment or failure
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
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1218797",    // Replace your Merchant ID
        "return_url": undefined,     // Important
        "cancel_url": undefined,     // Important
        "notify_url": "http://sample.com/notify",
        "order_id": "ItemNo12345",
        "items": "Door bell wireles",
        "amount": order_id,
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

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    };

</script> -->
  <script>
  



 function fill_details_home() {
          fetch('http://localhost/web-Experts/public/customer/get_details_home')  
                .then(response => response.json())
                .then(data => {
                   console.log(data);
                });

       
        }

        fill_details_home();
</script>
</body>
</html>
