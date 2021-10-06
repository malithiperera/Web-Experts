<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="style.css">
    <!-- Box icons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/styles/viewStocks.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2004', 1000, 400],
                ['2005', 1170, 460],
                ['2006', 660, 1120],
                ['2007', 1030, 540]
            ]);

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
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
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Notification</span>
                </a>
                <span class="tooltip">Notification</span>
            </li>
            <li>
                <a href="#">
                <i class="fas fa-chart-line"></i>
                    <span class="links_name">View Reports</span>
                </a>
                <span class="tooltip">View Reports</span>
            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="links_name">File Manager</span>
                </a>
                <span class="tooltip">Files</span>
            </li> -->
            <li>
                <a href="#">
                <i class="fas fa-user"></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <!-- <li>
                <a href="#">
                <i class='bx bx-log-out' id="log_out">
                    <span class="links_name">Log out</span>
                </a>
                <span class="tooltip">Log out</span>
            </li> -->
            <!-- <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li> -->
            <li class="profile">
                <div class="profile-details">
                    <!-- <img src="profile.jpg" alt="profileImg"> -->
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
        <section class="cards-section">
            <div class="cards">
                <div class="card">
                    <p><i class="fas fa-ice-cream"></i><br>KINDS OF PRODUCTS</p>
                    <p>10</p>
                </div>
                <div class="card">
                    <p><i class="fas fa-user-tie"></i></i><br>No of Sales rep</p>
                    <p>1</p>
                </div>
                <div class="card">
                    <p><i class="fab fa-product-hunt"></i></i><br>Categories</p>
                    <p>10</p>
                </div>
                <div class="card">
                    <p><i class="fas fa-envelope"></i><br>Rep Requests</p>
                    <p>10</p>
                </div>
                


            </div>
        </section>

        <section class="detail">
            <!--  <div class="left">
           <div class="heading">
           <h3>Sales Summary</h3>
           </div>
           <div id="curve_chart" style="width: 600px; height: 500px"></div>
         </div>
         <div class="right">
           <div class="customer">
             <h2>Customers Details</h2>
             <div class="field">
               <div class="topic">
              <i class="fas fa-store"></i>
               <h4>No of customers</h4><br>
              </div>
              <div class="content">
               <h3>5</h3>
              </div>
              </div>
              <div class="field">
                <div class="topic">
                  <i class="fas fa-store-alt"></i>
                <h4>New Registrations</h4><br>
               </div>
               <div class="content">
                <h3>10</h3>
               </div>
               </div>
               <div class="field">
                <div class="topic">
                  <i class="fas fa-store-alt"></i>
                <h4>New Registrations</h4><br>
               </div>
               <div class="content">
                <h3>10</h3>
               </div>
               </div> 
              </div>
             
         <div class="rep">
          <h2>Sales Rep Details</h2>
          <div class="field">
            <div class="topic">
              <i class="fas fa-male"></i>
            <h4>No of Sales Rep</h4><br>
           </div>
           <div class="content">
            <h3>5</h3>
           </div>
           </div>
           <div class="field">
             <div class="topic">
              <i class="fas fa-map-marker-alt"></i>
             <h4>No of Routes</h4><br>
            </div>
            <div class="content">
             <h3>10</h3>
            </div>
            </div>
            <div class="field">
             <div class="topic">
               <i class="fas fa-money-bill-alt"></i>
             <h4>Cash Paymnets</h4><br>
            </div>
            <div class="content">
             <h3>10</h3>
            </div>
            </div> 
         </div>
        </div> -->

            <table>
                <tr>
                    <th>Id</th>
                    <th>Product</th>
                    <th>Current Stock</th>
                    <th>Unit Price</th>
                </tr>

                <tr>
                    <td><a href="../stockManager/product_profile">1</a></td>
                    <td>test</td>
                    <td>1000</td>
                    <td>100</td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>test</td>
                    <td>1000</td>
                    <td>100</td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>test</td>
                    <td>1000</td>
                    <td>100</td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>test</td>
                    <td>1000</td>
                    <td>100</td>
                </tr>
            </table>

            <div class="add"><br><br><br><br>
               <a href="../stockManager/add_product"><button class="add" >Add</button><br></a> 

            </div>

        </section>



    </section>


    <script src="../../public/java script/viewStocks.js"></script>


</body>

</html>