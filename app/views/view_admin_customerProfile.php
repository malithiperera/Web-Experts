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

    <div class="nav_bar">
        <div class="close_bar" id="close_bar">
            <div class="open" id="open">
                <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 1H31" stroke="white" stroke-width="2"/>
                <path d="M0 22H31" stroke="white" stroke-width="2"/>
                <path d="M0 11H31" stroke="white" stroke-width="2"/>
                </svg>
            </div>
                <div class="close" id="close">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.6842 5.6842L30.3158 30.3158" stroke="white" stroke-width="2"/>
                    <path d="M30.0451 5.41351L5.14288 30.3158" stroke="white" stroke-width="2"/>
                    <circle cx="18" cy="18" r="17" stroke="white" stroke-width="2"/>
                    </svg>
                
                </div>
        </div>
        <div class="open_bar" id="open_bar">
            
        </div>
    </div>

    <script>
        document.getElementById('open').addEventListener("click", function(){
            document.getElementById('open_bar').style.visibility = "visible";
            document.getElementById('open').style.visibility = "hidden";
            document.getElementById('close').style.visibility = "visible";
        });

        document.getElementById('close').addEventListener("click", function(){
            document.getElementById('open_bar').style.visibility = "hidden";
            document.getElementById('open').style.visibility = "visible";
            document.getElementById('close').style.visibility = "hidden";
        });

    </script>

</body>
</html>