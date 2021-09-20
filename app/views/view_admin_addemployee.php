<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../../public/styles/view_admin_addemployee.css">


<body>
 <div class="header">
<?php
require 'view_headertype2.php';
?>
</div>
<div class="main">
<div class="choose">
        <div class="btn-group">
            <button id="admin">Admin</button>
            <button id="rep">Sales Rep</button>
            <button id="cus">Stock Manager</button>
          </div>
    </div>
<div class="container">
<div class="div1" id="div1">
    <h3>Admin Registration</h3>
    <form method="post" action="register_admin">
        <div class="content">
         
          <label for="name"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Name" name="name" id="name" required>
          <br>
          <label for="name"><b>NIC NO&nbsp;&nbsp; </b></label>
          <input type="text" placeholder="nic" name="nic" id="nic" required>
          <br>
          <label for="name"><b>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </label>
          <input type="date" placeholder="dob" name="dob" id="dob" required>
          <br>
          <label for="email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
      <br>
          <label for="psw"><b>Address&nbsp;</b></label>
          <input type="address" placeholder="address" name="add" id="add" required>
      <br>
          <label for="psw-repeat"><b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="tel" placeholder="Telephone" name="tel" id="tel" required>
          
      
          <button type="submit" class="registerbtn" id="validate" onsubmit="validate()">Register</button>
        </div>
        
       
      </form>

</div>
<div class="div2" id="div2">
    <h3>Sales Representative Registration</h3>
    <form action="/action_page.php" onsubmit=" return validate()">
        <div class="content">
         
          <label for="name"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Name" name="name" id="name" required>
          <br>
          <label for="name"><b>NIC NO&nbsp;&nbsp; </b></label>
          <input type="text" placeholder="nic" name="nic" id="nic" required>
          <br>
          <label for="name"><b>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </label>
          <input type="date" placeholder="dob" name="dob" id="dob" required>
          <br>
          <label for="email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
      <br>
          <label for="psw"><b>Address&nbsp;</b></label>
          <input type="address" placeholder="address" name="add" id="add" required>
      <br>
          <label for="psw-repeat"><b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="tel" placeholder="Telephone" name="tel" id="tel" required>
          
      
          <button type="submit" class="registerbtn" id="validate" onsubmit="validate()">Register</button>
        </div>
        
       
      </form>

</div>
<div class="div3" id="div3">
    <h3>Stock Manager Registration</h3>
    <form action="/action_page.php" onsubmit=" return validate()">
        <div class="content">
         
          <label for="name"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Name" name="name" id="name" required>
          <br>
          <label for="name"><b>NIC NO&nbsp;&nbsp; </b></label>
          <input type="text" placeholder="nic" name="nic" id="nic" required>
          <br>
          <label for="name"><b>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </label>
          <input type="date" placeholder="dob" name="dob" id="dob" required>
          <br>
          <label for="email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
      <br>
          <label for="psw"><b>Address&nbsp;</b></label>
          <input type="address" placeholder="address" name="add" id="add" required>
      <br>
          <label for="psw-repeat"><b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="tel" placeholder="Telephone" name="tel" id="tel" required>
          
      
          <button type="submit" class="registerbtn" id="validate" onsubmit="validate()">Register</button>
        </div>
        
       
      </form>
    </div>

</div>
</div>
<?php 

    //succuss message here>>>>>>>>
    if(isset($this->added)){
        if($this->added == 1){
            echo "succussfully added";
        }
        else if($this->added == 2){
            echo "something error";
        }
        unset($this->added);
    }
    
?>

<script src="../../public/java script/view_admin_addemployee.js"></script>


</body>
</html>