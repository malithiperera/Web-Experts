<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Login</title>

    <style>
        .errorNotification {
            position: relative;
            top: -300px;
            width: 100%;
            display: flex;
            justify-content: center;
            visibility: hidden;
        }

        .message {
            width: 300px;
            height: 100px;
            background-color: #750000;
            color: white;
            border-radius: 20px;
            text-align: center;
        }

        .symbol {
            margin-top: 10px;
        }
    </style>

</head>

<body>

    <div class="login">
        <div class="log-div">


            <!-- hello -->
        </div>

        <div class="login-div">
            <div class="login-container">

                <div class="title">
                    <h1>Himalee Dairy Products</h1>
                </div>
                <div class="sub-title"><h2>User login</h2></div>


                <form method="post" action="loginSubmit" autocomplete="off">
                    <div class="login-username">
                    <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="User Name">

                    </div>
                    <div class="login-password">
                    <i class="fas fa-unlock-alt"></i>
                        <input type="password" name="password" placeholder="Password">

                    </div>
                    <div class="login-button">
                        <input type="submit" value="Login">
                    </div>
                    <div class="login-forget">
                        <a href="">Forget Password</a><br>
                        <span><i class="fas fa-arrow-left"></i></span><a href="" id="back">Back</a>
                    </div>
                    




                </form>
            </div>

        </div>
    </div>




    <div class="errorNotification" id="errorNotification">
        <div class="message">
            sorry, something wrong with your usernameor password!
            <div class="symbol">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18" cy="18" r="17" fill="#F90B0B" />
                    <path d="M5.6842 5.6842L30.3158 30.3158" stroke="white" stroke-width="2" />
                    <path d="M30.0451 5.41351L5.14288 30.3158" stroke="white" stroke-width="2" />
                    <circle cx="18" cy="18" r="17" stroke="white" stroke-width="2" />
                </svg>

            </div>
        </div>
    </div>


    <?php
    if (isset($_GET['succuss'])) {
        if ($_GET['succuss'] == "no") {

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


    <script>
        function enable() {
            document.getElementById("password").attr("readonly", false);
        }
    </script>


</body>

</html>