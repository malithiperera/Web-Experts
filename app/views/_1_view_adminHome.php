<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

<style>
    *{
        margin:0;
        padding:0;
        font-family:Arial, Helvetica, sans-serif;
        color:white;
    }
    body{
        position: relative;
        /* background-color:#D8E9EB; */
    }
    .sideBar{
        position : fixed;
        top: 50px;
        left: 5px;
        z-index: 1001;
    }
    .open{
        position : absolute;
        top:5px;
        left:4px;
        z-index: 1002;
    }
    .close{
        position : absolute;
        top:5px;
        left:3px;
        z-index: 1002;
        visibility : hidden;
    }
    .openBar{
        position : absolute;
        top:0;
        width:200px;
        height: 550px;
        background-color:#2277B2;
        visibility : hidden;
        z-index: 1000;
    }
    .closeBar{
        position : absolute;
        top:0;
        width:42px;
        height: 550px;
        background-color:#184A78;
        z-index: 1000;
    }
    
    .cards{
        position: relative;
        display: flex;
        flex-wrap: wrap;
        top:100px;
        left: 50px;
        z-index: 999;
    }
    .card{
        width: 200px;
        height: 80px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom : 40px;
        text-align:center;
        z-index: 999;
        border-radius:20px;
        box-shadow:2px 2px #888888;
        
    }
    .card > p{
        margin-top : 10px;
        z-index: 999;
        color:#184A78;
    }
    .graph1_background{
        position:absolute;
        top:280px;
        left:30px;
        width:1200px;
        height:430px;
        background-color:white;
    }
    .graph1{
        position:absolute;
        top:300px;
        left:40px;
    }
    .graph2{
        position: absolute;
        top: 750px;
        left:180px;
    }
    .icons{
        position:fixed;
        top:130px;
        left:13px;
        z-index: 2000;
        display:list-item;
        display:flex;
        flex-direction:column;
        font-size:16px;
    }
    .icons > a{
        padding-bottom:50px;
    }
    .icons > a:hover i{
        color:#2277B2;
    }
    .labels{
        position:fixed;
        z-index: 2000;
        left:55px;
        top:130px;
    }
    .labels > a{
        padding-bottom:50px;
        display:block;
        text-decoration:none;
    }
    .labels > a:hover{
        color:#184A78;
    }
    .chart1{
        margin-top:100px;
        margin-left:100px;
        width:400px;
        height:400px;
    }
    .chart2{
        margin-top:100px;
        margin-left:50px;
        width:400px;
        height:400px;
    }
</style>
<body>
    

    <div class="sideBar">
    <div class="close" id="close">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.6842 5.6842L30.3158 30.3158" stroke="white" stroke-width="2"/>
        <path d="M30.0451 5.41351L5.14288 30.3158" stroke="white" stroke-width="2"/>
        <circle cx="18" cy="18" r="17" stroke="white" stroke-width="2"/>
        </svg>
 
        </div>

    <div class="open" id="open">
        <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 1H31" stroke="white" stroke-width="2"/>
        <path d="M0 22H31" stroke="white" stroke-width="2"/>
        <path d="M0 11H31" stroke="white" stroke-width="2"/>
        </svg>

    </div> 
   
    <div class="openBar" id="openBar">
        <div class="labels">
           

            <a href="#">PRODUCTS</a>
            <a href="../admin/searchCustomer">CUSTOMERS</a>
            <a href="#">SALES REPS</a>
            <a href="../admin/viewReport">REPORTS</a>
            <a href="../admin/add_user">ADD USER</a>
            <a href="../admin/remove_user">REMOVE USER</a>
            <a href="../admin/routes">ROUTES</a>
            </div>
    </div>

    <div class="closeBar" id="closeBar"></div>
           
    </div>


    <div class="cards">
        <div class="card">
            <p>KINDS OF PRODUCTS</p>
            <p>10</p>
            
        </div>
        <div class="card">
            <p>REGISTERED SALES REPS</p>
            <p>10</p>
        </div>
        <div class="card">
            <p>REGISTERED CUSTOMERS</p>
            <p>10</p>
        </div>
        <div class="card">
            <p>COVERING ROUTES</p>
            <p>10</p>
        </div>
        <div class="card">
            <p>PENDING ORDERS</p>
            <p>10</p>
        </div>
        <div class="card">
            <p>OVERDUE DELIVERIES</p>
            <p>10</p>
        </div>

        <div class="chart1">
            <canvas id="myChart1"></canvas>
        </div>
        <div class="chart2">
            <canvas id="myChart2"></canvas>
        </div>
       

    </div>

    <div class="icons">
        <a href="#"><i class="fas fa-luggage-cart fa-lg"></i></a>
        <a href="../admin/searchCustomer"><i class="fas fa-landmark fa-lg"></i></a>
        <a href="#"><i class="fas fa-user-tie fa-lg"></i></a>
        <a href="../admin/viewReport"><i class="fas fa-chart-line fa-lg"></i></a>
        <a href="../admin/add_user"><i class="fas fa-user-plus fa-lg"></i></a>
        <a href="../admin/remove_user"><i class="fas fa-user-minus fa-lg"></i></a>
        <a href="../admin/routes"><i class="fas fa-map-marker-alt fa-lg"></i></a>
        
    </div>

    

    <script>
        document.getElementById('open').addEventListener("click", function(){
            document.getElementById('open').style.visibility = "hidden";
            document.getElementById('close').style.visibility = "visible";
            document.getElementById('openBar').style.visibility = "visible";
        });

        document.getElementById('close').addEventListener("click", function(){
            document.getElementById('open').style.visibility = "visible";
            document.getElementById('close').style.visibility = "hidden";
            document.getElementById('openBar').style.visibility = "hidden";
        });
    </script>


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



var ctx = document.getElementById('myChart2').getContext('2d');
var myChart2 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'overall business of the year',
            data: [12, 19, 50, 5],
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

</body>
</html>