<?php session_start(); ?>

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
    <div class="header">
        <?php
        require 'view_headertype2.php';
        ?>

    </div>


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



            <!-- <div class="card">
                <p><i class="fas fa-file-alt"></i><br>View Reports</p>
                <p class="result">Active</p>
            </div> -->

        </div>
    </section>
    <div class="charts">
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
        <div class="chart1">
            <canvas id="myChart1"></canvas>
        </div>
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
    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
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
                        'rgba(255, 159, 64,0.5)'
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
    <div><input type="submit" value="Back" id="confirm" onclick="window.location.href='../salesRep/home';"></div>

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

<script>
    //load cards 
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
</body>

</html>