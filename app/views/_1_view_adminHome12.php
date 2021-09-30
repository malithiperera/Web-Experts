<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        *{
            margin:0;
            padding:0;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
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
           height:200px;
           background-color:blue;
           display:flex;
           flex-direction:column;
       }
       .cards{
           display:flex;
           /* flex-wrap:wrap; */
       }
       .card{
           width:100px;
           height:100px;
           background-color:white;
           margin-right:10px;
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
           <p> sample card</p>
           </div>
           <div class="card">
               
           </div>
           <div class="card">
               
           </div>

       </div>
    </div>
        
    

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
                            container.style.width = "calc(100%-250px)";
                        }
                    }
                    clearInterval(id);
                }
                else{
                    widthdiv = widthdiv + 10;
                    sidebar.style.width = widthdiv+"px";
                    container.style.left = widthdiv+"px";
                    
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
                }
            }

            closebtn.style.visibility = "hidden";
            openbtn.style.visibility = "visible";
        });
    </script>

        <!-- <script>
            let card = document.querySelector(".card");

        window.onload = function(){
            jscode();
        }

            function jscard(){
                echo "dienth";
            }
        </script> -->

</body>
</html>