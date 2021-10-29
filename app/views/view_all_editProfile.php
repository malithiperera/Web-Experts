<?php session_start(); 

 if(!isset($_SESSION['username'])){
     header("Location:http://localhost/web-Experts/public/login/index");
 }

?>
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
            background-color:#ffffff;
        }
        .header{
            z-index: 3000;
        }
        .container{
            position: relative;
            top: 120px;
            width: 100%;
            display: flex;
            justify-content: center;
            /* flex-direction: column; */
            border-radius:5px;
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
           
            border-radius:5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }
        .subcontainer1{
            position: relative;
            margin-left: 300px;
            width: 700px;
            height: 30px;
            border-radius:5px;
            display:flex;
            flex-direction:column;
            justify-content:center; 
        
        }
        .subcontainer1 p{
            color: #184A78;
            margin-top: 5px;
            font-weight:600;
            font-size:20px
        }
        .subcontainer2{
            margin: 10px;
            margin-top:50px;
            width: 700px;
            height: hidden;
           
            
            background-color: #D8E9EB;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            display: flex;
            border-radius:10px;
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
            padding:15px;
        }
        .inputs{
            margin-top: 20px;
            display: flex;
            flex-direction: column;   
        }
        .photo{
            margin-left:10px;
            height:60px;
            width:60px;
            background-color: transparent;
            border-radius:50%;
            border:2px solid black;
        }
        .photo img{
            height:60px;
            width:60px;
            border-radius:50%;
        }
        .name p{
            display:flex;

        }
        .inputs input{
            color: #184A78;
            margin-bottom: 22px;
            margin-top: 1px;
            padding: 15px;
            background-color: transparent;
            border: none;
            outline: none;
        }
     input.editclass{
            background:white;
            /* padding:5px; */
        }
        .edit_button{
            float: right;
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        
            cursor:pointer;
        }
        .edit_button a {
            color: #184A78;
            margin-bottom: 22px;
            border: transparent;
            outline: transparent;
            background-color: transparent;
            padding:15px;
            margin-top: 2px;   
        }
        i{
            color: #184A78;
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
            width: 200px;
            height: 40px;
            
            margin-top: 5px;
            border-radius: 5px;
           
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
            <div class="photo"><img src="../../public/images/profile.png" alt=""> </div>
            <div class="name">
                <p><?php echo $_SESSION['username'] ;?></p>
    </div>
            </div>
            <form action="../profile/save_profile" method="POST">
            <div class="subcontainer2">
               
                <div class="labels">
                    <label for="name">NAME : </label>
                    <label for="email">EMAIL : </label>
                    <!-- <label for="dob">DATE OF BIRTH : </label> -->
                    <label for="tele">TELE : </label>
                    <label for="nic">NIC : </label>
                    <label for="address">ADDRESS : </label>
                </div>
                <div class="inputs">
                    <input type="text" name="name" id="name" value="Example Name" readonly>
                    <input type="text" name="email" id="email" value="Example@gmail.com" readonly>               
                    <!-- <input type="text" name="dob" id="dob" value="2020.02.20" readonly>                -->
                    <input type="text" name="tele" id="tele" value="077-1234567" readonly>                
                    <input type="text" name="nic" id="nic" value="1234567890v" readonly>                
                    <input type="text" name="address" id="address" value="Kandy" readonly>
                </div>
                <div class="edit_button">
                <a onclick="name()"></a>
                    <a onclick="email()"><i class="fas fa-pen"></i></a>
                    <!-- <button onclick="dob()"><i class="fas fa-pen"></i></button> -->
                    <a onclick="tele()"><i class="fas fa-pen"></i></a>
                    <a onclick="nic()"><i class="fas fa-pen"></i></a>
                    <a onclick="address()"><i class="fas fa-pen"></i></a>
                   
              
                </div>
               
            </div>
            <div class="subcontainer3">
                <button name="submit">save</button>
            </div>
           
        </div>
    </div>
    </form>
    <script>
        function name_change(){
            document.getElementById('name').removeAttribute('readonly');
            document.getElementById('name').classList.add("editclass");
            
        }
        function email(){
            document.getElementById('email').removeAttribute('readonly');
            document.getElementById('email').classList.add("editclass");
        }
        function dob(){
            document.getElementById('dob').removeAttribute('readonly');
            document.getElementById('dob').classList.add("editclass");
        }
        function tele(){
            document.getElementById('tele').removeAttribute('readonly');
            document.getElementById('tele').classList.add("editclass");
        }
        function nic(){
            document.getElementById('nic').removeAttribute('readonly');
            document.getElementById('nic').classList.add("editclass");
        }
        function address(){
            document.getElementById('address').removeAttribute('readonly');
            document.getElementById('address').classList.add("editclass");
        }
        window.onclick = function(event) {
  if (event.target == name) {
    document.getElementById('address').classList.remove("editclass");
    //   // sidebar.style.opacity = "100%";
    //   blur.style.opacity = "100%";
  }
}

function fill_details_profile() {
      fetch('http://localhost/web-Experts/public/profile/edit_profile')
        .then(response => response.json())
        .then(data => {
         
          console.log(data);
          document.getElementById('name').value=data[0]['name'];
          document.getElementById('email').value=data[0]['email'];
          document.getElementById('tele').value=data[0]['tel'];
          document.getElementById('nic').value=data[0]['nic'];
          document.getElementById('address').value=data[0]['address'];
        });


    }

    fill_details_profile();



    </script>

</body>
</html>