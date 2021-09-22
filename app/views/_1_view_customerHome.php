<?php
session_start();
 ?>
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
        background-color:#fff;
    }
    html::-webkit-scrollbar{
    width: .8rem;
    height:0.9rem;
}

html::-webkit-scrollbar-track{
    background: transparent;
}

html::-webkit-scrollbar-thumb{
    background: grey;
    border-radius: 3rem;
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
        z-index: 2999;
        
    }
    .close{
        position : absolute;
        top:5px;
        left:3px;
        z-index: 3000;
        visibility : hidden;
    }
    .openBar {
        position : absolute;
        top:0;
        width:200px;
        height: 500px;
        background-color:#2277B2;
        visibility : hidden;
        z-index: 1000;
        border-radius:5px;
        cursor:pointer;
    }
    .openbar a{
        display:block;
        text-decoration:none;
    }
    .closeBar{
        position : absolute;
        top:0;
        width:42px;
        height: 500px;
        background-color:#2277B2;
        z-index: 1000;
    }
    
    .cards{
        position: relative;
        display: flex;
        flex-wrap: wrap;
        top:50px;
        /* left: 50px; */
        z-index: 999;
        /* margin-left: 150px; */
        justify-content: center;
       
    }
    .card{
        width: 200px;
        height: 80px;
        background-color: #2277B2;
        /* margin-left: 20px; */
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
    .icons >  a{
        padding-bottom:50px;
    }
    .icons > a i:hover{
        color:#2277B2;
    }
    .labels{
        position:fixed;
        z-index: 2000;
        left:55px;
        top:180px;
    }
.labels a{
    text-decoration:none;
}

    .labels > a p{
        padding-bottom:46px;
        
    }
    .labels >  a p:hover{
        color:#184A78;
    }
    .open i{
        color:#fff;
        margin-left:10px;
    }
    .close i{
        color:#fff;
        margin-left:10px;
    }

    .divup{
       
     
          display:flex;
        justify-content:center; */
       
       
        padding:40px;
        border-radius:20px;
        display:flex;
        flex-wrap:wrap;
        
        text-transform: capitalize;
        color:#184A78; 
        z-index:0;
        
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
    
        position:relative;
        z-index:1;
    }
    section{
    padding:2rem 7%;
}
    .menu{
        display:flex;
        /* flex-direction:column; */
        justify-content:center;
        z-index:0;
        
     position: relative;

    }
 
    .menu .box-container{
      
   
    display: flex;
    flex-wrap:wrap;
   justify-content:center;
    gap:0.9rem;
}



.menu .box-container .box{
    width:300px;
   height:300px;
    padding:2rem;
    text-align: center;
    
}
h2{
    color:#184A78;
    text-align:center;
    margin-top:50px;
    text-transform:uppercase;
    font-size:35px;
    text-decoration:italic;
}
.menu .box-container .box img{
    height: 13rem;
    width:250px;
}

.menu .box-container .box h3{
    color:#184A78;
    font-size: 1.5rem;
    padding:1rem 0;
    font-style: italic;

}

.menu .box-container .box:hover{
    background:#fff;
    transform: scale(1.1);
}

.menu .box-container .box:hover > *{
    /* color:#fff; */
}

@media(max-width:400px){
    .menu .box-container .box h3{
    
    font-size: 1rem;
    padding:1rem 0;
  

}
h2{
    font-size:1.5rem;
}

.closebar{
    height:900px;
}
.icons >  a{
        padding-bottom:10px;
    }

}
</style>
<body>
    <?php require 'view_headerType2.php';  ?>

    <div class="sideBar">
    <div class="close" id="close">
        
        <i class="fas fa-times" margin-left:5></i>
      
 
        </div>

    <div class="open" id="open">
    <i class="fa fa-bars"></i>
        

    </div> 
   
    <div class="openBar" id="openBar">
        <div class="labels">
            <a href="../customer/place_order"><p>PLACE ORDER</p></a>
            <a href="../customer/my_order"><p>PAY NOW</p></a>
            <a href="../customer/my_order"><p>MY ORDERS</p></a>
            <a href="../customer/our_products"><p>OUR PRODUCTS</p></a>
            <a href="../customer/view_report"><p>VIEW REPORT</p></a>
           
            </div>
    </div>

    <div class="closeBar" id="closeBar"></div>
           
    </div>
    <div class="container">
    <div class="divup">
    <div class="detail" style="width: 300px;">
        <p>ROOT</p>
        <p><?php echo $_SESSION['email']; ?></p>
    </div>
    <div class="detail" style="width: 300px">
        <p>SALES REP</p>
        <p>MR.Bandara</p>
        <p>contact:0718292839</p>
    </div>
</div>
    
    </div>
    <div class="cards" id="cards">
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
     

     
       
    </div>
    </div>

    <div class="icons">
        <a href="../customer/place_order"><i class="fas fa-cart-plus"></i></a> 
         <a href="../customer/my_order"><i class="far fa-credit-card"></i></a>
         <a href="../customer/my_order"><i class="fas fa-shopping-cart"></i></a>
         <a href="../customer/our_products"><i class="fas fa-ice-cream"></i></a>
        <a href="../customer/view_report"><i class="fas fa-chart-line fa-lg"></i></a>
        
        
    </div>
    <!-- <div class="headd">
    <h1 class="heading"> our <span>menu</span> </h1>
    </div> -->
    <h2>We Provide You...</h2>
<section class="menu" id="menu">



<div class="box-container">

 

    <div class="box">
        <img src="../../public/images/h_icecream.jpg" alt="">
        <h3>Ice Creams</h3>
      
        
    </div>
    <div class="box">
        <img src="../../public/images/curd.jpg"alt="">
        <h3>Curd Items</h3>
        
    </div>

    <div class="box">
        <img src="../../public/images/h_freshmilk.jpg"alt="">
        <h3>Fresh Milk </h3>
       
       
    </div>

    <div class="box">
        <img src="../../public/images/h_yoghurt.jpg" alt="">
        <h3>Yoghurd Products</h3>
      
      
    </div>

    <div class="box">
        <img src="../../public/images/milk_beve.jpg"alt="">
        <h3>Milk Beverages</h3>
      
      
    </div>

    <div class="box">
        <img src="../../public/images/cheese.jpg" alt="">
        <h3>Cheese</h3>
       
       
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
            document.getElementById('cards').style.marginLeft = "170px";
            
        });

        document.getElementById('close').addEventListener("click", function(){
            document.getElementById('open').style.visibility = "visible";
            document.getElementById('close').style.visibility = "hidden";
            document.getElementById('openBar').style.visibility = "hidden";
            document.getElementById('cards').style.marginLeft = "0";
        });


alert("Hello");
      
    </script>





</body>
</html>