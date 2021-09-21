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
        .container{
            position: relative;
            top: 100px;
            width: 100%;
            display: flex;
            justify-content: center;
            /* flex-direction: column; */
            flex-wrap: wrap;
            z-index: 1;
        }
        .container1{
            width: 720px;
            height: 600px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .subcontainer1{
            margin: 10px;
            width: 700px;
            height: 30px;
            /* background-color: #D8E9EB; */
            text-align: center;
            flex-wrap: wrap;
        }
        .subcontainer1 p{
            color: #184A78;
            margin-top: 5px;
        }
        .subcontainer2{
            margin: 10px;
            width: 700px;
            height: 450px;
            background-color: #D8E9EB;
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }
        .labels{
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }
        .labels label{
            margin-bottom: 20px;
            color: #184A78;
        }
        .inputs{
            margin-top: 20px;
            display: flex;
            flex-direction: column;   
        }
        .inputs input{
            color: #184A78;
            margin-bottom: 22px;
            margin-top: 1px;
            background-color: transparent;
            border: none;
            outline: none;
        }
        .edit_button{
            float: right;
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        .edit_button button{
            color: #184A78;
            margin-bottom: 22px;
            border: transparent;
            outline: transparent;
            background-color: transparent;
            margin-top: 2px;   
        }
        .edit_button button:hover{
           color: red;
        }
        .subcontainer3{
            margin: 10px;
            width: 700px;
            height: 50px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .subcontainer3 button{
            background-color: #184A78;
            width: 70px;
            height: 40px;
            margin-top: 5px;
            border-radius: 20px;
           
        }
        @media screen and (max-width: 720px) {
            .container{
                flex-direction: column;
            }
            .subcontainer1, .subcontainer2, .subcontainer3{
                width: 95%;
                
            }
            .container1{
                width: 100%;
            }
            
        }
    </style>
</head>
<body>
    <div class="header">
        <?php require 'view_headerType2.php'; ?>
    </div>
    

    <div class="container">
        <div class="container1">
            <div class="subcontainer1">
                <p>example@gmail.com</p>
            </div>
            <div class="subcontainer2">
                <div class="labels">
                    <label for="name">NAME : </label>
                    <label for="email">EMAIL : </label>
                    <label for="dob">DATE OF BIRTH : </label>
                    <label for="tele">TELE : </label>
                    <label for="nic">NIC : </label>
                    <label for="address">ADDRESS : </label>
                </div>
                <div class="inputs">
                    <input type="text" name="name" id="name" value="Example Name" readonly>
                    <input type="text" name="email" id="email" value="Example@gmail.com" readonly>               
                    <input type="text" name="dob" id="dob" value="2020.02.20" readonly>               
                    <input type="text" name="tele" id="tele" value="077-1234567" readonly>                
                    <input type="text" name="nic" id="nic" value="1234567890v" readonly>                
                    <input type="text" name="address" id="address" value="Kandy" readonly>
                </div>
                <div class="edit_button">
                    <button onclick="name_change()">edit</button>
                    <button onclick="email()">edit</button>
                    <button onclick="dob()">edit</button>
                    <button onclick="tele()">edit</button>
                    <button onclick="nic()">edit</button>
                    <button onclick="address()">edit</button>
                </div>
               
            </div>
            <div class="subcontainer3">
                <button>save</button>
            </div>
        </div>
    </div>

    <script>
        function name_change(){
            document.getElementById('name').removeAttribute('readonly');
        }
        function email(){
            document.getElementById('email').removeAttribute('readonly');
        }
        function dob(){
            document.getElementById('dob').removeAttribute('readonly');
        }
        function tele(){
            document.getElementById('tele').removeAttribute('readonly');
        }
        function nic(){
            document.getElementById('nic').removeAttribute('readonly');
        }
        function address(){
            document.getElementById('address').removeAttribute('readonly');
        }
    </script>

</body>
</html>