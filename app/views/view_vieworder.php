<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/styles/view_vieworder.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
<div class="header">
<?php
require 'view_headertype2.php';
?>
</div>
    <div class="container">

    <div class="addnew">
        <div class="info">
        <label for="">Order Id:</label>
        <input type="text" class="order_id" readonly>
        <label for="">Customer Id:</label>
        <input type="text" class="order_id" readonly>
        <label for="">Route Id:</label>
        <input type="text" class="order_id" readonly>
        </div>
        <div class="data_form">
            <div class="serach_product">
            <input type="text" id="product_name" placeholder="Search Product" onkeyup="fetchText(this.value)">
            <div>
            <ul class="suggestions">

            </ul>
            </div>
            </div>
    
            <input type="text" id="unit_price" placeholder="unit price">
            <input type="text" id="discount" placeholder="discount">
            <input type="text" id="quantity" placeholder="quantity" onkeyup="cal_tot()">
            <input type="text" id="total_price" placeholder="total price">
            <button id="new" onclick="add_product()"><i class="fas fa-plus"></i>Add New</button>
        </div>

    </div>

         <div class="order">
             <table>
                 <tr>
                 <th>Product Id</th>
                 <th>Product Name</th>
                 <th>Unit Price</th>
                 <th>Discount</th>
                 <th>Quantity</th>
                 <th>Amount</th>
                 <th colspan="2"></th>
                 </tr>
             
           <?php  $x=1;
           while($x<8){   ?>
           <tr>
           <td>001</td>
           <td>001</td>
           <td>001</td>
           <td>001</td>
           <td>001</td>
           <td>001</td>
           <td><button class="edit"><a>Edit</a></button></td>
           <td><button class="delete"><a>Delete</a></button></td>
           
           </tr>
          



          <?php  $x++;
          } ?>

                               <tr class="tot">
                                <td colspan="7">Total</td>
                                <td id="total_of_all_prices">12000</td>
                            </tr> 


          </table>

          </div>

<div class="save">
    <button id="save_but">Save</button>
</div>


    </div>

</body>
</html>