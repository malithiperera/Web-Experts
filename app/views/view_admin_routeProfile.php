<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            color: #184A78;
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            background-color:#D8E9EB;
        }
        .container1{
            position: relative;
            top:150px;
            width: 500px;
            height: 500px;
            background-color: white;
            border-radius: 20px;
        }
        .container1 > p{
            margin-top: 10px;
            margin-left:200px;
        }
        .rep{
            margin-top: 20px;
            margin-left: 20px;
            margin-bottom: 50px;
        }
        .container2{
            position:absolute;
            top: 160px;
            left: 25px;
            background-color: #D8E9EB;
            width: 450px;
            height: 300px;
            border-radius: 20px;
            overflow-y: scroll;
        }
        .container2 > p{
            margin-left:10px;
            margin-top:10px;
        }
    </style>
</head>
<body>

        <?php require 'view_headerType2.php'; ?>
    
        <div class="container1">
            <p>ROUTE ID</p>
            <div class="rep">
                <p>REP ID : 00001</p>
                <p>REP NAME : REP 01</p>
            </div>
            <p>CUSTOMERS</p>
            
            <div class="container2">
                <?php
                for($i = 0 ; $i < 30 ; $i++){
                    echo "<p>CUSTOMER 01</p>";
                }
                    
                ?>
            </div>
        </div>
    
    
</body>
</html>