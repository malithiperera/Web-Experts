<?php session_start(); 

 if(!isset($_SESSION['username'])){
     header("Location:http://localhost/web-Experts/public/login/index");
 }

?>

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
            /* opacity:50%; */
        }
        .sidebar{
            position:fixed;
            width:80px;
            height: 100vh;
            background-color: #184A78;
            /* opacity:50%; */
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
            top:150px;
            display:flex;
            flex-direction:column;
        }
        .icons a{
            margin-bottom:50px;
            margin-left: 20px;
        }
        .links{
            position:absolute;
            top:150px;
            display:flex;
            flex-direction:column;
            visibility:hidden;
            width:250px;
        }
        .links a{
            margin-bottom:50px;
            margin-left:60px;
            width:230px;
            text-decoration:none;
        }
        .links a:hover{
            color:#1d1b31;
        }
        .sidebar_footer{
            position:absolute;
            bottom:0;
            background-color:#1d1b31;
            width:100%;
            height:60px;
        }
        .fa-building{
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
           /* opacity:50%; */
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
       .tables{
        width:100%;
        display:flex;
        justify-content:center;
        flex-wrap:nowrap;
       }
       .sub_tabels{
            margin-top:40px;
       }
       .tables p{
        color:#184A78;
        margin-bottom:30px;
       }
       .table1{
        margin-bottom:30px;
       }
       .table2{

       }
       table{
        border:1px solid #184A78;
       }
       table thead{

       }
       table thead th{
        color:#184A78;
        padding:10px;
        border:1px solid #184A78;
       }
       tr{

       }
       tr td{
        color:#184A78;
        padding:10px;
        border:1px solid #184A78;
       }
       .popup_send_warning, .popup_update_status{
           position:fixed;
           top:100px;
           width:100%;
           display:flex;
           justify-content:center;
           z-index: 1000;
           visibility:hidden;
       }
       .popup_update_status{
           visibility:visible;
       }
       .send_warning_message, .update_status_form{
           width:400px;
           height:350px;
           background-color:white;
           border:4px solid #184A78;
           border-radius:20px;
       }
       .update_status_form{
           height:400px;
       }
       .send_warning_message label, .update_status_form label{
           color:#184A78;
           display:block;
           margin:20px;
       }
       
       .send_warning_message input, .update_status_form input, 
       .send_warning_message textarea, .update_status_form textarea{
           color:#184A78;
       }
       .update_status_form input{
           padding:5px;
           margin-left:10px;
       }
       .message_input{
           margin-left:10px;
       }
       .submit{
           margin-top:30px;
           padding:5px;
           border-radius:20px;
           margin-left:160px;
       }
       .update_status_form .submit{
           margin-left:160px;
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
            <a href="#"><i class="fas fa-landmark fa-lg"></i></a>
            <a href="#"><i class="fas fa-user-tie fa-lg"></i></a>
            <a href="#"><i class="fas fa-chart-line fa-lg"></i></a>
            <a href="#"><i class="fas fa-user-plus fa-lg"></i></a>
        </div>

        <div class="links">
            <a href="#">REPORTS</a>
            <a href="#">UPDATE STATUS</a>
            <a href="#">UPDATE CREDIT PERIOD</a>
            <a href="#">UPDATE CHEQUE STATUS</a>
            <a href="#" onclick="send_warning()">SEND WARNING</a>
            
        </div>
        <div class="sidebar_footer">
            <div class="footerIcon">
            <i class="fas fa-building fa-lg"></i>
                <p class="username"><?php echo $_SESSION['username'];?></p>
            </div>
        </div>
    </div>

    <div class="popup_send_warning">
       <div class="send_warning_message">
            <form action="#" method="post"></form>
            <label for="" class="cus_id">Customer Id : 0001</label>
            <label for="" class="cus_name">Customer Name : Kamal</label>          
            <label for="" class="message_label">Message : </label>
            <textarea name="message" rows="5" cols="50" placeholder="Type Message Here..." class="message_input"></textarea>
            <input type="submit" name="submit" class="submit">
       </div>
    </div>

    <div class="popup_update_status">
        <div class="update_status_form">
            <form action="#" method="post">

                <label for="">Current Status : </label>
                <input type="text" name="current_status" value="Active" readonly>

                <label for="">New Status : </label>
                <input type="text" name="new_status" placeholder="New Status" >

                <label for="">Reason : </label>
                <textarea name="message" rows="5" cols="50" placeholder="Type reason Here..." class="message_input"></textarea>

                <input type="submit" name="submit" class="submit">
            </form>
        </div>
    </div>
    
    <div class="container">
       <div class="cards">
       
            <div class="card">
                <p>ROUTE</p>
                <p>R1</p>  
            </div>

            <div class="card">
                <p>OVERDUE PAYMENTS</p>
                <p>10</p>
            </div>

            <div class="card">
                <p>PENDING PAYMENTS</p>
                <p>10</p>
            </div>

            <div class="card">
                <p>RETURNED CHEQUES</p>
                <p>10</p>
            </div>

            <div class="card">
                <p>STATUS</p>
                <p>active</p>
            </div>

            <div class="card">
                <p>CREDIT PERIOD</p>
                <p>2 weeks</p>
            </div>
       </div>

       <div class="tables">
           <div class="sub_tabels">

                <p>ORDERS</p>

                <div class="table1">
                    <table>
                        <thead>
                            <th>ORDER NO</th>
                            <th>AMOUNT</th>
                            <th>DATE</th>
                        </thead>
                        <?php

                        for($i = 0 ; $i < 3 ; $i++){
                            echo '<tr>
                            <td>001</td>
                            <td>1000</td>
                            <td>30.12.2021</td>
                            </tr>';
                            }
             
                        ?>
                    </table>

                </div>

                <p>PAYMENTS</p>

                <div class="table2">
                    <table>
                        <thead>
                            <th>ORDER NO</th>
                            <th>AMOUNT</th>
                            <th>DELIVERY NO</th>
                            <th>DATE</th>
                        </thead>
                        <?php
        
                        for($i = 0 ; $i < 4 ; $i++){
                            echo '<tr>
                            <td>001</td>
                            <td>1000</td>
                            <td>001</td>
                            <td>30.12.2021</td>
                            </tr>';
                        }

                        ?>
        
                    </table>
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
                if(sidebar.style.width == "300px"){
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
            let widthdiv = 300;
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

    <!-- script for send warning -->
    <script>
        let popup_send_warning = document.querySelector(".popup_send_warning");
        
        function send_warning(){
            popup_send_warning.style.visibility = "visible";
            sidebar.style.opacity = "30%";
            container.style.opacity = "30%";
        }
        window.onclick = function(event) {
            if (event.target == popup_send_warning) {
                popup_send_warning.style.visibility = "hidden";
                sidebar.style.opacity = "100%";
                container.style.opacity = "100%";
            }
        }

    </script>


</body>

</html>