<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/web-Experts/public/login/index");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            color: white;
        }

        body {
            /* opacity:50%; */
        }

        /* scroll bar */
        html::-webkit-scrollbar {
            width: .8rem;

        }

        html::-webkit-scrollbar-track {
            background: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background: #184A78;
            border-radius: 2rem;
        }

        .sidebar {
            position: fixed;
            width: 80px;
            height: 100vh;
            background-color: #184A78;
            /* opacity:50%; */
        }

        .sidebar>p {
            margin-left: 10px;
            letter-spacing: 5px;
            visibility: hidden;
        }

        .sidebar>i {
            position: absolute;
            top: 5px;
            right: 35px;
        }

        .fa-align-right {
            visibility: hidden;
        }

        .icons {
            position: absolute;
            top: 108px;
            display: flex;
            flex-direction: column;
        }

        .icons a {
            margin-bottom: 40px;
            margin-left: 20px;
        }

        .links {
            position: absolute;
            top: 100px;
            display: flex;
            flex-direction: column;
            visibility: hidden;
            width: 250px;
        }

        .links a {
            margin-bottom: 30px;
            margin-left: 80px;
            text-decoration: none;
            width: 130px;
            padding: 5px;
            border-radius: 10px;
            padding-left: 15px;
        }

        .links a:hover {
            color: #1d1b31;
            background-color: white;
        }

        .sidebar_footer {
            position: absolute;
            bottom: 0;
            background-color: #1d1b31;
            width: 100%;
            height: 60px;
        }

        .fa-building {
            position: absolute;
            top: 20px;
            right: 10px;
        }

        .footerIcon p {
            margin-top: 20px;
            margin-left: 10px;
            visibility: hidden;
        }

        .container {
            position: relative;
            left: 80px;
            width: calc(100% - 80px);
            display: flex;
            flex-direction: column;
            /* opacity:50%; */
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            text-align: center;
            margin-top: 30px;
        }

        .card {
            flex: 2 0 150px;
            width: 200px;
            height: 100px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            margin-right: 10px;
            margin-left: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .card>p {
            color: black;
            margin-top: 10px;
        }

        .subcontainer1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-left: 20px;
        }

        .charts {
            width: 900px;
            height: 1000px;
            margin-left: 100px;
            margin-top: 40px;
        }

        .subcontainer2 {
            display: flex;
            flex-direction: column;
        }

        .reps {
            width: 300px;
            height: 300px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            margin-right: 20px;
            margin-bottom: 10px;
            padding-bottom: 20px;
        }

        .reps>p {
            color: black;
            margin-left: 20px;
            text-align: center;
        }

        .customers {
            width: 300px;
            height: 300px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            padding-bottom: 20px;
        }

        .customers>p {
            color: black;
            margin-left: 20px;
            text-align: center;
        }

        .popup {
            position: fixed;
            top: 70px;
            width: 100%;
            display: flex;
            justify-content: center;
            visibility: hidden;
        }

        .search_customer {
            width: 400px;
            height: 300px;
            background-color: white;
            border: 1px solid #184A78;
            border-radius: 10px;
        }

        .search_bar input {
            position: relative;
            top: 20px;
            left: 68px;
            width: 250px;
            height: 30px;
            border-radius: 10px;
            padding-left: 20px;

            color: #184A78;
        }

        .fa-search {
            position: relative;
            left: 35px;
            top: 23px;
            color: #184A78;
        }

        .search_customer p,
        .search_customer select,
        .search_customer select option {
            color: #184A78;
        }

        .search_customer select {
            width: 100px;
            height: 30px;
        }

        .search_by_route {
            position: relative;
            top: 80px;
            left: 50px;
        }

        .select_route {
            float: left;
            margin-right: 70px;
        }

        .search_by_route a {
            position: relative;
            border: 1px solid #184A78;
            border-radius: 18px;
            top: 30px;
            left: 120px;
            color: #184A78;
            text-decoration: none;
            padding: 8px;
        }

        .search_by_route a:hover {
            background-color: #184A78;
            color: white;
        }

        .add_new_cus a {
            position: relative;
            top: 150px;
            left: 130px;
            text-decoration: none;
            color: #184A78;
        }

        .card i {
            color: black;
        }

        #count {
            color: rgb(45, 211, 45);
            font-size: 25px;
            font-weight: 700;
            margin-top: -10px;

        }

        h3 {
            color: black;
            padding: 10px;
            margin-top: 10px;
            text-align: center;
            text-transform: uppercase;
        }
    </style>
</head>

