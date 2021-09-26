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
            font-family:Arial, Helvetica, sans-serif;
            color:white;
        }
        body{
            position:relative;
            background-color:#D8E9EB;
        }
        .search_bar{
            position:absolute;
            top:100px;
            right:10px;
        }
        .search_bar > a .fas{
            position:absolute;
            color:black;
            right:13px;
            top:6px;
            font-size:20px;
        }
        .search_bar > input{
            width:250px;
            height:30px;
            border-radius:20px;
            outline:none;
            color:black;
            padding-left:10px;
        }
    </style>
</head>

<body>
    <?php require 'view_headerType2.php'; ?>

    <div class="search_bar">
        <input type="text" name="search">
        <a href="customerProfile"><i class="fas fa-search"></i></a>
        
    </div>
    
    
</body>
</html>