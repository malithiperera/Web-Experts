
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CustomerHome</title>
    <link rel="stylesheet" href="../../public/styles/view_customer_orderspayments.css">
  <script src="https://kit.fontawesome.com/1681f9ce3f.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="header">
  <?php
require 'view_headertype2.php';
 ?>
  </div>
<div class="container">
<!-- <div class="sub-container"> -->
<div class="orders">
    <h3>My Orders</h3>
    <table>
  <tr>
    <th>Order No</th>
    <th>Amount</th>
    <th>Date</th>
    <th colspan="2" >Action</th>
  </tr>
  <tr>
    <td><a href="#">Order1</a></td>
    <td>Rs.700</a></td>
    <td>2019.7.9</td>
    <td><a href="edit" class="edit">Edit</a></td>
    <td><a href="edit" class="delete">Delete</a></td>
  </tr>
  <tr>
    <td>Order1</td>
    <td>Rs.700</td>
    <td>2019.7.9</td>
    <td><a href="edit" class="edit">Edit</a></td>
    <td><a href="edit" class="delete">Delete</a></td>
  </tr>
  <tr>
    <td>Order1</td>
    <td>Rs.700</td>
    <td>2019.7.9</td>
    <td><a href="edit" class="edit">Edit</a></td>
    <td><a href="edit" class="delete">Delete</a></td>
  </tr>
  
  
</table>

</div>


<div class="payment">
    <h3>My Payments</h3>
    <table>
  <tr>
    <th>Order No</th>
    <th>Amount</th>
    <th>Delivery No</th>
    <th>date</th>
    <th>Pay now</th>
  </tr>
  <tr>
    <td>Order1</td>
    <td>Rs.700</td>
    <td>Del01</td>
    <td>2019.7.9</td>
    <td><a href=""><i class="fas fa-credit-card"></i></td>
  </tr>
  <tr>
    <td>Order1</td>
    <td>Rs.700</td>
    <td>Del01</td>
    <td>2019.7.9</td>
    <td><a href=""><i class="fas fa-credit-card"></i></td>
  </tr>
  <tr>
    <td>Order1</td>
    <td>Rs.700</td>
    <td>Del01</td>
    <td>2019.7.9</td>
    <td><a href=""><i class="fas fa-credit-card"></i></td>
  </tr>
  <tr>
    <td>Order1</td>
    <td>Rs.700</td>
    <td>Del01</td>
    <td>2019.7.9</td>
    <td><a href=""><i class="fas fa-credit-card"></i></td>
  </tr>
  
  
</table>

</div>



<!-- </div> -->










</div>   








<div class="btn">
<button><a href="../customer/back_cus_home">Back</a></button>
</div>

 
</body>

</html>