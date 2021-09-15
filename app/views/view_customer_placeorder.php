<!DOCTYPE html>
<html>
<head>
  <title>Bill</title>
  <style>
        
        /* *{
            margin: 0;
            padding: 0;
            display: inline-block;
        } */
        body{
            background-color: #e4e1df;
        }
        .container{
            
           display: flex;
           justify-content: center;
           align-items: center;
        }
     table{
       width: 600px;
     }
     th{
         background-color:#184A78;
         color: white;
     }
td{
    background-color: #2277B2;
    text-align: center;

}

.subcontainer button{
    float: center;
    background-color: #2277B2;
    border:none;
    outline: none;
    width: 30%;
    height: 40px;
    color:#fff;
    border-radius: 20px;
    transition-duration: 0.4s;
    display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
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