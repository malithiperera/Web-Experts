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
  <link rel="stylesheet" href="../../public/styles/view_profileEdit.css">

  
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



</head>

<body>
  <div class="sidebar">
    <div class="logo-details">

      <div class="logo_name">Himalee Dairy Products</div>
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
      <?php  require 'view_headertype2.php'; ?>
    </div>
    

  <div class="pro-container">
    <div class="pro-sub">
    <div class="row">
        <div class="prof-img">
          <img src="../../public/images/password.jpg" id="photo-pic">
          <div class="edit-button">
        <label for="reset" class="pencil">
              <i class="fas fa-user-edit"></i>
              <input id="reset" type="file" accept="Image/">
            </label>

          </div>
        </div>
      
      </div>

      <div class="pro-data">
          <div class="data-bio"><input type="text " value="Malithi Perera" id="name" readonly></div>
          <div class="data-bio"><input type="text " value="malithiperera@gmail.com" id="email" readonly><a href="#" onclick="edit_info(email)"><i class="fas fa-pen"></i></a></div>
          <div class="data-bio"> <input type="text " value="07891029" id="tele" readonly><a href="#" id="edit-tele" onclick="edit_info(tele)"><i class="fas fa-pen"></i></a></div>
          <div class="data-bio"><input type="text " value="Kandy" id="address" readonly><a href="#" onclick="edit_info(address)"><i class="fas fa-pen"></i></a></div>
          <div class="data-bio"><input type="text " value="98789091892v" id="nic" readonly><a href="#" onclick="edit_info(nic)"><i class="fas fa-pen"></i></a></div>

          <div class="change-pass">
              <button id="change-pass-but" onclick="change_password()">Change password</button>
          </div>
          <div class="save-changes">
          <button id="save-change" onclick="save_changes()">save changes</button>
      </div>


          <div class="pop-up-password" id="pop_up_password">
              <div class="current-pass">
                  <input type="password" placeholder="Enter current password" id="old_pass">
              </div>
              <div class="new-pass">
                  <input type="password" placeholder="Enetr new password" id="new-pass">
              </div>
              <div class="confirm-pass">
                  <input type="password" placeholder="Confirm password" onkeyup="password_updates()" id="new-con-pass">
                  <br>

                  <span id="tool-tip"></span>
              </div>
              <div class="submit">
                  <button id="save-pass" onclick="save_pass()">save</button>
                  <button id="close-pass" onclick="close_pass()">Close</button>
              </div>
          </div>
      </div>
      </div>
      </div>  

      <div class="pop-up-profile">
<?php require 'view_successfull_pop-up.php' ;?>
      </div>
    </section>
   

  </section>

  <script src="../../public/java script/side_bar.js"></script>
  <script src="../../public/java script/view_profile_edit.js"></script>


 
</body>

</html>