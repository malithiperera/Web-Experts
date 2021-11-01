<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .removeuser{
            position:fixed;
            top:100px;
            width:100%;
            display:flex;
            justify-content: center;
        }
        .remove_user_message {
            width: 500px;
            height: 400px;
            background-color: white;
            border-radius:20px;
            border:1px solid #184A78;
        }
        .remove_user_header,
        .remove_user_position label,
        .remove_user_position input,
        .remove_user_userid label,
        .remove_user_userid input,
        .remove_user_purpose label,
        .remove_user_purpose input,
        .remove_user_remove button{
            color:#184A78;
            padding:10px;
            margin:10px;
            border-radius: 10px;
        }
        .remove_user_position input,
        .remove_user_userid input,
        .remove_user_purpose input{
            text-align:center;
        }
        #remove_button{
            margin-left:200px;
            width:200;
            height:40px;
            padding: 10px;
            background-color: rgb(220,53,69);
            color: #fff;
            outline: none;
            font-size: 14px;
            border:none;
            padding-top: 6px;
            margin-top: 50px;
        }
        textarea{
            color: #184A78;
            padding-left: 10px;
        }
        .remove_user_purpose label{
            position: relative;
            top:-40px;
        }
        #remove_user_position_input{
            position: relative;
            left:-8px;
        }
        h2{
            color: black;
            text-align: center;
        }
        #remove_button i{
            padding-right: 8px;
        }
    </style>
</head>

<body>
    
        <div class="remove_user_message">
            <div class="remove_user_header">
               <h2>Remove User</h2> 
            </div>

            <div class="remove_user_position">
                <label for="">Position : </label>
                <input type="text" id="remove_user_position_input">
            </div>

            <div class="remove_user_userid">
                <label for="">User Id : </label>
                <input type="text" name="" id="remove_user_userid_input">
            </div>

            <div class="remove_user_purpose">
                <label for="">Purpose : </label>
                <textarea id="remove_user_purpose_input" name="w3review" rows="4" cols="50"></textarea>
            </div>

            <div class="remove_user_remove">
                <button id="remove_button"><i class="fas fa-trash-alt"></i>Remove</button>
            </div>

        </div>
    

</body>

</html>