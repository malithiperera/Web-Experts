<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    
}



        .subcontainer p {
            color: #184A78;
        }

        .details {
            position: absolute;
            top: -100px;
            display: flex;
            /* width: 100%; */
            /* justify-content: center; */
            flex-wrap: wrap;
           
        }

        /* .user_id {
            position: relative;
            top: 40px;
        } */

        .details input {
            width: 100px;
            height: 30px;
            border-radius: 10px;
            text-align: center;
        }

        /* .route_id {
            position: relative;
            top: 10px;
            left: 300px;
        } */

        .container {
            position: relative;
            top: 200px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .data_form {
            display: flex;
        }

        .data_form button {
            margin: 10px;
            width: 80px;
            height: 40px;
            border-radius: 10px;
            background-color: #184A78;
            color:#fff;
        }
        .data_form button:hover{
            background-color:#4d647a;
            cursor: pointer;
        }

        .data_form input {
            margin: 10px;
            padding-left: 10px;
            width: 200px;
            height: 40px;
            border-radius: 10px;
            text-align: center;
        }

        ul {
            list-style-type: none;
            margin-left: 30px;
        }

        li a {
            text-decoration: none;
        }

        .content {
            position: absolute;
            top: 250px;
            display: flex;
            flex-direction: column;
            margin-left: 10px;
        }

        th {
            background-color: #184A78;
            width: 250px;
            height: 40px;
            color: white;
        }

        td {
            background-color:#b6b6b6;
            color: black;
            width: 250px;
            height: 40px;
            text-align: center;
        }

        .place_button button {
            width: 120px;
            background-color:#184A78 ;
            color:#fff;
            margin-top: 10px;
            float: right;
            height: 40px;
            border-radius: 10px;
        }

        .confirmation {
            position: fixed;
            top: 100px;
            width: 100%;
            display: flex;
            justify-content: center;
            visibility: hidden;
        }

        .subconfirmation {
            width: 400px;
            height: 100px;
            background-color: white;
            border: 1px solid #184A78;
            border-radius: 10px;
        }

        .details label{
            font-weight: 800;
            margin-left: 40px;
            margin-bottom: 20px;
        }

        .details input{
            font-weight: 800;
            font-size: 20px;
            color: green;
            margin-bottom: 20px;
        }
    </style>

</head>

<body>

    <?php require 'view_headerType2.php'; ?>

    <div class="container">

        <div class="subcontainer">

            <div class="details">
                <div class="user_id">
                    <label for="">User Id : </label>
                    <input type="text" id="user_id" readonly>
                </div>

                <div class="route_id">
                    <label for="">Route Id : </label>
                    <input type="text" id="route_id" readonly>
                </div>

            </div>


            <p>Insert Product to Bill...</p>

            <div class="data_form">
                <div class="serach_product">
                    <input type="text" id="product_name" placeholder="Insert Product Name" onkeyup="fetchText(this.value)">
                    <div>
                        <ul class="suggestions">

                        </ul>
                    </div>
                </div>

                <input type="text" id="unit_price" placeholder="unit price">
                <input type="text" id="discount" placeholder="discount">
                <input type="text" id="quantity" placeholder="quantity" onkeyup="cal_tot()">
                <input type="text" id="total_price" placeholder="total price">
                <button onclick="add_product()">Add</button>
            </div>


            <div class="content">
                <div class="table-content">
                    <table id="order_table">
                        <thead>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </thead>
                        <tbody id="new_product">

                        </tbody>
                        <tr>
                            <td colspan="4">Total</td>
                            <td id="total_of_all_prices"></td>
                        </tr>
                    </table>
                </div>

                <div class="place_button">
                    <button onclick="place_order()">PLACE</button>
                </div>

            </div>

        </div>
    </div>

    <div class="confirmation" id="confirm_message">
        <?php require 'view_order_complete_popup.php'; ?>
    </div>



    <script>
        suggestions = document.querySelector(".suggestions");

        async function fetchText(value) {

            let reqBody = {
                product: value
            };
            const getData = async reqBody => {
                let res = await fetch('http://localhost/web-Experts/public/login/test2', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(reqBody)
                });
                if (res.status !== 200) // http status code 200 means success
                    throw new Error("Fetching process failed");
                let data = await res.json();
                return data;
            }

            getData(reqBody).then(data => {
                // console.log(data);
                suggestions.innerHTML = ``;
                data.forEach(myFunction);

                function myFunction(item) {

                    suggestions.innerHTML += `<li><a href="#" onclick="select_row('${item['product_name']}', '${item['price']}', '${item['discount']}')">${item['product_name']}</a></li>`;
                }

            }).catch(reason => {
                console.log(reason);
            })
        }

        let product_name_input = document.getElementById("product_name");
        let unit_price_input = document.querySelector("#unit_price");
        let discount_input = document.querySelector('#discount');
        let quantity_input = document.querySelector('#quantity');
        let tot_price_input = document.querySelector('#total_price');
        let new_product = document.querySelector('#new_product');
        // let info = document.querySelector('.info');
        let table_info = document.querySelector('#order_table');
        let total_of_all_prices = document.getElementById('total_of_all_prices');
        let user_id = document.getElementById('user_id');
        let route_id = document.getElementById('route_id');
        let confirm_message = document.getElementById('confirm_message');
        let done = document.querySelector('.button-pop');
        let order_id = document.getElementById('order_id');
        let order_date = document.getElementById('order_date');
        let order_amount = document.getElementById('order_amount');


        function select_row(product_name, unit_price, discount) {
            product_name_input.value = product_name;
            unit_price_input.value = unit_price;
            discount_input.value = discount;
            suggestions.innerHTML = ``;
        }

        function cal_tot() {
            tot_price_input.value = (quantity_input.value * unit_price_input.value) * (100 - discount_input.value) / 100;
        }

        function add_product() {
            new_product.innerHTML += '<tr><td>' + product_name_input.value + '</td><td>' + unit_price_input.value + '</td><td>' + discount_input.value + '</td><td>' + quantity_input.value + '</td><td>' + tot_price_input.value + '</td></tr>';

            product_name_input.value = '';
            unit_price_input.value = '';
            discount_input.value = '';
            quantity_input.value = '';
            tot_price_input.value = '';

            var total = 0;
            for (i = 1; i < table_info.rows.length - 1; i++) {
                // total = total + 1;
                total = total + parseInt(table_info.rows[i].cells[4].innerHTML);
            }
            total_of_all_prices.innerHTML = total;

        }

       

        var table_data = new Array(table_info.rows.length - 1);

        function confirmation_message() {
            confirm_message.style.visibility = "visible";

        }

        function place_order() {
            for (i = 1; i < table_info.rows.length - 1; i++) {
                let table_cell = table_info.rows.item(i).cells;
                table_data[i - 1] = new Array(table_cell.length);
                for (j = 0; j < table_cell.length; j++) {
                    table_data[i - 1][j] = table_cell.item(j).innerHTML;
                }

            }

            var total_amount = total_of_all_prices.innerHTML;
            var cus_id = user_id.value;
            var route_id_obj = route_id.value;
            var today = new Date();
            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

            var data_set = {
                amount: total_amount,
                status : 'not-delivered',
                date: date,
                working : 1,
                cus_id: cus_id,
                route_id: route_id_obj,
                table: table_data
            };


            fetch('http://localhost/web-Experts/public/customer/place_order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    confirmation_message();
                    order_id.innerHTML = `${data[7]}`;
                    order_date.innerHTML = `${data[2]}`;
                    order_amount.innerHTML = `${data[0]}`;
                    done.addEventListener("click", ()=>{
                       confirm_message.style.visibility = "hidden"; 
                    });
                });

            new_product.innerHTML = '';
            total_of_all_prices.innerHTML = '';
        }

        

        // fill details
        const fill_details = () => {
            fetch('http://localhost/web-Experts/public/customer/get_details_place_order')
                .then(response => response.json())
                .then(data => {
                    user_id.value = data[0];
                    route_id.value = data[1].route_id;
                });
        }

        fill_details();
    </script>
</body>

</html>