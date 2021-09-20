<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer_Home</title>
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
        background-color:#e4e1df;
    }
    html::-webkit-scrollbar{
    width: .8rem;
}

html::-webkit-scrollbar-track{
    background: transparent;
}

html::-webkit-scrollbar-thumb{
    background: grey;
    border-radius: 5rem;
}
    .sideBar{
        position : fixed;
        top: 100px;
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
        cursor:pointer;
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
        top:50px;
        left: 50px;
        z-index: 999;
        /* margin-left: 150px; */
        justify-content: center;
       
    }
    .card{
        width: 200px;
        height: 80px;
        background-color: #2277B2;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom : 40px;
        text-align:center;
        z-index: 999;
        cursor:pointer;
        border-radius:10px;
    }
    .card > p{
        margin-top : 10px;
        z-index: 999;
    }

    .card:hover{
        background-color: #D7CEC8;
    /* color:  #184A78; */
    cursor:pointer:
    }
    
    
    .icons{
        position:fixed;
        top:180px;
        left:13px;
        z-index: 2000;
        display:list-item;
        display:flex;
        flex-direction:column;
        font-size:16px;
    }
    .icons >  i{
        padding-bottom:50px;
    }
    .icons > i:hover{
        color:#2277B2;
    }
    .labels{
        position:fixed;
        z-index: 2000;
        left:55px;
        top:180px;
    }
    .labels > p{
        padding-bottom:46px;
    }
    .labels > p:hover{
        color:#184A78;
    }
    .chart{
        margin-top:100px;
        margin-left:100px;
        width:400px;
        height:400px;
    }

    .divup{
       
     
     display:flex;
        justify-content:center; */
       
       
        padding:40px;
        border-radius:20px;
        display:flex;
        flex-wrap:wrap;
        margin-left:40px;
        text-transform: capitalize;
        color:#184A78; 
        z-index:0;
        margin-left:180px;
    }
    .detail{
        width:100px;
        text-align:center;
        height:100px;
        padding:10px;
        margin-top:90px;
      
      
        z-index:0;
        background:white;
       
        text-transform:capitalize;
    }
        .detail p{
            color:#184A78;
            font-size:20px;
            font-weight:300;
        }

        .detail:hover{
            background:#184A78;
            
        }
        .detail:hover>*{
            color:#fff;
        }
        .product{

        }
    .footer1{
        width:120vw;
        position:relative;
    }
    section{
    padding:2rem 7%;
}
    .menu{
        display:flex;
        flex-direction:column;
        justify-content:center;
        z-index:0;
     position: relative;

    }
 
    .menu .box-container{
      
        margin-left:180px;
    display: flex;
    flex-wrap:wrap;
   
    gap:0.9rem;
}



.menu .box-container .box{
    width:300px;
   height:300px;
    padding:2rem;
    text-align: center;
    
}
h2{
    color:black;
    text-align:center;
    margin-top:50px;
    text-transform:uppercase;
    font-size:35px;
}
.menu .box-container .box img{
    height: 13rem;
}

.menu .box-container .box h3{
    color: black;
    font-size: 1.5rem;
    padding:1rem 0;
}

.menu .box-container .box:hover{
    background:#184A78;
    transform: scale(1.1);
}

.menu .box-container .box:hover > *{
    color:#fff;
}

</style>
<body>
    <?php require 'view_headerType2.php';  ?>

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
            <p>PLACE ORDER</p>
            <p>PAY NOW</p>
            <p>MY ORDERS</p>
            <p>OUR PRODUCTS</p>
            <p>VIEW REPORT</p>
           
            </div>
    </div>

    <div class="closeBar" id="closeBar"></div>
           
    </div>
    <div class="container">
    <div class="divup">
    <div class="detail" style="width: 300px;">
        <p>ROOT</p>
        <p>Kandy Kurunagala Road</p>
    </div>
    <div class="detail" style="width: 300px">
        <p>SALES REP</p>
        <p>MR.Bandara</p>
        <p>contact:0718292839</p>
    </div>
</div>
    
    </div>
    <div class="cards">
        <div class="card">
            <p>KINDS OF PRODUCTS</p>
            <p>10</p>
            
        </div>
        <div class="card" style="background-color:#184A78;">
            <p>Pending deliveries</p>
            <p>1</p>
        </div>
        <div class="card">
            <p>Overdue Payment</p>
            <p>10</p>
        </div>
        <div class="card" style="background-color:#184A78;">
            <p>Pending Cheque</p>
            <p>10</p>
        </div>
        <div class="card">
            <p>Pending Payments</p>
            <p>10</p>
        </div>
     

        <!-- <div class="chart">
            <canvas id="myChart"></canvas>
        </div> -->

       
    </div>
    </div>

    <div class="icons">
         <i class="fas fa-cart-plus"></i>
         <i class="far fa-credit-card"></i>
         <i class="fas fa-shopping-cart"></i>
         <i class="fas fa-ice-cream"></i>
        <i class="fas fa-chart-line fa-lg"></i>
        
        
    </div>
    <!-- <div class="headd">
    <h1 class="heading"> our <span>menu</span> </h1>
    </div> -->
    <h2>Product Category</h2>
<section class="menu" id="menu">



<div class="box-container">

 

    <div class="box">
        <img src="../../public/images/h_icecream.jpg" alt="">
        <h3>Himalee Ice Creams</h3>
      
        
    </div>
    <div class="box">
        <img src="../../public/images/curd.jpg"alt="">
        <h3>Himalee Curd Items</h3>
        
    </div>

    <div class="box">
        <img src="../../public/images/h_freshmilk.jpg"alt="">
        <h3>Hiamlee Fresh Milk Products</h3>
       
       
    </div>

    <div class="box">
        <img src="../../public/images/h_yoghurt.jpg" alt="">
        <h3>Hiamlee Fresh Yoghurd Products</h3>
      
      
    </div>

    <div class="box">
        <img src="../../public/images/h_curd.jpg"alt="">
        <h3>tasty and healty</h3>
      
      
    </div>

    <div class="box">
        <img src="../../public/images/h_icecream.jpg" alt="">
        <h3>tasty and healty</h3>
       
       
    </div>

</div>





</section>
    <div class="footer1">
<?php require 'view_footer.php'; ?>

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



</script>

</body>
</html>