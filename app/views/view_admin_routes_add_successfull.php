<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .route_add_success_container{
            width:400px;
            height:350px;
            background-color: #EE5353;
            display:flex;
            border-radius: 10px;
            justify-content: center;
        }
        .route_add_success_subcontainer{
            display: flex;
            flex-direction: column;
        }
        .route_add_success_subcontainer > p{
            text-align: center;
            margin-top:20px;
            font-size: 30px;
        }
        .route_add_success_sub_div1{
            margin-top:20px;
            width: 300px;
            height: 200px;
            background-color:rgb(200, 198, 198);
            border-radius: 10px;
        }
        .route_add_success_sub_div1 > p{
            margin:5px;
        }
        .route_add_success_sub_div2{
            margin-top: 10px;
            align-self: center;
        }
        button{
            color:#EE5353;
            width: 100px;
            border-radius: 5px;
            height: 40px;
            margin-bottom: 10px;
        }
        #route_add_success_or_not{
            color: #fff;
            text-align: center;
            font-size: 30px;
        }
        .icon-success i{
            font-size: 60px;
            color: #fff;
            margin-left: 120px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="route_add_success_container">
        <div class="route_add_success_subcontainer">
           <div class="icon-success" id="icon-success"> <i class="far fa-times-circle"></i></div>
            <div class="route_add_success_sub_div1">
            <p id="route_add_success_or_not">success</p>
                <p id="route_add_success_route_name">Route Name : </p>
                <p id="route_add_success_destination">Destination : </p>
                <p id="route_add_success_rep_id">Rep Id : </p>
            </div>
            <div class="route_add_success_sub_div2">
                <button id="route_add_confirm">Done</button>
            </div>
        </div>
    </div>
</body>
</html>