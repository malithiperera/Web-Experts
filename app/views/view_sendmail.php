<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget pass</title>

    <style>
*{
    margin: 0;
    padding:0;
    font-family: Arial, Helvetica, sans-serif;
}
body{
    
    background: #e4e1df;

}

.header{
    width: 100%;
    height: 100px;
    margin-top: 0;
    position: relative;
    margin-bottom: 20px;
}

.container{
   
    margin-top:70px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form{
    display: flex;
   
    align-items: center;
    flex-direction: column;
    background-color: #fff;
    height: 400px;
    width: 450px;
    border-radius: 20px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);

}

p{
    margin-top: 20px;
    color: black;
    padding: 20px;
}
input{
    margin: 30px;
    padding: 10px;

    width:80%;
border: none;
outline: none;
border:1px solid rgb(36, 36, 116);
color:white;
background: transparent;

}

input:focus{
    outline: white 1px;
}

button{
    margin: 50px;
    padding: 10px;
    border-radius: 10px;
    cursor: pointer;
    width: 80%;
    height: 40px;
    box-shadow: none;
    background-color: #184A78;
    color: #fff;
    outline: none;
    border: none;
}
button:hover{
    background-color: #D7CEC8;
    color:  #184A78;
}

    </style>
</head>
<body>

    <div class="container">
<div class="form">
    <form action="resetMail" method="post">

<p>
    Enter your user account's verified email address and we will send you a password reset link.
</p>

<input type="text" placeholder="Enter Your email Address" name="email" id="mail">

<button onclick=mail() name='submit'>Send password reset link</button>

</div>


</form>

<?php
if(isset($_SESSION['error'])){
echo $_SESSION['error'];
}
?>

    </div>
</body>
<script>
   
   function mail()
   {
    
    if(document.getElementById("mail").value.length == 0)
{
    alert("enter a email address")
}
else{
       alert("check your email");
}
   }
</script>
</html>