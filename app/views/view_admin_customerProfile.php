<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            color:white;
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            position:relative; 
            background-color:#D8E9EB;  
        }
        .cards{
            position:absolute;
            top:100px;
            left:400px;
            display:flex;
            flex-direction:row;  
            flex-wrap:wrap;
        }
        .card{
            background-color:blue;
            width:200px;
            height:80px;
            margin-right:50px;
            margin-bottom:20px;
            border-radius:20px;
            text-align:center;
        }
        .card > p{
            margin-top:10px;
        }
        .nav_bar{
            position:absolute;
            top:100px;
        }
        .close_bar{
            position:fixed;
            width:45px;
            height:550px;
            background-color:black;
            z-index: 2;
        }
        .open{
            margin:5px;
        }
        .open_bar{
            position:fixed;
            width:200px;
            height:550px;
            background-color:blue;
            visibility:hidden;
            z-index: 1;
        }
        .close{
            position:absolute;
            top:0px;
            left:0px;
            margin:5px;
            visibility: hidden;
        }

    </style>
</head>
<body>
   <?php require 'view_headerType2.php'; ?>

    <div class="cards">
        <div class="card">
            <p>ROUTE</p>
            <P>r1</P>
        </div>
        <div class="card">
            <p>OVERDUE PAYMENTS</p>
            <P>10</P>
        </div>
        <div class="card">
            <p>STATUS</p>
            <P>active</P>
        </div>
        <div class="card">
            <p>CREDIT PAYMENT</p>
            <P>10 days</P>
        </div>
    </div>

    

    
</body>
</html>