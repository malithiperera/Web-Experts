<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

    <style>
        body{
            position: relative;
        }
        .home_footer{
            position: absolute;
           width: 100%;
           top: 410px;
        }
        .background{
            width: 100%;
            height: 500px;
            background-image: linear-gradient(#EAF3B0, #1D6D3D);
            opacity: 90%;
        }
        .cow_image{
            position : absolute;
            width: 100%;
            height: 500px;
            top: -420px;
        }
        img{
            position : absolute;
            width: 1519px;
            height: auto;
            
        }
        .getStarted{
            position: absolute;
            top: 70%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .getStarted button{
            font-size: 20px;
            padding : 10px;
            border : 1px solid white;
            background-color: transparent;
            color:white;
            border-radius: 50px;
        }
    </style>

<body>
    <?php require 'view_headerType.php'; ?>

    <div class="cow_image">
        <img src="../../public/images/cow.jpg" alt="">
    </div>

    <div class="background"></div>
    <div class="getStarted">
        <button>GET STARTED</button>
    </div>

    <div class="home_footer">
        <?php require 'view_footer.php'; ?>
    </div>
    
</body>
</html>