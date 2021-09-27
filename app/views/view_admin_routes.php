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
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }
        .header{
            z-index: 3000;
        }
        body{
            position: relative;
            background-color:#D8E9EB;
            width: 100%;
            height: 100vh;
            z-index: 2000;
        }
        .content{
            position:absolute;
            top:100px;
            z-index: 2000;
        }
        .table{
            position:relative;
            width:100%;
            z-index: 2000;
        }
        table{
            margin-left:100px;
            z-index: 2000;
        }
        tr{
            background-color:green;
        }
        thead th{
            padding-left:100px;
            padding-right:100px;
            text-align:center;
            background-color:blue;
            padding-top:10px;
            padding-bottom:10px;
        }
        tr td{
            text-align:center;
            padding-top:10px;
            padding-bottom:10px;
        }
        tr td a{
            text-decoration:none;
        }
        tr td a:hover{
            text-decoration:underline;
        }
        .buttons{
            position:relative;
            width:100%;
            margin-left:100px;
            margin-top:30px;
            margin-bottom:70px;
        }
        button{
            width:100px;
            height:30px;
            background-color:blue;
            border-radius:20px;
        }
        #back{
            position:fixed;
            top:90vh;
            right:20px;
        }
    </style>
</head>
<body>

    <div class="header">
    <?php require 'view_headerType2.php'; ?>
    </div>
    <div class="content">
        <div class="table">
            <table>
                <thead>
                    <th>ROUTE ID</th>
                    <th>SALES REP</th>
                    <th>DESTINATION</th>
                    <th>ROAD</th>
                </thead>
                
                <?php
                    for($i = 0 ; $i < 100 ; $i++){
                        echo "<tr>
                            <td><a href='../admin/routeProfile'>route1</a></td>
                            <td><a href='../admin/routeProfile'>rep1</a></td>
                            <td><a href='../admin/routeProfile'>des1</a></td>
                            <td><a href='../admin/routeProfile'>road1</a></td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
        <div class="buttons">
            <button id="add">ADD</button>
            <button id="edit">EDIT</button>
        </div>
    </div>
    <button id="back">BACK</button>
    
    
</body>
</html>