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
    <link rel="stylesheet" href="../../public/styles/view_rep_achievements.css">
    <title>Achievements</title>
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

<style>
    .change_target {
        margin-top: 12px;
        margin-left: 25px;
        width: 200px;
        height: 60px;
        background-color: white;
        visibility: hidden;
        border: 2px solid #184A78;

    }

    #new_target {
        text-align: center;
    }
    #change_here{
        margin-top: -80px;
        font-size: 9px;
        visibility: hidden;
    }
</style>

<body>

<!-- START SIDE BAR -->

<div class="sidebar">
    <div class="logo-details">

      <div class="logo_name">Himalee Dairy Products</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="../salesRep/customer_registration">
          <i class='fas fa-user-plus fa-lg'></i>
          <span class="links_name">Customer Registration</span>
        </a>
        <span class="tooltip">Customer Registration</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user open-button' onclick="openForm()"></i>
          <span class="links_name ">Customer Profile</span>
        </a>
        <!-- <span class="tooltip">Customer Profile</span> -->
        <div class="form-popup" id="myForm">
          <form action="../salesRep/customer_home" class="form-container">

            <label for="cus_id"><b>Enter Customer ID</b></label>
            <input type="text" placeholder="Enter ID" name="cus_id" required>

            <button type="submit" class="btn" src=>Search</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
        </div>
      </li>
      <li>
        <!-- <a href="../orders/create_bill"> -->
        <a href="../customer/place_order_view">
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
        <span class="tooltip">Reports</span>
      </li>
      <li>
        <a href="../salesRep/view_notifications">
          <i class='bx bx-bell'></i>
          <span class="links_name">Notifications</span>
        </a>
        <span class="tooltip">Notifications</span>
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
        <a href="../login/logout">
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

<!-- END SIDE BAR -->

<!-- START HEADER -->

    <div class="header">
        <?php
        require 'view_headertype2.php';
        ?>

    </div>

<!-- END HEADER -->


<!-- START CARD SECTION -->
    

    <section class="cards-section">
        <div class="cards">
            <div class="card">
                <p><i class="fas fa-user"></i><br>Rep ID</p>
                <p class="result"><?php echo $_SESSION['userid'];  ?></p>
            </div>

            <div class="card" id="target">
                <p><i class="fas fa-trophy"></i><br>Target</p>
                <p class="result" id="target_num"><span id="targetValue"></span></p>

                <div class="change_target">
                    <input type="text" id="new_target">
                    <button onclick="change_target_func()">change</button>
                </div>
                <p id="change_here">change here</p>
            </div>

        </div>
    </section>


<!-- END CARD SECTION -->

<!-- CHARTS -->

    <div class="charts">
        <div class="chart">
            <div id="piechart" style="width: 500px; height: 500px;"></div>
        </div>
        <!-- <div class="chart1">
            <div id="piechart"></div>
        </div> -->
    </div>



    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: '# of Sales',
                    data: [5, 16, 8, 22, 10, 20],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
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

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        fetch('http://localhost/web-Experts/public/salesRep/achievement')
        .then(response => response.json())
        .then(data => {
        console.log(data);
         


        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Achieved',     11],
          ['Remaining',      2],
  
        ]);

        var options = {
          title: 'Monthly Performance'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    <!-- END CHARTS -->

    <!-- BACK BUTTON -->

    <div><input type="submit" value="Back" id="confirm" onclick="window.location.href='../salesRep/home';"></div>


    <!-- CHANGE TARGET OPTION START -->
    <script>


        var type = '<?php echo $_SESSION['type']; ?>';

        change_target = document.querySelector('.change_target');
        target = document.getElementById('target');
        new_target = document.getElementById('new_target');
        target_num = document.getElementById('target_num');

        if (type == 'admin') {


            target.onmouseover = () => {
                change_target.style.visibility = "visible";
            }
            target.onmouseout = () => {
                change_target.style.visibility = "hidden";
            }
            document.getElementById('change_here').style.visibility = "visible";
        }

        console.log(new_target.value);
        const change_target_func = () =>{
            target_num.innerHTML = new_target.value;
            new_target.value = "";
        }
        
    </script>

    <!-- CHANGE TARGET OPTION END -->


<!-- START LOAD CARDS FOR REP ACHIEVEMENTS -->

<script>
    
    function load_cards() {

fetch('http://localhost/web-Experts/public/salesRep/target')
  .then(response => response.json())
  .then(data => {
    console.log(data);
    targetValue.innerHTML = data[0][0]['tar'];

  });
}

load_cards();
</script>

<!-- END LOAD CARDS FOR REP ACHIEVEMENTS -->

<!-- START LOAD CHARTS FOR REP ACHIEVEMENTS -->

<script>
  function achievements(){
    fetch('http://localhost/web-Experts/public/salesRep/achievement')
    .then(response => response.json())
    .then(data => {
      console.log(data);
      achievedValue.innerHTML = data[0][0]['achieved'];

  });
  }
  achievements();
</script>

<!-- END LOAD CHARTS FOR REP ACHIEVEMENTS -->
  

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