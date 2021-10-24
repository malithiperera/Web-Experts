<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CusReg.css">
    <link rel="stylesheet" href="../../public/styles/view_customer_registration.css">
    <title>CustomerRegistration</title>
</head>

<body>
<div class="header">
    <?php
        require 'view_headertype2.php';
        ?>
    
    </div>
    <div class="container">
        <div class="sub-container">
            <form action="../register/register_customer" method="post">
            <div class="title1">Customer Registration</div>
            <div class="input-fields">
            <div class="name">
            <div class="n1"><label for="FirstName">First Name</label><input type="text" name="FirstName" id="FirstName"
                class="f">
            </div>
            <div class="n2"><label for="LastName">Last Name</label><input type="text" name="LastName" id="LastName"
                class="l">
            </div>  
            </div>
            </div>
            <div class="input-fields"><label for="email">Email</label><input type="email" name="email" id="email"
                    class="inputf">
            </div>
            <div class="input-fields"><label for="email">User Id</label><input type="text" name="userid" id="email"
                    class="inputf">
            </div>
            <div class="input-fields"><label for="date">Date of Birth</label><input type="date" name="date" id="date"
                class="inputf">
            </div>
            <div class="input-fields"><label for="address">Address</label><input type="text" name="address" id="address"
                    class="inputf">
            </div>
            <div class="input-fields"><label for="shopName">Shop Name</label><input type="text" name="shopName" id="shopName"
                    class="inputf">
            </div>
            <div class="input-fields"><label for="route">Route</label><input type="text" name="route" id="route"
                class="inputf">
        </div>
        
            
            <div class="input-fields"><input type="submit" value="Confirm" id="confirm" name="submit"></div>
        </div>
        </form>
        
    </div>
    <div class="input-fields"><input type="submit" value="Back" id="back" name="submit"></div>
</body>

</html>