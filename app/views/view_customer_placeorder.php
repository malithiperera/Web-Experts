<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location:http://localhost/web-Experts/public/login/index");
}
?>

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
       padding-right:90px;
       padding-left:90px;
       padding-bottom:20px;
     }
     th{
         background-color:#184A78;
         color: white;
         padding:10px;
         text-transform:uppercase;
     }
td{
  background-color: #fff;
    text-align: center;
    padding:6px;
    color:black;
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
input{
  border:none;
  outline:none;
}
.subcontainer button{
    float: center;
    background-color: #2277B2;
    border:none;
    outline: none;
    width: 10%;
    height: 40px;
    color:#fff;
    border-radius: 10px;
    transition-duration: 0.4s ease;
    margin-left:100px;
  font-size: 16px;
  /* margin: 4px 2px; */
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
.total {
padding:20px;
float:right;
margin:40px;
}
.total input{
  padding:15px;
  border:2px solid black;
}
.detail{
  padding:20px;
}
.detail input{
  height:30px;
  color:green;
  text-align:center;
  font-weight:600;
}
.detail label{
  font-size:20px;
}
    </style>

<script>
        function myfunc(val)
        {
          
          var y= document.getElementById("temp").value;
            var x=val*y;
          document.getElementById("tot").value=x;
        }
    </script>

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
<div class="detail">
  <label for="">Customer Id</label>
  <input type="text" value="<?php echo $_SESSION['userid'] ; ?>"readonly>
  <label for="">Route Id</label>
  <input type="text">
</div>
<table>
  <tr>
    <th>product Id</th>
    <th>Name</th>
    <th>Unit Price</th>
    <th>Discount</th>
    <th>Quantity</th>
    <th>Amount</th>
  </tr>

<?php




 

while($data = mysqli_fetch_array($this->added))
{
?>
  <tr>
    
    <td><?php echo $data['product_id']; ?></td>
    <td><?php echo $data['product_name']; ?></td>
    <td><?php echo $data['price']; ?></td>
    <td><?php echo $data['discount']; ?></td>
 
    <td><input type="text" id="amount"onkeyup="myfunc(this.value);" ></div>
</td>
    <td><input id="tot" readonly></td>
  </tr>	
<?php
}
?>
</table>
<div class="total">
<label for="Total price">Total Price</label>
<input type="text">
</div>

<button>Place Order</button>
</div>
</div>
<!-- <script src="../../public/java script/view_bill.js"></script> -->

</body>
</html>