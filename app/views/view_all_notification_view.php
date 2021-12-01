<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
    <title>Document</title>

    <style>
        .notification_body {
            margin-top: 50px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .notification_subcontainer {
            width: 80%;
            padding: 50px;
            background-color: #B2BEB5;
            display: flex;
            flex-direction: column;
        }

        .image_div {
            display: flex;
            justify-content: center;
        }

        .message_div {
            margin-bottom: 30px;
        }
        .back_button_button{
            border:none;
            background-color: transparent;
            margin-bottom : 20px;
        }
    </style>

</head>

<body>
    <div class="container1">
        <div class="back_button"><button class="back_button_button" onclick="window.location.href = 'notification';">
                <i class="fas fa-chevron-circle-left fa-2x"></i>
            </button></div>
        <div class="notification_head">
            <div class="from_whom"></div>
            <div class="to"></div>
            <div class="date"></div>
            <div class="time"></div>
            <div class="subject"></div>
        </div>
        <div class="notification_body">
            <div class="notification_subcontainer">

            </div>
        </div>

    </div>


    <!-- <script src="../../public/java script/view_all_notification.js"></script>    -->

    
</body>

</html>