<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/web-Experts/public/login/index");
}

?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="../../public/styles/view_rep_Home.css">
    <link rel="stylesheet" href="../../public/styles/view_customer_ourproduct.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_button.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;

        }

        .delete-pop-up {
            display: flex;
            justify-content: center;
            width: 100%;
            height: 500px;
            background-color: transparent;
            top: 100px;
            position: fixed;
            display: none;

        }

        #msg-content {
            padding: 20px;
            text-align: center;
            font-size: 25px;
        }

        #msg-content-sub {
            padding: 20px;
            text-align: center;
            font-size: 20px;

        }

        .msg-pop {
            margin: 50px;
            width: 600px;
            height: 400px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            border: 3px solid black;
            position: fixed;
            display: none;
        }

        .button-div {
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        

        html::-webkit-scrollbar {
            width: .8rem;
        }

        html::-webkit-scrollbar-track {
            background: transparent;
        }

        html::-webkit-scrollbar-thumb {
            background: #184A78;
            border-radius: 2rem;
        }

        .subcontainer {
            /* margin-left: -50px; */
            z-index: 10000;

        }

        .subcontainer p {
            color: #184A78;
        }

        .details {
            position: absolute;
            top: -50px;
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
            width: 200px;
            height: 50px;
            border-radius: 10px;
            /* text-align: center; */
            outline: none;
            font-size: 25px;
            border: none;
        }

        td input {
            background-color: #d6d6d6;
            border: none;
            outline: none;
        }

        /* .route_id {
            position: relative;
            top: 10px;
            left: 300px;
        } */

        .container {
            position: relative;
            top: 100px;
            width: 100%;
            left: -30px;
            display: flex;
            justify-content: center;
        }

        .header {
            top: 0;
            margin-top: -20px;

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
            color: #fff;
        }

        .data_form button:hover {
            background-color: #4d647a;
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

        .home-section ul {
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
            width: 80%;
            /* margin-left: 10px; */
        }

        th {
            background-color: #184A78;
            width: 250px;
            height: 40px;
            color: white;
        }

        td {
            background-color: #d6d6d6;
            ;
            color: black;
            width: 250px;
            height: 40px;
            text-align: center;
        }

        .place_button button {
            width: 120px;
            background-color: #184A78;
            color: #fff;
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

        .details label {
            font-weight: 800;
            /* margin-left: 40px; */
            margin-bottom: 20px;
            font-size: 25px;
        }

        .details i {
            font-size: 25px;
        }

        .details input {
            font-weight: 800;
            font-size: 20px;
            color: green;
            margin-bottom: 20px;
            font-size: 25px;
        }




        button i {
            padding-right: 10px;
        }



        thead th {
            color: #ffffff;
            background: #4FC3A1;
        }

        thead th:nth-child(odd) {
            color: #ffffff;
            background: #184A78;
        }

        .order-table {
            margin-right: 100px;
        }

        .suggestions {

            color: black;
        }

        .suggestions a {
            color: black;
            font-size: 20px;

        }

        #total_of_all_prices,
        #tot {
            font-weight: 800;
            font-size: 25px;
        }

        .inpu {
            background-color: #fff;
        }

        /* .detail_id{
    width: 400px;
    /* background-color: red; */
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="logo-details">

            <div class="logo_name">Himalee Dairy Product</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
            <li>
                <a href="#">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="../customer/place_order_view">

                    <i class='bx bxs-cart-add'></i>
                    <span class="links_name">Place Order</span>
                </a>
                <span class="tooltip">Place Order</span>
            </li>

            <li>
                <a href="#" onclick="pop_up_report()">
                    <i class='bx bx-line-chart'></i>
                    <span class="links_name">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>
            <li>
                <a href="../customer/our_products">
                    <i class="fas fa-ice-cream"></i>
                    <span class="links_name">Our Products</span>
                </a>
                <span class="tooltip">Our Products</span>
            </li>
            <li>
                <a href="../customer/view_notification">
                    <i class='bx bx-bell'></i>
                    <span class="links_name">Notification</span>
                </a>
                <span class="tooltip">Notification</span>
            </li>
            <li>
                <a href="../customer/profile">
                    <i class="far fa-user-circle"></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <li>
                <a href="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_job">
                        <div class="name"></div>
                        <div class="job">Customer</div>
                    </div>
                </div>
                <i class="fas fa-store" id="log_out"></i>
            </li>
        </ul>
    </div>

    <section class="home-section">

        <div class="header">
            <?php require 'view_headertype2.php'; ?>
        </div>
        <div class="container">

            <div class="subcontainer">

                <div class="details">
                    <div class="detail_id">
                        <i class="fas fa-house-user"></i>
                        <label for="">Customer Id : </label>
                        <input type="text" id="user_id" readonly>
                    </div>

                    <div class="detail_id">
                        <i class="fas fa-map-marker-alt"></i>
                        <label for="">Route Id : </label>
                        <input type="text" id="route_id" readonly>
                    </div>
                    <div class="detail_id">
                        <i class="fas fa-store"></i>
                        <label for="">Shop Name: </label>
                        <input type="text" id="shop_name" readonly>
                    </div>

                </div>


                <h2>Insert Product to bill</h2>

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
                    <button onclick="add_product()" id="add" class="new"><i class="fas fa-cart-plus"></i>Add</button>
                </div>


                <div class="content">
                    <h3>Invoice</h3>
                    <div class="table-content">
                        <table id="order_table">
                            <thead>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Discount</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th colspan="2" id="change">Change</th>
                            </thead>
                            <tbody id="new_product">

                            </tbody>
                            <tr>
                                <td colspan="4" id="tot">Total Amount(RS)</td>
                                <td id="total_of_all_prices"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="place_button">
                        <button onclick="place_order()">PLACE ORDER</button>
                    </div>

                </div>

            </div>
        </div>

        <div class="confirmation" id="confirm_message">
            <?php require 'view_order_complete_popup.php'; ?>
        </div>

        <div class="delete-pop-up">
            <div class="msg-pop">
                <h4 id="msg-content">Are You want to sure</h4>
                <h4 id="msg-content-sub">Are You want to sure</h4>


                <div class="button-div">
                    <div class="submit-but">
                        <button id="conf" value="" onclick="delete_pro()">Yes</button>
                    </div>
                    <div class="close-but">
                        <button id="cancel" value="" onclick="cancel_pro()">cancel</button>
                    </div>
                </div>

            </div>

        </div>
    </section>



    <div class="confirmation" id="confirm_message">
        <?php require 'view_order_complete_popup.php'; ?>
    </div>



    <script>
        delete_pop_up = document.querySelector('.delete-pop-up');
        var pop_up = document.querySelector('.msg-pop');
        var conf = document.getElementById('conf');
        var cancel = document.getElementById('cancel');
        var msg_content = document.getElementById('msg-content');
        var msg_content_sub = document.getElementById('msg-content-sub');
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
        let shop_name = document.getElementById('shop_name');
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

            if (product_name_input.value == "") {
                alert("Enter a valid product");
            } else if (quantity_input.value == "") {
                alert("Enter a valid product");

            } else {
                change.style.visibility = "visible";
                new_product.innerHTML += '<tr><td>' + product_name_input.value + '</td><td>' + unit_price_input.value + '</td><td>' + discount_input.value + `</td><td><input type="text" value="${quantity_input.value}" class="qty" readonly onkeyup="cal_tot1()">` + '</td><td>' + tot_price_input.value + '</td><td>' + '<button class="edit">Edit</button> ' + '</td><td>' + '<button class="delete">Delete</button> ' + '</td></tr>';




                product_name_input.value = '';
                unit_price_input.value = '';
                discount_input.value = '';
                quantity_input.value = '';
                tot_price_input.value = '';
            }

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





        //place Order
        function place_order() {
            if (table_info.rows.length != 2) {
                for (i = 1; i < table_info.rows.length - 1; i++) {
                    let table_cell = table_info.rows.item(i).cells;
                    table_data[i - 1] = new Array(table_cell.length);
                    for (j = 0; j < table_cell.length; j++) {
                        table_data[i - 1][j] = table_cell.item(j).innerHTML;
                    }

                }


            }
            if (new_product.rows.length == 0) {
                change.style.visibility = "hidden";
            }

            var total_amount = total_of_all_prices.innerHTML;
            var cus_id = user_id.value;
            var route_id_obj = route_id.value;
            var today = new Date();
            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

            var data_set = {
                amount: total_amount,
                status: 'not-delivered',
                date: date,
                working: 1,
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
                    done.addEventListener("click", () => {
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
                    console.log(data);
                    user_id.value = data[0];
                    route_id.value = data[1].route_id;
                    shop_name.value = data[1].shop_name;
                });
        }

        fill_details();


        window.onclick = function(event) {
            var x = document.getElementById('new_product');
            console.log(event);
            if (event.target.className == "delete") {
                console.log('Hello');
                delete_pop_up.style.display = "block";

                pop_up.style.display = 'block';
                pop_up.style.marginLeft = '600px';

                msg_content.innerHTML = "Are You Sure ??";
                msg_content.style.color = "red";
                msg_content_sub.innerHTML = "Are you want to delete " + event.path[2].children[0].innerHTML + "Product From the bill??";
                conf.style.background = "red";
                conf.value = "delete_pro";
                cancel.style.background = "#184A78";




                console.log(event.path[2]);
                // x.deleteRow(event.path[2]);
            }
            if (event.target.className == "edit") {
                console.log(event.path[2]);
                // console.log(x.rows[0].cells.item(3));
                for (i = 0; i < x.rows.length; i++) {
                    console.log(x.rows[i].cells.item(3).children[0]);
                    x.rows[i].cells.item(3).children[0].setAttribute('readonly', true);
                }


                event.path[2].children[3].children[0].removeAttribute('readonly');
                event.path[2].children[3].children[0].classlist.add('inpu');





            }

        }

        function delete_pro() {
            var x = document.getElementById('new_product');
            var conf = document.getElementById('conf');
            if (conf.value == "delete_pro") {
                x.deleteRow(event.path[2]);
                pop_up.style.display = "none";
                delete_pop_up.style.display = "none";
            }
            if (new_product.rows.length == 0) {
                change.style.visibility = "hidden";
            }
        }

        function cal_tot1() {
            var unit_price = event.path[2].children[1].innerHTML;
            var dis = event.path[2].children[2].innerHTML;


            var new_qua = event.path[2].children[3].children[0].value;

            event.path[2].children[4].innerHTML = (unit_price * new_qua) * (100 - dis) / 100;

            cal_tot_amount();

            //             var y=document.getElementById('new_product');
            //         //  x.style.removeProperty="readonly";
            //         //  x.rows[value-1].cells[1].
            //         // $(this).closest('tr').find('input').removeAttr('readonly');
            //         // x.rows[value-1].cells[3].children[0].removeAttribute('readonly');
            //         var new_qua=y.rows[x-1].cells[3].children[0].value;
            //         var dis=y.rows[x-1].cells[2].innerHTML;
            //         var unit_price=y.rows[x-1].cells[1].innerHTML;
            //    var total=(unit_price*new_qua)*(100-dis)/100;
            //         y.rows[x-1].cells[4].innerHTML=total;



        }

        function cal_tot_amount() {

            var x = document.getElementById('new_product');


            total_of_all_prices = document.getElementById('total_of_all_prices');
            var count = 0;
            for (i = 0; i < x.rows.length; i++) {
                console.log(x.rows[i].cells.item(4).innerHTML);
                count = parseInt(count) + parseInt((x.rows[i].cells.item(4).innerHTML));

            }

            total_of_all_prices.innerHTML = count;

        }
        change = document.getElementById('change');
        window.onload = function() {

            if (new_product.rows.length == 0) {
                change.style.visibility = "hidden";
            }



        };


        function cancel_pro() {

            pop_up.style.display = "none";
            delete_pop_up.style.display = "none";
        }
    </script>

    <script src="../../public/java script/side_bar.js"></script>
</body>

</html>