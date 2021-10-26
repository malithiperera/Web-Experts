<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .remove_user_container{
            position:fixed;
            top:100px;
            width:100%;
            display:flex;
            justify-content: center;
        }
        .remove_user_message {
            width: 600px;
            height: 600px;
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
            border-radius: 20px;
        }
        .remove_user_position input,
        .remove_user_userid input,
        .remove_user_purpose input{
            text-align:center;
        }

    </style>
</head>

<body>
    <div class="remove_user_container">
        <div class="remove_user_message">
            <div class="remove_user_header">
                Remove User...
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
                <input type="text" id="remove_user_purpose_input">
            </div>

            <div class="remove_user_remove">
                <button>Remove</button>
            </div>

        </div>
    </div>

</body>

</html>