<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">


    <title>pop-up</title>
    <style>
        
        .pop-sub {
            width: 400px;
            height: 400px;
            border-radius: 10px;
        }

        .up-pop {
            width: 100%;
            background-color: #5DA423;
            height: 100px;
            display: flex;
            justify-content: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .down-pop {
            background-color: rgb(200, 198, 198);
            height: 250px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .right-pop i {
            font-size: 70px;
            color: #fff;
            padding: 15px;
        }

        h3 {
            text-align: center;
            font-size: 25px;
        }

        span {
            text-align: center;
        }

        .button-pop {
            margin: auto;
            width: 50%;
            display: flex;
            justify-content: center;


        }

        button {
            background-color: #5DA423;
            float: center;
            width: 100px;
            height: 30px;
            border-radius: 20px;
            outline: none;
            border: none;
            font-weight: 700;
            cursor: pointer;

        }

        h4 {
            text-align: center;
        }

        label {
            text-align: center;
            font-weight: 700;

        }
    </style>



</head>

<body>
    <div class="pop-container">
        <div class="pop-sub">
            <div class="up-pop">

                <div class="right-pop">
                    <i class="far fa-check-circle"></i>
                </div>

            </div>
            <div class="down-pop">
                <h3>Order Completed Successfully!!</h3>
                <h4>Order details</h4>
                <span><label for="">Order No:</label> <span id="order_id">001</span></span>
                <span><label for="">Order Date</label> <span id="order_date">2021.10.09</span></span>
                <span><label for="">Total Amount:</label> <span id="order_amount">12000</span></span>
                <span id="order_id"></span>

                <div class="button-pop"><button>Done</button></div>

            </div>

        </div>




    </div>

</body>

</html>