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

    <div class="sidebar">
        <div class="logo-details">

            <div class="logo_name">Himalee Dairy Product</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
         
            <li>
                <a href="../customer/home">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
            <a href="#" onclick="popup_message('.popup')">
                    <i class='bx bxs-cart-add'></i>
                    <span class="links_name">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>

            <li>
            <a href="#" onclick="popup_message('.popup')">
                    <i class='bx bx-line-chart'></i>
                    <span class="links_name">Customers</span>
                </a>
                <span class="tooltip">Customers</span>
            </li>
            <li>
            <a href="#" onclick="popup_message('.search_salesrep')">
                    <i class="fas fa-ice-cream"></i>
                    <span class="links_name">Sales Rep</span>
                </a>
                <span class="tooltip">Sales Rep</span>
            </li>
            <li>
            <a href="#" onclick="popup_message('.select_report')">
                    <i class='bx bx-bell'></i>
                    <span class="links_name">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>
            <li>
            <a href="../admin/add_user">
                    <i class="far fa-user-circle"></i>
                    <span class="links_name">Add User</span>
                </a>
                <span class="tooltip">Add User</span>
            </li>
            <li>
            <li>
            <a href="#" onclick="popup_message('.removeuser')"></i>
                    <span class="links_name">Remove User</span>
                </a>
                <span class="tooltip">Remove User</span>
            </li>
            <li>
            <li>
            <li>
            <a href="#" onclick="popup_message('.routes')"><i>

            </i>
                    <span class="links_name">Routes</span>
                </a>
                <span class="tooltip">Routes</span>
            </li>
            <li>
            <li>
            <a href="../admin/notification">
                    <i class="far fa-user-circle"></i>
                    <span class="links_name">Notificationr</span>
                </a>
                <span class="tooltip">Notification</span>
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
    <?php  require "_1_view_adminHome.php" ; ?>

    
    </section>



    



    <script>
        

        
    </script>

    <script src="../../public/java script/side_bar.js"></script>
</body>

</html>