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
            font-family:Arial, Helvetica, sans-serif;
        }
        body{
            background-color:#ecd7bf;
        }
        .error{
            position:relative;
            top:100px;
            margin-left:20px;
        }
        #main_error{
            margin-bottom:20px;
            font-size:40px;
        }
        #sub-error{ 
            font-size:20px;  
        }
    </style>

</head>
<body>

        <?php require 'view_headerType.php'; ?>

    <div class="error">
        <p id="main_error">ERROR 404</p>
        <p id="sub_error">There is something wrong in your url.</p>
    </div>
</body>
</html>