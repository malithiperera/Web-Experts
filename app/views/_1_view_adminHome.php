<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    
    <style>
        *{
            margin:0;
            padding:0;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }
        body{
            
        }
        .sidebar{
            position:fixed;
            /* width: 250px; */
            width:80px;
            height: 100vh;
            background-color: #184A78;
        }
        .sidebar > p{
            margin-left:10px;
            letter-spacing:5px;
            visibility:hidden;
        }
        .sidebar > i{
            position:absolute;
            top:5px;
            right:35px;
        }
        .fa-align-right{
            visibility:hidden;
        }
        .icons{
            position:absolute;
            top:100px;
            display:flex;
            flex-direction:column;
        }
        .icons a{
            margin-bottom:60px;
            margin-left: 20px;
        }
        .links{
            position:absolute;
            top:100px;
            display:flex;
            flex-direction:column;
            visibility:hidden;
            width:250px;
        }
        .links a{
            margin-bottom:60px;
            margin-left:100px;
            text-decoration:none;
        }
        .sidebar_footer{
            position:absolute;
            bottom:0;
            background-color:#1d1b31;
            width:100%;
            height:60px;
        }
        .fa-sign-out-alt{
            position:absolute;
            top:20px;
            right:10px;
        }
        .footerIcon p{
            margin-top:20px;
            margin-left:10px;
            visibility:hidden;
        }
       .container{
           position:relative;
           left:80px;
           width: calc(100% - 80px);
           display:flex;
           flex-direction:column;
       }
       .cards{
           display:flex;
           flex-wrap:wrap;
           justify-content:center;
           text-align:center;
           margin-top:30px;
       }
       .card{
           flex: 2 0 150px;
           width:200px;
           height:100px;
           box-shadow:2px 2px 2px 2px #888888;
           margin-right:10px;
           margin-left:10px;
           margin-bottom:20px;
           border-radius:20px;
       }
       .card > p{
        color:#184A78;
        margin-top:10px;
       }
       .subcontainer1{
        display:flex;
        flex-wrap:wrap;
        justify-content:space-between;
        margin-left:20px;
       }
       .charts{
           width:400px;
           height:400px;
           margin-right: 200px;
       }
       .subcontainer2{
        display:flex;
        flex-direction:column;
       }
       .reps{
           width:300px;
           height:300px;
           border-radius:20px;
           box-shadow:2px 2px 2px 2px #888888;
           margin-right:20px;
           margin-bottom:20px;
       }
       .reps > p{
        color:#184A78;
        margin-left:20px;
       }
       .customers{
            width:300px;
            height:300px;
            border-radius:20px;
            box-shadow:2px 2px 2px 2px #888888;
       }
       .customers > p{
        color:#184A78;
        margin-left:20px;
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
            <a href="../admin/searchCustomer"><i class="fas fa-landmark fa-lg"></i></a>
            <a href="#"><i class="fas fa-user-tie fa-lg"></i></a>
            <a href="../admin/viewReport"><i class="fas fa-chart-line fa-lg"></i></a>
            <a href="../admin/add_user"><i class="fas fa-user-plus fa-lg"></i></a>
            <a href="../admin/remove_user"><i class="fas fa-user-minus fa-lg"></i></a>
            <a href="../admin/routes"><i class="fas fa-map-marker-alt fa-lg"></i></a>
        </div>

        <div class="links">
            <a href="#">PRODUCTS</a>
            <a href="../admin/searchCustomer">CUSTOMERS</a>
            <a href="#">SALES REPS</a>
            <a href="../admin/viewReport">REPORTS</a>
            <a href="../admin/add_user">ADD USER</a>
            <a href="../admin/remove_user">REMOVE USER</a>
            <a href="../admin/routes">ROUTES</a>
        </div>
        <div class="sidebar_footer">
            <div class="footerIcon">
                <i class="fas fa-sign-out-alt fa-lg"></i>
                <p class="username">username@gmail.com</p>
            </div>
        </div>
    </div>
    
    <div class="container">
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

       </div>

       <div class="subcontainer1">
            <div class="charts">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="subcontainer2">
                <div class="reps">
                    <p></br>Online Sales Reps</br></br></p>
                    <?php
                        for($i = 0 ; $i < 10 ; $i++){
                            echo "
                                <p>sample salesrep</p>
                            ";
                        }

                    ?>
                </div>
                <div class="customers">
                    <p></br>Online Sales Reps</br></br></p>
                        <?php
                            for($i = 0 ; $i < 10 ; $i++){
                             echo "
                                 <p>sample salesrep</p>
                              ";
                            }

                        ?>
                </div>
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

        openbtn.addEventListener("click", function(){
            
             let widthdiv = 80;
             let opacity = 0;
             
            var id = setInterval(frame, 10);

            function frame(){
                if(sidebar.style.width == "250px"){
                    var id1 = setInterval(frame1, 10);
                    opacity = 0;
                    function frame1(){
                        if(opacity == 100){
                            clearInterval(id1);
                        }
                        else{
                            links.style.visibility = "visible";
                            company_name.style.visibility = "visible";
                            username.style.visibility = "visible";
                            opacity = opacity + 10;
                            links.style.opacity = opacity+"%";
                            company_name.style.opacity = opacity+"%";
                            username.style.opacity = opacity+"%";
                            
                        }
                    }
                    clearInterval(id);
                }
                else{
                    widthdiv = widthdiv + 10;
                    sidebar.style.width = widthdiv+"px";
                    container.style.left = widthdiv+"px";
                    container.style.setProperty('width', 'calc(100% - '+widthdiv+'px)');
                }
            }

            openbtn.style.visibility = "hidden";
            closebtn.style.visibility = "visible";
            closebtn.style.right = "5px";
        });

        closebtn.addEventListener("click", function(){
            let widthdiv = 250;
            let opacity = 100;

            var id = setInterval(frame, 20);

            function frame(){
                if(sidebar.style.width == "80px"){
                    clearInterval(id);
                }
                else{
                    widthdiv = widthdiv - 10;
                    sidebar.style.width = widthdiv+"px";
                    container.style.left = widthdiv+"px";
                    opacity = opacity - 10;
                    company_name.style.opacity = opacity + "%";
                    links.style.opacity = opacity+"%";
                    username.style.opacity = opacity+"%";
                    container.style.setProperty('width', 'calc((100%-250px) - '+widthdiv+'px)');
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


        

</body>
</html>