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
  
   <div class="sidebar">
    <div class="logo-details">
      
        <div class="logo_name">Himalee Dairy Product</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="../salesRep/home">
              <i class='bx bx-home' ></i>
              <span class="links_name">Home</span>
            </a>
             <span class="tooltip">Home</span>
          </li>
    
      <li>
       <a href="../orders/create_bill">
        
        <i class='bx bxs-cart-add'></i>
         <span class="links_name">Place Order</span>
       </a>
       <span class="tooltip">Place Order</span>
     </li>
     <li>
     <a href="../salesRep/returns">
       <i class='bx bx-line-chart'></i>
         <span class="links_name">Returns</span>
       </a>
       <span class="tooltip">Returns</span>
     </li>
     <li>
     <a href="../salesRep/cashPayment">
        <i class='bx bx-bell'></i>
         <span class="links_name">Cash Payment</span>
       </a>
       <span class="tooltip">Cash Payment</span>
     </li>
     <li>
     <a href="../salesRep/chequePayment">
        <i class='bx bx-heart' ></i>
        <span class="links_name">Cheque Payment</span>
      </a>
      <span class="tooltip">Cheque Payment</span>
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
            <div class="cards">
              <div class="card">
                <p><br>Customer ID</p>
                <p id="result">C1025</p>
              </div>
              <div class="card">
                <p><br>Route ID</p>
                <p id="result">103</p>
            </div>
              <div class="card" >
                <p><br>Status</p>
                <p id="result">Active</p>
            </div>
            <div class="card">
                <p><br>Credit Period</p>
                <p id="result">30 days</p>
            </div>
            
            </div>
     </section>
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
        <tbody>
        <tr>
            
            <td >14501</td>
            <td>2021.01.17</td>
            <th>15000</th>
            
        </tr>
        
        <tr>
          <td >23571</td>
          <td>2021.02.14</td>
          <th>25000</th>
          
      </tr>
      
      <tr>
        <td >27121</td>
        <td>2021.03.07</td>
        <th>17000</th>
    </tr>
    
    <tr>
      <td>29261</td>
      <td>2021.04.16</td>
      <th>15300</th>
  </tr>
 
  <tr>
    <td>32561</td>
    <td>2021.05.20</td>
    <th>12000</th>
</tr>

<tr>
  <td>33256</td>
  <td>2021.06.26</td>
  <th>22000</th>
</tr>

        <tbody>
    </table>
</div>
<h2>DELIVERED</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Amount</th>
            
        </tr>
        </thead>
        <tbody>
        <tr>
            
            <td >10256</td>
            <td>2020.05.23</td>
            <th>15000</th>
            
        </tr>
        
        <tr>
          <td >10456</td>
          <td>2020.06.12</td>
          <th>25000</th>
          
      </tr>
      
      <tr>
        <td >11654</td>
        <td>2020.06.21</td>
        <th>17000</th>
    </tr>
    
    <tr>
      <td>11945</td>
      <td>2020.07.13</td>
      <th>18000</th>
  </tr>
 
  <tr>
    <td>12564</td>
    <td>2020.08.03</td>
    <th>12000</th>
</tr>

<tr>
  <td>12997</td>
  <td>2020.09.16</td>
  <th>22000</th>
</tr>

        <tbody>
    </table>
</div>

  
<script src="../../public/java script/view_rep_Home.js"></script>
  

</body>
</html>