<body>


    <div class="sidebar">
        <p id="company_name">HIMALEE DAIRY </br>PRODUCTS</p>
        <i class="fas fa-bars fa-lg"></i>
        <i class="fas fa-align-right fa-lg"></i>
        <div class="icons">
            <a href="#"><i class="fas fa-luggage-cart fa-lg"></i></a>
            <a href="#" onclick="popup_message()"><i class="fas fa-landmark fa-lg"></i></a>
            <a href="#"><i class="fas fa-user-tie fa-lg"></i></a>
            <a href="../admin/viewReport"><i class="fas fa-chart-line fa-lg"></i></a>
            <a href="../admin/add_user"><i class="fas fa-user-plus fa-lg"></i></a>
            <a href="../admin/remove_user"><i class="fas fa-user-minus fa-lg"></i></a>
            <a href="../admin/routes"><i class="fas fa-map-marker-alt fa-lg"></i></a>
            <a href="../admin/notification"><i class="fas fa-bell fa-lg"></i></a>
            <a href="../admin/profile"><i class="fas fa-user-alt fa-lg"></i></a>
            <a href="logout"><i class="fas fa-sign-out-alt fa-lg"></i></a>
        </div>

        <div class="links">
            <a href="#">PRODUCTS</a>
            <a href="#" onclick="popup_message()">CUSTOMERS</a>
            <a href="#">SALES REPS</a>
            <a href="../admin/viewReport">REPORTS</a>
            <a href="../admin/add_user">ADD USER</a>
            <a href="../admin/remove_user">REMOVE USER</a>
            <a href="../admin/routes">ROUTES</a>
            <a href="../admin/notification">NOTIFICATION</a>
            <a href="../admin/profile">PROFILE</a>
            <a href="logout">LOG OUT</a>
        </div>
        <div class="sidebar_footer">
            <div class="footerIcon">
                <i class="fas fa-building fa-lg"></i>
                <p class="username"><?php echo $_SESSION['username']; ?></p>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="cards">

            <div class="card">
                <p><i class="fas fa-ice-cream"></i><br>KINDS OF PRODUCTS</p>
                <p id="count">10</p>

            </div>
            <div class="card">
                <p><i class="fas fa-users"></i><br>REGISTERED SALES REPS</p>
                <p id="count">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-store"></i><br>REGISTERED CUSTOMERS</p>
                <p id="count">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-route"></i><br>COVERING ROUTES</p>
                <p id="count">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-file-invoice-dollar"></i><br>PENDING ORDERS</p>
                <p id="count">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-truck"></i><br>OVERDUE DELIVERIES</p>
                <p id="count">10</p>
            </div>

        </div>

        <div class="subcontainer1">
            <div class="charts">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="subcontainer2">
                <div class="reps">
                    <h3>Online Sales Rep</h3>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        echo "
                                <p>sample salesrep</p>
                            ";
                    }

                    ?>
                </div>
                <div class="customers">
                    <h3>Online Customers</h3>
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        echo "
                                 <p>sample salesrep</p>
                              ";
                    }

                    ?>
                </div>
            </div>

        </div>
    </div>

    <div class="popup">

        <div class="search_customer">
            <div class="search_bar">
                <input type="text">
                <i class="fas fa-search fa-lg"></i>
            </div>
            <div class="search_by_route">

                <div class="select_route">
                    <p>Select Route : </p>
                    <select name="cars" id="cars">
                        <option>route 1</option>
                        <option>route 2</option>
                        <option>route 3</option>
                        <option>route 4</option>
                    </select>
                </div>


                <div class="select_customer">
                    <p>Select Customer : </p>
                    <select name="cars" id="cars">
                        <option>customer 1</option>
                        <option>customer 2</option>
                        <option>customer 3</option>
                        <option>customer 4</option>
                    </select>
                </div>

                <a href="../admin/customerProfile">GO...</a>
            </div>
            <div class="add_new_cus">
                <a href="../admin/add_new_cus">Add New Customer</a>
            </div>
        </div>
    </div>





    <!-- scripts for side bar -->
    <script>
        let openbtn = document.querySelector(".fa-bars");
        let closebtn = document.querySelector(".fa-align-right")
        let sidebar = document.querySelector(".sidebar");
        let company_name = document.querySelector("#company_name");
        let links = document.querySelector(".links");
        let username = document.querySelector(".username");
        let container = document.querySelector(".container");

        openbtn.addEventListener("click", function() {

            let widthdiv = 80;
            let opacity = 0;

            var id = setInterval(frame, 10);

            function frame() {
                if (sidebar.style.width == "250px") {
                    var id1 = setInterval(frame1, 10);
                    opacity = 0;

                    function frame1() {
                        if (opacity == 100) {
                            clearInterval(id1);
                        } else {
                            links.style.visibility = "visible";
                            company_name.style.visibility = "visible";
                            username.style.visibility = "visible";
                            opacity = opacity + 10;
                            links.style.opacity = opacity + "%";
                            company_name.style.opacity = opacity + "%";
                            username.style.opacity = opacity + "%";

                        }
                    }
                    clearInterval(id);
                } else {
                    widthdiv = widthdiv + 10;
                    sidebar.style.width = widthdiv + "px";
                    container.style.left = widthdiv + "px";
                    container.style.setProperty('width', 'calc(100% - ' + widthdiv + 'px)');
                }
            }

            openbtn.style.visibility = "hidden";
            closebtn.style.visibility = "visible";
            closebtn.style.right = "5px";
        });

        closebtn.addEventListener("click", function() {
            let widthdiv = 250;
            let opacity = 100;

            var id = setInterval(frame, 20);

            function frame() {
                if (sidebar.style.width == "80px") {
                    clearInterval(id);
                } else {
                    widthdiv = widthdiv - 10;
                    sidebar.style.width = widthdiv + "px";
                    container.style.left = widthdiv + "px";
                    opacity = opacity - 10;
                    company_name.style.opacity = opacity + "%";
                    links.style.opacity = opacity + "%";
                    username.style.opacity = opacity + "%";
                    container.style.setProperty('width', 'calc((100%-250px) - ' + widthdiv + 'px)');
                }
            }

            closebtn.style.visibility = "hidden";
            openbtn.style.visibility = "visible";
        });
    </script>

    <!-- scripts for charts -->
    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['item1', 'item2', 'item3', 'item4', 'item5', 'item6'],
                datasets: [{
                    label: 'best selling items',
                    data: [12, 19, 50, 20, 40, 34],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- script for popup message -->
    <script>
        let popup = document.querySelector(".popup");
        let in_popup = document.querySelector(".search_customer")

        function popup_message() {
            popup.style.visibility = "visible";
            sidebar.style.opacity = "30%";
            container.style.opacity = "30%";
        }


        window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.visibility = "hidden";
                sidebar.style.opacity = "100%";
                container.style.opacity = "100%";
            }
        }
    </script>
    
</body>

</html>