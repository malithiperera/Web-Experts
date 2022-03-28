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

    <link rel="stylesheet" href="../../public/styles/admin_Home.css">
   <style>
       .container{
           z-index: 100;
       }
       .choose_product_new{
           position: fixed;
           width: 100%;
           height: 100vh;
           background-color: blue;
           z-index: 100000000;
       }
   </style>
</head>

<body>


    <!-- <div class="sidebar">
        <p id="company_name">HIMALEE DAIRY </br>PRODUCTS</p>
        <i class="fas fa-bars fa-lg"></i>
        <i class="fas fa-align-right fa-lg"></i>
        <div class="icons">
            <a href="#"><i class="fas fa-luggage-cart fa-lg"></i></a>
            <a href="#" onclick="popup_message('.popup')"><i class="fas fa-landmark fa-lg"></i></a>
            <a href="#" onclick="popup_message('.search_salesrep')"><i class="fas fa-user-tie fa-lg"></i></a>
            <a href="#" onclick="popup_message('.select_report')"><i class="fas fa-chart-line fa-lg"></i></a>
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
            <a href="#" onclick="popup_message('.select_report')">REPORTS</a>
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
    </div> -->



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
                        <div id="chart_div" style="width: 550px; height: 500px;"></div>

                    </div>
                    <div class="growth">
                        <h3>Best of Sales Rep</h3>
                        <table id="best_of_reps">
                            <tr>
                                <th>Sales Rep ID</th>
                                <th>Name</th>
                                <th>Profit</th>
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

     <!-- popup for choose a product -->
     <div class="choose_product">
        <?php require 'view_admin_choose_product_popup.php'; ?>
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


    <div class="select_report">
        <?php require 'view_all_report_popup.php'; ?>
    </div>

    <div class="choose_product_new">

    </div>


    

   





    <!-- scripts for charts -->

    <!-- script for popup message -->
    <script>
        // popup = document.querySelector('.popup');

        function popup_message(popup_message) {

            popup_message = document.querySelector(popup_message);
            container = document.querySelector('.container');

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

        data_set = {

        }

        async function load_page() {

            let data = await fetch('http://localhost/web-Experts/public/admin/load_view', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    count_products.innerHTML = data[0][0]['count_products'];
                    count_salesreps.innerHTML = data[0][1]['count_salesrep'];
                    count_customers.innerHTML = data[0][2]['count_customer'];
                    count_routes.innerHTML = data[0][3]['count_route'];
                    count_orders.innerHTML = data[0][4]['count_order'];
                    count_deliveries.innerHTML = 3;

                    return data;
                });
            return data;
        }

        load_page();
    </script>






    <!-- payment method chart -->
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

    <!-- loading charts in admin view -->
    <script>
        let years = [];
        let sales = [];
        let returns = [];


        load_page().then(data => {
            
            
            for (let i = 0; i < 4; i++) {
                years.push(data[1][i]['year']);
                sales.push(data[1][i]['year_amount']);
                returns.push(data[1][i][0]['amount']);
            }
           

            // begining sales Overview chart
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);


            let data_array = [
                ['Years', 'Sales', 'Returns']
            ];

            // let returns = [145, 267, 898, 567];
            console.log("hellow");
            for (let i = 0; i < 4; i++) {
                data_array.push([String(years[i]), parseInt(sales[i]), parseInt(returns[i])]);
               
            }

            function drawChart() {
                var data = google.visualization.arrayToDataTable(data_array);

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
            //ending sales overview chart



        });
    </script>



    <!-- customer registration chart -->
    <script type="text/javascript">
        load_page()
            .then(data => {

                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                let color = ["#b87333", "silver", "gold", "#e5e4e2"];
                let chart_data = [
                    ["Month", "Total", {
                        role: "style"
                    }]
                ];

                for (let i = 0; i < 4; i++) {
                    chart_data.push([data[3][i]['month'], parseInt(data[3][i]['count']), color[i]]);

                }

                console.log(chart_data);


                function drawChart() {
                    var data = google.visualization.arrayToDataTable(chart_data);

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




            });
    </script>

    <script>
        
    </script>

    <!-- fill best of reps table -->
    <script>
        best_of_reps = document.getElementById('best_of_reps');
        load_page()
            .then(data => {
                for (let i = 0; i < data[2].length; i++) {
                    best_of_reps.innerHTML += `<tr>
                                <td>${data[2][i]['rep_id']}</td>
                                <td>${data[2][i]['name']}</td>
                                <td>${data[2][i]['amount']}</td>
                                 </tr>`;
                }

            });
    </script>

    <script>
        // let container = document.querySelector('.container');
        // container.innerHTML = ``;
    </script>

</body>

</html>