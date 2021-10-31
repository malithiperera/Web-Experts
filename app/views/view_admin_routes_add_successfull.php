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
            height:300px;
            background-color: red;
            display:flex;
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
            height: 100px;
            background-color: blue;
        }
        .route_add_success_sub_div1 > p{
            margin:5px;
        }
        .route_add_success_sub_div2{
            margin-top: 10px;
            align-self: center;
        }
        button{
            color:black;
        }
    </style>
</head>
<body>
    <div class="route_add_success_container">
        <div class="route_add_success_subcontainer">
            <p id="route_add_success_or_not">success</p>
            <div class="route_add_success_sub_div1">
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