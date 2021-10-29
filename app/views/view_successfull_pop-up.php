<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    
    <title>pop-up</title>
    <style>
        .pop-sub{
            width:400px;
            height: 250px;
        }
        .up-pop{
            width:100%;
            background-color: #5DA423;
            height: 100px;
            display: flex;
            justify-content: center;
        }
        .down-pop{
            background-color: rgb(200, 198, 198);
            height: 150px;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .right-pop i{
            font-size: 70px;
            color: #fff;
            padding: 15px;
        }
        h3{
            text-align: center;
            font-size: 25px;
        }
        span{
            text-align: center;
        }
        .button-pop{
            margin: auto;
  width: 50%;
  display: flex;
  justify-content: center;


        }
        button{
            background-color: #5DA423;
            float: center;
            width: 100px;
            height: 30px;
            border-radius: 20px;
            outline: none;
            border:none;
            font-weight: 700;
            cursor: pointer;

            

        }
    </style>



</head>
<body>
   
        <div class="pop-sub">
            <div class="up-pop">
              
                <div class="right-pop">
                    <i class="far fa-check-circle"></i>
                </div>

            </div>
            <div class="down-pop">
               <h3>Success!!</h3>
               <span>Employee added Successfully!</span>

               <div class="button-pop" onclick="hide_popup()"><button>Done</button></div> 

            </div>

     




    </div>
    
</body>
</html>