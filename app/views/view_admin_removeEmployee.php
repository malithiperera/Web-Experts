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
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            background-color:#D8E9EB; 
        }
        .header{
            z-index: 3000;
        }
        .page{
            position: relative;
            top: 100px;
            display: flex;
            flex-direction: column;
            z-index: 1;
        }
        button{
            background-color: #184A78;
            padding: 10px;
            border-radius: 20px;
        }
        .container{
            display: flex;
            justify-content: center;
            z-index: 1;
        }
        .container1{
            position: relative;
            width: 500px;
            height: 500px;
            background-color: white;
            margin: 10px;
            color: #184A78;
            z-index: 1;
        }
        .container1 p{
            margin-top: 10px;
            margin-left: 10px;
            color: #184A78;
        }
        .container2{
            position: relative;
            width: 500px;
            height: 500px;
            background-color: white;
            margin: 10px;
            z-index: 1;
        }
        .container2 input{
            color: #184A78;
            border-radius: 20px;
            height:20px;
            width:120px;
            outline: none;
            padding-left: 10px;
        }
        .category{
            float: left;
            margin-top: 20px;
            margin-left: 20px;
        }
        .user_id{
            float: right;
            margin-top: 20px;
            margin-right: 20px;
        }
        .purpose{
            margin-top: 100px;
            margin-left: 20px;
        }
        .purpose input{
            width: 250px;
            
        }
        .container2 p{
            position: relative;
            color:  #184A78;
        }
        .container2 button{
            position: absolute;
            top: 450px;
            left: 20px;
        }
        #back{
            align-self:flex-end;
            margin-top: 20px;
            margin-right: 40px;
            margin-bottom: 20px;
            padding-left: 10px;
            padding-right: 10px;
        }
        @media screen and (max-width: 870px) {
        .container{
            flex-wrap: wrap-reverse;
        }
        .suggestion_remove_employee{
            width: 100px;
            height: 100px;
            background-color: blue;
        }
}

    </style>
</head>
<body>

    <div class="header">
         <?php require 'view_headerType2.php'; ?>
    </div>
    
    <div class="page">

    
    <div class="container">
        <div class="container1">
            <p>information here>>>>></p>
        </div>
        <div class="container2">
            <div class="category">
                <p>CATEGORY</p>
                <input type="text" id="category" name="category">
            </div>
            
            <div class="user_id">
                <p>USER ID</p>
                <input type="text" id="user_id" name="user_id">
                
            </div>
            
            <div class="purpose">
                <p>PURPOSE</p>
                <input type="text" id="purpose" name="purpose">
            </div>
            <button>REMOVE</button>
            
        </div>
    </div>
    <button id="back">BACK</button>



</div>
</body>
</html>