<?php
session_start();
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
</head>
<link rel="stylesheet" href="../../public/styles/view_admin_addemployee.css">


<body>
 <div class="header">
<?php
require 'view_headertype2.php';
?>
</div>
<div class="main">
<div class="success " id="success">
            <!-- <span>Employee</span> -->
           
            </div>
<div class="choose">
      

        <div class="btn-group">
            <button id="admin">Admin</button>
            <button id="rep">Sales Rep</button>
            <button id="cus">Stock Manager</button>
          </div>
    </div>
<div class="container">
  <span id=msg></span>
<div class="div1" id="div1">
    <h3>Admin Registration</h3>
    <form method="post" action="../register/employee_register?user=admin">
        <div class="content">
         
          <label for="name"><b>Name</b></label><br>
          <input type="text" placeholder="Name" name="name" id="name" required>
          <br>
          <label for="name"><b>User Id&nbsp;&nbsp;&nbsp;</b></label><br>
          <input type="text" placeholder="Name" name="userid" id="userid" required>
          <br>
          <label for="name"><b>Level</b></label><br>
          <select name="level" id="type">
           <option value="Junior">Junior</option>
           <option value="Senior">Senior</option>
          </select>
          <br>
          <label for="name"><b>NIC NO&nbsp;&nbsp; </b></label><br>
          <input type="text" placeholder="nic" name="nic" id="nic" required>
          <br>
          <label for="name"><b>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </label><br>
          <input type="date" placeholder="dob" name="dob" id="dob" required>
          <br>
          <label for="email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label><br>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
      <br>
          <label for="psw"><b>Address&nbsp;</b></label><br>
          <input type="address" placeholder="address" name="add" id="add" required>
      <br>
          <label for="psw-repeat"><b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;</b></label><br>
          <input type="tel" placeholder="Telephone" name="tel" id="tel" required>
          
      
          <button type="submit" class="registerbtn" id="validate" name="submit" onsubmit="validate()">Register</button>
        </div>
        
       
      </form>

</div>
<div class="div2" id="div2">
    <h3>Sales Representative Registration</h3>
    <form action="../register/employee_register?user=rep" method="post">
        <div class="content">
         
          <label for="name"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Name" name="name" id="name" required>
          <br>
          <label for="name"><b>User Id&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Name" name="userid" id="userid" required>
          <br>
          <label for="name"><b>NIC NO&nbsp;&nbsp; </b></label>
          <input type="text" placeholder="nic" name="nic" id="nic" required>
          <br>
          <label for="name"><b>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </label>
          <input type="date" placeholder="dob" name="dob" id="dob" required>
          <br>
          <label for="name"><b>Target&nbsp;&nbsp; </b></label>
          <input type="text" placeholder="Traget" name="target" id="nic" required>
          <br>
           <label for="email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
          <br>
          <label for="psw"><b>Address&nbsp;</b></label>
          <input type="address" placeholder="address" name="add" id="add" required>
           <br>
          <label for="psw-repeat"><b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="tel" placeholder="Telephone" name="tel" id="tel" required>
          
          
      
          <button type="submit" name="submit" class="registerbtn" id="validate">Register</button>
        </div>
        
       
      </form>

</div>
<div class="div3" id="div3">
    <h3>Stock Manager Registration</h3>
    <form method="post" action="../register/employee_register?user=stockmanager" method="post"  > 
        <div class="content">
         
          <label for="name"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Name" name="name" id="name" required>
          <br>
          <label for="name"><b>User Id&nbsp;&nbsp;&nbsp;</b></label>
          <input type="text" placeholder="Name" name="userid" id="userid" required>
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
          <input type="tel" placeholder="Telephone" name="tel" id="tel" >
          <label for="name" id="hid1"><b>&nbsp;&nbsp; </b></label>
          <input type="text" placeholder="nic" name="target" id="hid2" >
          <br>
          
          <button type="submit" name="submit" class="registerbtn" id="validate">Register</button>
        </div>
        
       
      </form>
    </div>

</div>
</div>
<div class="message">
<?php 


    //succuss message here>>>>>>>>
    if(isset($this->added)){

        $check = $this->added;
        if($check == 1){
            echo '<script>
            window.onload=function(){
              document.getElementById("success").style.visibility="visible";
              setTimeout(()=>{document.getElementById("success").style.visibility="hidden";},2000);
            }
            </script>
            ';
        }
        else if($check == 2){
         echo ' <div class="error" id="unsucess">
            <p>Error:Try Again</p>
            </div>';
         }
        unset($check);
    }
  
  
?>
  </div>

<script src="../../public/java script/view_admin_addemployee.js"></script>


</body>
</html>