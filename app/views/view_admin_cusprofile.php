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
    
   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_button.css">
    <!-- <link rel="stylesheet" href="../../public/styles/sketch.css"> -->
    <link rel="stylesheet" href="../../public/styles/sidebar.css">

</head>

<body>

    <div class="sidebar">
        <div class="logo-details">

            <div class="logo_name">Himalee Dairy Product</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">

            <li>
                <a href="#">
                <i class='bx bx-home'></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
           <li>
           
                <a href="#">
                    <i class="fas fa-chart-line"></i>
                    <span class="links_name">View Reports</span>
                </a>
                <span class="tooltip">View Reports</span>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span class="links_name">Send Messege</span>
                </a>
                <span class="tooltip">Send Messege</span>
            </li>
            <li>
                <a href="logout">
                <i class="fas fa-exclamation"></i>
                    <span class="links_name">Hold Customer</span>
                </a>
                <span class="tooltip">Hold Customer</span>
            </li>

            <li class="profile">
                <div class="profile-details">

                    <div class="name_job">
                        <div class="name">M.Bandara</div>
                        <div class="job">Stock Manager</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="header">
            <?php require 'view_headertype2.php'; ?>
        </div>
        <?php require 'view_admin_customerProfile.php'; ?>


    </section>







    <script>























    </script>

    <script src="../../public/java script/side_bar.js"></script>
</body>

</html>