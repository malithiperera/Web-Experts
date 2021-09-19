<!DOCTYPE html>
<html>
<head>
  <title>Bill</title>
  <style>
        
       
        body{
            background-color: #e4e1df;
            position: absolute;
         
          
        }
        header{
          top:0;
          position: absolute;
          z-index:4000;
        }
        .container{
      
          margin-top:100px;
           display: flex;
           justify-content: center;
           align-items: center;
        
           position: relative;
        }
     table{
       width: 100%;
       padding:20px;
     }
     th{
         background-color:#184A78;
         color: white;
         padding:10px;
         text-transform:uppercase;
     }
td{
  background-color: rgb(88, 88, 88);
    text-align: center;
    padding:6px;
    color:#fff;
    font-size:20px;

}
h2{
text-align:center;
padding:5px;
font-size:30px;
}
.subcontainer{
  width:100vw;
  /* background:red; */
  height:100vw;
  /* display:flex;
 
  
  flex-direction:column; */
  flex-wrap:wrap;

}
.subcontainer button{
    float: center;
    background-color: #2277B2;
    border:none;
    outline: none;
    width: 30%;
    height: 40px;
    color:#fff;
    border-radius: 10px;
    transition-duration: 0.4s ease;
    /* display: inline-block; */
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; 
  transition-duration: 0.4s;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
button:hover{
    background-color: #D7CEC8;
    color:  #184A78;
    cursor: pointer;
   
}
button:active {
  
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
    </style>

</head>
<body>



<section>
<header>
<?php
require 'view_headertype2.php';
?>
</header>
<div class="container">
    <div class="subcontainer">
<h2>Bill</h2>

<table>
  <tr>
    <th>product Id</th>
    <th>Name</th>
    <th>Unit Price</th>
    <th>Quantity</th>
    <th>Total price</th>
  </tr>

<?php

$servername="localhost";
$username="root";
$password="";
$dbname="Himalee";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection Failed" .$conn->connect_error);
}

$records = mysqli_query($conn,"SELECT product_id,name,unit_price FROM product"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td>.<?php echo $data['product_id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><div id="unitprice"><?php echo $data['unit_price']; ?></div></td>
    <td><div contenteditable="true" id="amount"></div>
</td>
    <td><div></div id="total">800</td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($conn); // Close connection ?>
<button>Place Order</button>
</div>
</div>

<script>
function myfunc() {
    
//   var tot=document.getElementById("total").value;
 
  var myInput = document.getElementById("amount");
var letter = document.getElementById("unitprice");



}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("total").value=900;
}




</script>
</body>
</html>