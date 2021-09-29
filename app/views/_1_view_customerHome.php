<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="../../public/styles/view_customer_Home.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
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
       <a href="../customer/place_order">
        
        <i class='bx bxs-cart-add'></i>
         <span class="links_name">Place Order</span>
       </a>
       <span class="tooltip">Place Order</span>
     </li>
     <li>
       <a href="../customer/my_order">
        <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Orders</span>
       </a>
       <span class="tooltip">Orders and payments</span>
     </li>
     <li>
       <a href="../customer/my_order">
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
       <a href="#">
        <i class='bx bx-bell'></i>
         <span class="links_name">Notification</span>
       </a>
       <span class="tooltip">Notification</span>
     </li>
     <li>
       <a href="#">
        <i class='bx bxs-truck' ></i>
         <span class="links_name">Confirmation</span>
       </a>
       <span class="tooltip">Confirmation</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Logout</span>
       </a>
       <span class="tooltip">Logout</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">ABC</div>
             <div class="job">Customer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li>
    </ul>
  </div>

  <section class="home-section">
    <section class="cards-section">
            <div class="cards">
              <div class="card">
                <p><i class="fas fa-ice-cream"></i><br>KINDS OF PRODUCTS</p>
                <p>10</p>
              </div>
              <div class="card" >
                <p><i class="fas fa-shopping-cart"></i><br>Pending deliveries</p>
                <p>1</p>
            </div>
            <div class="card">
                <p><i class="fas fa-exclamation-circle"></i><br>Overdue Payment</p>
                <p>10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-money-check"></i><br>Pending Cheque</p>
                <p>10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-money-bill-alt"></i><br>Pending Payments</p>
                <p>10</p>
            </div>


            </div>
     </section>

       <section class="detail">
         <div class="left">
           <div class="graph">
           <h3>Sales Summary</h3>
           
           <div id="curve_chart" style="width: 400px; height: 400px"></div>
          </div>
           <div class="discount">
             <h3>New discount Prodcuts</h3>
             <div class="item">
              <p>H201 Ice cream 80g-10%</p>
             </div>
             <div class="item">
              <p>H201 Ice cream 80g-10%</p>
             </div>
             <div class="item">
              <p>H201 Ice cream 80g-10%</p>
             </div>
             <div class="item">
              <p>H201 Ice cream 80g-10%</p>
             </div>
             

           </div>
         </div>
         <div class="right">
           <div class="orders">
             <h2>Pending Orders</h2>
             <div class="field">
               <div class="order-no">
              <p class="onum">001</p>
              <p class="date">2019.09.19</p>
              </div>
              <div class="content">
              <a href="">view</a>
              </div>
              </div>
              <div class="field">
                <div class="order-no">
               <p class="onum">001</p>
               <p class="date">2019.09.19</p>
               </div>
               <div class="content">
               <a href="">view</a>
               </div>
               </div>
               <div class="field">
                <div class="order-no">
               <p class="onum">001</p>
               <p class="date">2019.09.19</p>
               </div>
               <div class="content">
               <a href="">view</a>
               </div>
               </div>
               <div class="field"><a href="../customer/my_order">go to page</a></div>
              </div>
             
         <div class="payment">
          <h2>Due Payment</h2>
          <div class="field">
            <div class="order-no">
           <p class="onum">001</p>
           <p class="date"> Due to 2019.09.19</p>
           </div>
           <div class="content">
           <a href="">view</a>
           </div>
           </div>
           <div class="field">
            <div class="order-no">
           <p class="onum">001</p>
           <p class="date"> Due to 2019.09.19</p>
           </div>
           <div class="content">
           <a href="">view</a>
           </div>
           </div>
           <div class="field"><a href="../customer/my_order">go to page</a></div>
         </div>
         
        </div> 
         </section>


  </section>

  
  <script src="../../public/java script/view_customer_Home.js"></script>
  

</body>
</html>
