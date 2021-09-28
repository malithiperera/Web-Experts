
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_login.css">
    <title>Login</title>

    <style>
        .errorNotification{
            position:relative;
            top:-300px;
            width:100%;
            display:flex;
            justify-content:center;
            visibility:hidden;
        }
        .message{
            width:300px;
            height:100px;
            background-color:#750000;
            color:white;
            border-radius:20px;
            text-align:center;
        }
        .symbol{
            margin-top:10px;
        }
    </style>

</head>
<body>
    <?php
require 'view_headerType.php';
    ?>
    <div class="login">
    
    <div class="login-div">

 
<div class="title"><h1>User Login</h1></div>
<div class="sub-title">Himalee Dairy Products</div>


<form method="post" action="loginSubmit" autocomplete="off">

<div class="fields">
<div class="username">
    <svg class="svg-icon" viewBox="0 0 20 20">
        <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
    </svg>
    <input type="userame" name="username" class="user-input" placeholder="userame" autofill="false" autocomplete="false">
</div>
<div class="password">
    <svg class="svg-icon" viewBox="0 0 20 20">
        <path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
    </svg>
    <input type="password" name="password" class="pass-input" id="password" placeholder="password" autofill="false" autocomplete="false">
     
</div>
</div>

 <button class="signin-button">Login</button>  
 <div class="link">
     <a href="forgetPassword">Forget Password?</a>
 </div>


</form>
      
</div>
</div>



<div class="errorNotification" id="errorNotification">
    <div class="message">
        sorry, something wrong with your usernameor password!
        <div class="symbol">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="18" cy="18" r="17" fill="#F90B0B"/>
        <path d="M5.6842 5.6842L30.3158 30.3158" stroke="white" stroke-width="2"/>
        <path d="M30.0451 5.41351L5.14288 30.3158" stroke="white" stroke-width="2"/>
        <circle cx="18" cy="18" r="17" stroke="white" stroke-width="2"/>
        </svg>

        </div>
    </div>
</div>
<<<<<<< HEAD

<?php  
    if(isset($_GET['succuss'])){
        if($_GET['succuss'] == "no"){

            echo '
        <script>  
        window.onload = function(){
            document.getElementById("errorNotification").style.visibility = "visible";
            setTimeout(() => {
                document.getElementById("errorNotification").style.visibility = "hidden";
            }, 2000);
        }
        </script>
        ';

        }
    }
        
        
    

?>

        
=======
<script>
   function enable(){
       document.getElementById("password").attr("readonly",false);
   }
</script>
>>>>>>> d1d8260da276944045af7c83fcaaa5935cc63aa9

</body>

</html>