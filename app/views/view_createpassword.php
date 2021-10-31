<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>forget</title>
    <link rel="stylesheet" href="../../public/styles/view_forgetpassword.css">
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
        
    </div>
    <script src="../../public/java script/view_forgetpassword.js"></script>

</body>

</html>