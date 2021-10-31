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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            color: white;
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
            margin-left: -100px;
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
            margin-left: -100px;
        }

        .customers>p {
            color: black;
            margin-left: 20px;
            text-align: center;
        }

        .popup {
            visibility: hidden;
        }

        .removeuser {
            visibility: hidden;
        }

        .search_salesrep {
            visibility: hidden;
        }

        .routes {
            visibility: hidden;
        }

        .charts {
            width: 1300px;
            height: 1000px;
            margin-left: 100px;
            /* display:flex;
            justify-content: space-between; */
            margin-top: 40px;
        }

        .chart-up {
            display: flex;
            /* justify-content: space-between; */

        }


        .sales-overview {
            width: 600px;
            height: 620px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            /* margin-right: 30px; */

        }

        .user-reg {
            width: 600px;
            height: 600px;
            background-color: #fff;
            /* margin-left: -100px; */
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);

        }

        .chart-down {
            display: flex;
            margin-top: 40px;
            justify-content: s;

        }

        .growth {
            width: 600px;
            height:600px;
            background-color: #fff;
            color: black;
            display: flex;
            flex-direction: column;
            margin-right: -50px;
            margin-left: 70px;
            padding: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }
        .growth table{
            margin-left: 20px;
            margin-right: 20px;
        }
        table {
            margin-top: 30px;
        }

        th {

            padding: 5px;
            margin: 5px;

            background-color: #184A78;
            color: #fff;
        }

        td {
            color: black;
            padding: 5px;
            margin: 5px;

        }

        th:nth-child(odd) {
            color: #ffffff;
            background: #4FC3A1;
        }

        tr:nth-child(odd) {
            background: #ccc4c4;
        }


        thead th {
            color: #ffffff;
            background: #4FC3A1;
        }

        .trans {
            width: 620px;
            height: 600px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            margin-left: 70px;

        }

        #columnchart_material {
            margin-left: 50px;
            margin-top: 20px;
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
            <a href="#" onclick="popup_message('.popup')"><i class="fas fa-landmark fa-lg"></i></a>
            <a href="#" onclick="popup_message('.search_salesrep')"><i class="fas fa-user-tie fa-lg"></i></a>
            <a href="../admin/viewReport"><i class="fas fa-chart-line fa-lg"></i></a>
            <a href="../admin/add_user"><i class="fas fa-user-plus fa-lg"></i></a>
            <a href="#" onclick="popup_message('.removeuser')"><i class="fas fa-user-minus fa-lg"></i></a>
            <a href="../admin/routes"><i class="fas fa-map-marker-alt fa-lg"></i></a>
            <a href="#" onclick="popup_message('.routes')"><i class="fas fa-bell fa-lg"></i></a>
            <a href="../admin/profile"><i class="fas fa-user-alt fa-lg"></i></a>
            <a href="logout"><i class="fas fa-sign-out-alt fa-lg"></i></a>
        </div>

        <div class="links">
            <a href="#">PRODUCTS</a>
            <a href="#" onclick="popup_message('.popup')">CUSTOMERS</a>
            <a href="#" onclick="popup_message('.search_salesrep')">SALES REPS</a>
            <a href="../admin/viewReport">REPORTS</a>
            <a href="../admin/add_user">ADD USER</a>
            <a href="#" onclick="popup_message('.removeuser')">REMOVE USER</a>
            <a href="#" onclick="popup_message('.routes')">ROUTES</a>
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
                <p id="count_products">10</p>

            </div>
            <div class="card">
                <p><i class="fas fa-users"></i><br>REGISTERED SALES REPS</p>
                <p id="count_salesreps">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-store"></i><br>REGISTERED CUSTOMERS</p>
                <p id="count_customers">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-route"></i><br>COVERING ROUTES</p>
                <p id="count_routes">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-file-invoice-dollar"></i><br>PENDING ORDERS</p>
                <p id="count_orders">10</p>
            </div>
            <div class="card">
                <p><i class="fas fa-truck"></i><br>OVERDUE DELIVERIES</p>
                <p id="count_deliveries">10</p>
            </div>

        </div>

        <div class="subcontainer1">
            <div class="charts">
                <div class="chart-up">
                    <div class="sales-overview">
                        <h3>Sales Overview</h3>
                        <div id="chart_div" style="width: 500px; height: 500px;"></div>

                    </div>
                    <div class="growth">
                        <h3>Best of Sales Rep</h3>
                        <table>
                            <tr>
                                <th>Sales Rep ID</th>
                                <th>Name</th>
                                <th>Profit</th>
                            </tr>
                            <tr>
                                <td>HR034</td>
                                <td>M.E. Wijekoon</td>
                                <td>190 000</td>
                            </tr>
                            <tr>
                                <td>HR908</td>
                                <td>S.M Rajapaksha</td>
                                <td>150 000</td>
                            </tr>
                            <tr>
                                <td>HR0890</td>
                                <td>N.D.T Kariyawasam</td>
                                <td>130 000</td>
                            </tr>
                            <tr>
                                <td>HR0908</td>
                                <td>K.M Herath</td>
                                <td>127 000</td>
                            </tr>
                            <tr>
                                <td>HR5679</td>
                                <td>Y.T Silve</td>
                                <td>110 000</td>
                            </tr>
                            <tr>
                                <td>HR908</td>
                                <td>S.M Rajapaksha</td>
                                <td>150 000</td>
                            </tr>
                            <tr>
                                <td>HR0890</td>
                                <td>N.D.T Kariyawasam</td>
                                <td>130 000</td>
                            </tr>
                            <tr>
                                <td>HR0908</td>
                                <td>K.M Herath</td>
                                <td>127 000</td>
                            </tr>
                            <tr>
                                <td>HR5679</td>
                                <td>Y.T Silve</td>
                                <td>110 000</td>
                            </tr>



                        </table>


                    </div>


                </div>

                <div class="chart-down">
                    <div class="user-reg">
                        <h3>Customer Registration </h3>
                        <div id="barchart_values" style="width: 500px; height: 500px;"></div>


                    </div>
                    <div class="trans">
                        <h3>Transaction Summary </h3>
                        <div id="columnchart_material" style="width: 500px; height: 500px;"></div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="popup">
        <?php require 'view_admin_popup_search_customer.php'; ?>
    </div>

    <div class="removeuser">
        <?php require 'view_admin_popup_remove_user.php'; ?>
    </div>

    <div class="search_salesrep">
        <?php require 'view_admin_popup_search_salesrep.php'; ?>
    </div>

    <div class="routes">
        <?php require 'view_admin_routes.php'; ?>
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

    <!-- script for popup message -->
    <script>
        // popup = document.querySelector('.popup');

        function popup_message(popup_message) {

            popup_message = document.querySelector(popup_message);

            popup_message.style.visibility = "visible";
            sidebar.style.opacity = "30%";
            container.style.opacity = "30%";

            window.onclick = function(event) {
                if (event.target == popup_message) {
                    popup_message.style.visibility = "hidden";
                    sidebar.style.opacity = "100%";
                    container.style.opacity = "100%";

                }
            }

        }
    </script>

    <!-- script for cards -->
    <script>
        count_products = document.getElementById('count_products');
        count_salesreps = document.getElementById('count_salesreps');
        count_customers = document.getElementById('count_customers');
        count_routes = document.getElementById('count_routes');
        count_orders = document.getElementById('count_orders');
        count_deliveries = document.getElementById('count_deliveries');



        function load_cards() {

            fetch('http://localhost/web-Experts/public/admin/load_view')
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    count_products.innerHTML = data[0][0]['count_products'];
                    count_salesreps.innerHTML = data[0][1]['count_salesrep'];
                    count_customers.innerHTML = data[0][2]['count_customer'];
                    count_routes.innerHTML = data[0][3]['count_route'];
                    count_orders.innerHTML = data[0][4]['count_order'];
                    count_deliveries.innerHTML = 3;
                });
        }

        load_cards();
    </script>







    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'online', 'cash', 'cheque'],
                ['Jan', 1000, 400, 200],
                ['Feb', 1170, 460, 250],
                ['March', 660, 1120, 300],
                ['April', 1030, 540, 350],

            ]);

            var options = {
                chart: {
                    title: 'Transactions',
                    subtitle: 'Cash Cheque Online',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>




    <!-- Overview -->
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Returns'],
                ['2013', 1000, 100],
                ['2014', 1170, 60],
                ['2015', 660, 120],
                ['2016', 1030, 240]
            ]);

            var options = {
                title: 'Company Performance',
                hAxis: {
                    title: 'Year',
                    titleTextStyle: {
                        color: 'green'
                    }
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>




    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Month", "Total", {
                    role: "style"
                }],
                ["Jan", 8.94, "#b87333"],
                ["Feb", 10.49, "silver"],
                ["March", 19.30, "gold"],
                ["April", 21.45, "color: #e5e4e2"]
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
                title: "Total customers",
                width: 500,
                height: 500,
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

    <script>
        const back_to_home = () => {
            document.querySelector('.routes').style.visibility = "hidden";
            sidebar.style.opacity = "100%";
            container.style.opacity = "100%";
        }
    </script>
</body>

</html>