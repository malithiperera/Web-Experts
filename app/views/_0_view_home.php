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
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }
        .header{
            position: fixed;
            width: 100%;
            height: 70px;
            background-color: #234857;
            z-index: 1000;
        }
        .title_name{
            margin-left: 10px;
            float: left;
        }
        .company_name{
            font-size: 36px;
            
        }
        .moto{
            font-size: 9px;
            letter-spacing: 5px;
        }
        button{
            float: right;
            margin-top: 13px;
            margin-right: 10px;
            padding: 10px;
            font-size: 18px;
            border-radius: 25px;
            background-color: #234857;
            border-color: white;
        }
        button:hover{
            color: #d89922;
        }
        nav{
            position: fixed;
            background-color: #092a37;
            height: 40px;
            top: 70px;
            width: 100%;
            z-index: 1000;
        }
        a{
            color: white;
            text-decoration: none;
            float: right;
            padding-left: 50px;
            padding-right: 10px;
            padding-top: 10px;
        }
        a:hover{
            color: #d89922;
        }
        .content{
            position: relative;
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(  #d89922, #234857);
            
        }
        #get-started{
            position: absolute;
            top: 80%;
            right:45%;
            background-color: transparent;
        }
       

    </style>
</head>
<body>
    
    <div class="header">
        <div class="title_name">
            <p class="company_name">HIMALEE DIARY PRODUCTS</p>
            <p class="moto">EVERYONE NEEDS MILK, DIARY ALWAYS A GOOD CHOICE</p>
        </div>
        
        <button>sign in</button>
    </div>

    <nav>
        <a href="#">PRODUCTS</a>
        <a href="#">BRANCHES</a>
        <a href="#">CONTACT</a>
        <a href="#">ABOUT</a>
        <a href="#">HELP</a>
    </nav>
    <div class="content">
        <button id="get-started">GET STARTED</button>
    </div>
    

</body>
</html>