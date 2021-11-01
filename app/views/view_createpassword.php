<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>forget</title>
    <link rel="stylesheet" href="../../public/styles/view_forgetpassword.css">
    <style>
        .success_failed {
            position: fixed;
            top: 250px;
            width: 100%;
            display: flex;
            justify-content: center;}
           

        .success_failed_message {
            border-radius: 10px;
        }

        .sub_div1 {
            width: 400px;
          border-top-left-radius: 10px;
          border-top-right-radius: 10px;
            height: 80px;
            background-color: #5DA423;
            color: #fff;
            display: flex;
            justify-content: center;
           
        }
.sub_div1 i{
    font-size: 50px;
    margin-top: 10px;
}
        .sub_div2 {
            width: 400px;
            height: 200px;
            border-bottom-left-radius: 10px;
          border-bottom-right-radius: 10px;
            background-color: rgb(200, 198, 198);
            display: flex;
            justify-content: center;
        }

        .details {
            /* width: 100px; */
            display: flex;
            flex-direction: column;
        }

        .sub {
            margin-top: 8px;
            align-self: center;
        }

        #done_button {
            width: 100px;
            height: 40px;
            background-color: #5DA423;
            outline: none;
            border:none;
            font-size: 20px;
            cursor: pointer;
            /* margin-top: 160px;
            margin-left: 170px; */
            color: white;
        }
        #form{
            opacity: 20%;
        }
        #verified{
            text-align: center;
        }
    </style>

</head>

<body>
    <?php
    require 'view_headerType.php';
    ?>
    <div class="container" id="form">
        <img src="../../public/images/password.jpg" alt="" class="avatar">

        <h1>Create Password</h1>
        <form action="confirmPassword" method="POST" autocomplete="off">

            <p>New Password</p>
            <input type="password" name="newPassword" placeholder="Enter strong password" id="psw" autocomplete="off" required>
            <!-- <span id="empty"></span> -->
            <p>Confirm Password</p>
            <input type="password" name="confirmPassword" placeholder="Confirm Your password" id="psw2">
            <p id="messege"></p>
            <input type="submit" name="submit" value="Confirm">

        </form>
        <div id="message">
            <h4>Password must contain the following:</h4>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
    </div>

    <div class="success_failed">
        <div class="success_failed_message">
            <div class="sub_div1">
            <i class="far fa-check-circle"></i>
            </div>
            <div class="sub_div2">
                
                <div class="details">
                <h3 id='verified'>Account Verified Success!!</h3><br>
                    <div class="sub">
                        <p id="name">Name : </p>
                    </div>
                    <div class="sub">
                        <p id="user_id">User Id : </p>
                    </div>
                    <div class="sub">
                        <p id="email">Email : </p>
                    </div>
                    <div class="sub">
                        <button id="done_button" onclick="done()">Done..</button>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <script src="../../public/java script/view_forgetpassword.js"></script>

    <script>

        let name = document.getElementById('name');
        let user_id = document.getElementById('user_id');
        let email = document.getElementById('email');

        let form = document.getElementById('form');
        let success_failed = document.querySelector('.success_failed');

        let success = '<?php echo $this->success; ?>';

        if (success == 1) {
            let data_set_name = '<?php echo $this->data_set['name']; ?>';
            let data_set_user_id = '<?php echo $this->data_set['user_id']; ?>';
            let data_set_email = '<?php echo $this->data_set['email']; ?>';
            
            name.innerHTML += data_set_name;
            user_id.innerHTML += data_set_user_id;
            email.innerHTML += data_set_email;

            console.log(data_set_name);
        }
        else{
            name.innerHTML = '';
            user_id.innerHTML = '';
            email.innerHTML = '';
        }

        const done = () =>{
            form.style.opacity = '100%';
            success_failed.style.visibility = "hidden";
        }
    </script>

</body>

</html>