
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>forget</title>
</head>
<body>
    <?php
require 'view_headerType.php';
    ?>
    <div class="container" id="form">
<img src="pass.jpg" alt="" class="avatar">

<h1>Forget Password</h1>
<form action="../login/index.php" onsubmit=" return checkpassword()"  method="POST" autocomplete="off">
<p>New Password</p>
<input type="password" placeholder="Enter strong password" id="psw" autocomplete="off" required>
<!-- <span id="empty"></span> -->
<p>Confirm Password</p>
<input type="password" placeholder="Confirm Your password" id="psw2">
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
<script src="script.js"></script>
</body>
<div class="footer1">
<?php require_once 'view_footer.php'; ?>
</div>
</html>