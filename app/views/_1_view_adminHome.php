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
    <style>
        .sidebar {
            z-index: 100000;
        }
        .header{
            position: relative;
            top: 0;
        }
      
    </style>

</head>

<body>
    <div class="main_container">
        <div class="sidebar">
            <div class="logo-details">

                <div class="logo_name">Himalee Dairy Product</div>
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav-list">

                <li>
                    <a href="../admin/renderAdminHome">
                        <i class='bx bx-home'></i>
                        <span class="links_name">Home</span>
                    </a>
                    <span class="tooltip">Home</span>
                </li>

                <li>
                    <a href="../login/adminHome?viewname=_1_view_stockmanagerHome">
                        <i class="fas fa-luggage-cart fa-lg"></i>
                        <span class="links_name">Products</span>
                    </a>
                    <span class="tooltip">Products</span>
                </li>

                <li>
                    <a href="#" onclick="popup_message('.popup')">
                        <i class="fas fa-landmark fa-lg"></i>
                        <span class="links_name">Customers</span>
                    </a>
                    <span class="tooltip">Customers</span>
                </li>
                <li>
                    <a href="#" onclick="popup_message('.search_salesrep')">
                        <i class="fas fa-user-tie fa-lg"></i>
                        <span class="links_name">Sales Rep</span>
                    </a>
                    <span class="tooltip">Sales Rep</span>
                </li>
                <li>
                    <a href="#" onclick="popup_message('.select_report')">
                        <i class="fas fa-chart-line fa-lg"></i>
                        <span class="links_name">Reports</span>
                    </a>
                    <span class="tooltip">Reports</span>
                </li>
                <li>
                    <a href="../admin/add_user">
                        <i class="fas fa-user-plus fa-lg"></i>
                        <span class="links_name">Add User</span>
                    </a>
                    <span class="tooltip">Add User</span>
                </li>
                <li>
                <li>
                    <a href="#" onclick="remove_user_func()">
                        <i class="fas fa-user-minus fa-lg"></i>
                        <span class="links_name">Remove User</span>
                    </a>
                    <span class="tooltip">Remove User</span>
                </li>
                <li>
                <li>
                <li>
                    <a href="http://localhost/web-Experts/public/admin/route_file">
                        <i class="fas fa-map-marker-alt fa-lg"></i>
                        <span class="links_name">Routes</span>
                    </a>
                    <span class="tooltip">Routes</span>
                </li>
                <li>
                <li>
                    <a href="../admin/notification">
                        <i class="fas fa-bell fa-lg"></i>
                        <span class="links_name">Notification</span>
                    </a>
                    <span class="tooltip">Notification</span>
                </li>
                <li>
                    <a href="logout">
                        <i class="fas fa-user-alt fa-lg"></i>
                        <span class="links_name">profile</span>
                    </a>
                    <span class="tooltip">profile</span>
                </li>
                <li>
                    <a href="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="links_name">Logout</span>
                    </a>
                    <span class="tooltip">Logout</span>
                </li>
                <!-- <li class="profile">
                <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_job">
                        <div class="name"></div>
                        <div class="job">Admin</div>
                    </div>
                </div>
                <i class="fas fa-store" id="log_out"></i>
            </li> -->
            </ul>
        </div>

        <section class="home-section">
            <div class="header">
                <?php require 'view_headertype2.php'; ?>
            </div>
            <?php require "admin_Home.php"; ?>


        </section>
    </div>








    <script>
        function popup_message(popup_message) {

            popup_message = document.querySelector(popup_message);
            container = document.querySelector('.container');
            header = document.querySelector('.header');

            popup_message.style.visibility = "visible";
            sidebar.style.opacity = "30%";
            container.style.opacity = "30%";
            header.style.opacity = "30%";

            window.onclick = function(event) {
                if (event.target == popup_message) {
                    popup_message.style.visibility = "hidden";
                    sidebar.style.opacity = "100%";
                    container.style.opacity = "100%";
                    header.style.opacity = "100%";
                }
            }

        }


        const back_to_home = () => {
            document.querySelector('.routes').style.visibility = "hidden";
            sidebar.style.opacity = "100%";
            container.style.opacity = "100%";
            header.style.opacity = "100%";
        }
    </script>

    <script src="../../public/java script/side_bar.js"></script>

    <script>
        function remove_user_func() {
            let user_id = "<?php echo $_SESSION['userid'] ?>";

            fetch('http://localhost/web-Experts/public/admin/check_admin', {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(user_id)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data['level']);
                    if (data['level'] == "junior") {
                        console.log("you have not access to the function");
                    } else {
                        popup_message('.removeuser');
                    }

                });


        }
    </script>
</body>

</html>