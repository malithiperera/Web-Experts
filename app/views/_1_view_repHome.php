<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="../../public/styles/view_rep_Home.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
   <div class="sidebar">
    <div class="logo-details">
      
        <div class="logo_name">Himalee Dairy Products</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="../salesRep/customer_registration">
          <i class='fas fa-user-plus fa-lg' ></i>
          <span class="links_name">Customer Registration</span>
        </a>
         <span class="tooltip">Customer Registration</span>
      </li>
      <li>
      <a href="#"> 
          <i class='bx bx-user open-button' onclick="openForm()" ></i>
          <span class="links_name " >Customer Profile</span>
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
       <a href="../orders/create_bill">
        
        <i class='bx bxs-cart-add'></i>
         <span class="links_name">Place Order</span>
       </a>
       <span class="tooltip">Place Order</span>
     </li>
     <li>
       <a href="../salesRep/view_report">
       <i class='bx bx-line-chart'></i>
         <span class="links_name">Reports</span>
       </a>
       <!-- <span class="tooltip">Reports</span> -->
     </li>
     <li>
       <a href="../customer/view_notification">
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
            <div class="cards">
              <div class="card">
                <p><i class="fas fa-ice-cream"></i><br>Kinds of Products</p>
                <p>10</p>
              </div>
              <div class="card" >
                <p><i class="fas fa-shopping-cart"></i><br>Pending deliveries</p>
                <p>1</p>
            </div>
            <div class="card">
                <p><i class="fas fa-users"></i><br>No of Customers</p>
                <p>10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-map-marker-alt"></i><br>No of Routes</p>
                <p>10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-trophy"></i><br>Target</p>
                <p>10</p>
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
        <tbody>
        <tr>
            
            <td rowspan="5">Kurunegala</td>
            <td>Laugfs Supermarket</td>
            
        </tr>
        <tr>
            
            <td>Cargills Food City</td>
            
        </tr>
        <tr>
            
            <td>Madeena Family Mart</td>
            
        </tr>
        <tr>
            
            <td>Royal Grocery</td>
            
        </tr>
        <tr>
            
            <td>Samudra Super Market</td>
            
        </tr>
        <tr>
          <td rowspan="5">Anuradhapura</td>
          <td>Crown Super</td>
          
      </tr>
      <tr>
          
          <td>Supipi Supermarket</td>
          
      </tr>
      <tr>
          
          <td>Alankulama Family Super</td>
          
      </tr>
      <tr>
          
          <td>Egodagama Stores</td>
          
      </tr>
      <tr>
          
          <td>Food Market</td>
          
      </tr>
      <tr>
        <td rowspan="5">Narammala</td>
        <td>Sarasavi Stores</td>
        
    </tr>
    <tr>
        
        <td>Batepola Super</td>
        
    </tr>
    <tr>
        
        <td>Wasantha Stores</td>
        
    </tr>
    <tr>
        
        <td>Aananda Stores</td>
        
    </tr>
    <tr>
        
        <td>Maalinda Stores</td>
        
    </tr>
    <tr>
      <td rowspan="5">Kuliyapitiya</td>
      <td>Gama Grocery</td>
      
  </tr>
  <tr>
      
      <td>Sagara Super</td>
      
  </tr>
  <tr>
      
      <td>Amana Bake House</td>
      
  </tr>
  <tr>
      
      <td>Gothama Stores</td>
      
  </tr>
  <tr>
      
      <td>Gihan Super</td>
      
  </tr>
  <tr>
    <td rowspan="5">Dambadeniya</td>
    <td>Indusara Stores</td>
    
</tr>
<tr>
    
    <td>Thilak Super</td>
    
</tr>
<tr>
    
    <td>Capri Restaurant</td>
    
</tr>
<tr>
    
    <td>Yohan Super</td>
    
</tr>
<tr>
    
    <td>Cafe Amakie</td>
    
</tr>
<tr>
  <td rowspan="5">Giriulla</td>
  <td>Rathnayake Super</td>
  
</tr>
<tr>
  
  <td>Induwara super</td>
  
</tr>
<tr>
  
  <td>Mr. Yummy Food Centre</td>
  
</tr>
<tr>
  
  <td>Jayawardhana Supermarkets</td>
  
</tr>
<tr>
  
  <td>Sithumini Stores</td>
  
</tr>
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

</body>
</html>
