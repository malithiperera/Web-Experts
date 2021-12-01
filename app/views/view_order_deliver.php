<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/styles/view_order_deliver.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <style>
        .qty{
            border:none;
            text-align: center;
        }
    </style>

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
                <div class="detail">
                <i class="fas fa-shopping-cart"></i>
                <label for="">Order Id:</label>
                
                <input type="text" class="order_id" readonly>
                </div>
                <div class="detail">
                <i class="fas fa-house-user"></i>
                <label for="">Customer Id:</label>
                <input type="text" class="cus_id" readonly>
                </div>
                <div class="detail">
                <i class="fas fa-map-marker-alt"></i>
                <label for="">Route Id:</label>
                <input type="text" class="route_id" readonly>
                
                </div>
                
            </div>
            <div class="data_form">
                <div class="serach_product">
                    <!-- <input type="text" id="product_name" placeholder="Search Product" onkeyup="fetchText(this.value)"> -->
                    <div>
                        <ul class="suggestions">

                        </ul>
                    </div>
                </div>

                <!-- <input type="text" id="unit_price" placeholder="unit price">
                <input type="text" id="discount" placeholder="discount">
                <input type="text" id="quantity" placeholder="quantity" onkeyup="cal_tot()">
                <input type="text" id="total_price" placeholder="total price">
                <button id="new" onclick="add_product()"><i class="fas fa-plus"></i>Add New</button> -->
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
                 
                </tr>

                <tbody class="pending_order_table">

                </tbody>

                <!-- <?php $x = 1;
                        while ($x < 8) {   ?>
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




                <?php $x++;
                        } ?> -->

                <tr class="tot">
                    <td colspan="5">Total</td>
                    <td id="total_of_all_prices">25080</td>
                </tr>


            </table>

        </div>

        <div class="save">
            <button id="save_but">Save</button>
        </div>


    </div>

    <script>
        // fill header details
        var order_id_input = document.querySelector('.order_id');
        var cus_id_input = document.querySelector('.cus_id');
        var route_id_input = document.querySelector('.route_id');
        var pending_order_table = document.querySelector('.pending_order_table');
        var qty = document.querySelector('qty');
        var total_of_all_prices = document.getElementById('total_of_all_prices');

        var order_id = '<?php echo $_GET['order_id'] ?>';
        var cus_id = '<?php echo $_GET['cus_id'] ?>';
        var route_id = '<?php echo $_GET['route_id'] ?>';

        order_id_input.value = order_id;
        cus_id_input.value = cus_id;
        route_id_input.value = route_id;

        // fill table
        const fill_table = () => {
            var data_set = {
                order_id: order_id
            }

            fetch('http://localhost/web-Experts/public/customer/fill_pending_order_table', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },

                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {
                    for (i = 0; i < data.length; i++) {
                        pending_order_table.innerHTML += `
                        
                        <tr>
                        <td>${data[i]['product_id']}</td>
                        <td>${data[i]['product_name']}</td>
                        <td>${data[i]['price']}</td>
                        <td>${data[i]['discount']}</td>
                        <td><input type="text" value="${data[i]['quantity']}" class="qty" readonly></td>
                        <td>${data[i]['amount']}</td>
                    
                        </tr>
                        
                        `;
                    }

                    console.log(data);
                });
        }

        fill_table();


        

        function edit_function(event){
            event.path[3].cells[4].getElementsByTagName('input')[0].removeAttribute("readonly");
            var qty = event.path[3].cells[4].getElementsByTagName('input')[0].value;
            event.path[3].cells[5].innerHTML = qty*event.path[3].cells[2].innerHTML;
        }
    </script>

</body>

</html>