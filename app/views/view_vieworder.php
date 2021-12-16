<?php session_start();

if (!isset($_SESSION['username'])) {
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
    <link rel="stylesheet" href="../../public/styles/view_vieworder.css">
    <link rel="stylesheet" href="../../public/styles/view_button.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <style>
        .qty {
            border: none;
            text-align: center;
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

        #conf,
        #cancel {
            width: 100px;
            padding: 20px;
            margin: 30px;
            border: black;
            outline: none;
            color: white;
            border-radius: 5px;
            font-size: 20px;
            font-weight: 700;
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

                    <input type="text" class="order_id" readonly id="order_id">
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
                    <input type="text" id="product_name" placeholder="Search Product" onkeyup="fetchText(this.value)">
                    <div>
                        <ul class="suggestions">

                        </ul>
                    </div>
                </div>

                <input type="text" id="unit_price" placeholder="unit price">
                <input type="text" id="discount" placeholder="discount">
                <input type="text" id="quantity" placeholder="quantity" onkeyup=" cal_tot_suggest()">
                <input type="text" id="total_price" placeholder="total price">
                <button id="new" class="new" onclick="add_product()"><i class="fas fa-plus"></i>Add New</button>
            </div>

        </div>

        <div class="order">
            <table>
                <tr>

                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th colspan="2"></th>
                </tr>

                <tbody class="pending_order_table" id="new_product">

                </tbody>







                <tr class="tot">
                    <td colspan="6">Total(RS)</td>
                    <td id="total_of_all_prices">12000</td>
                </tr>


            </table>

        </div>

        <div class="save">
            <button id="save_but" onclick="save_order()">Save</button>
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

    </div>

    <script>
        //suggestions 
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
                        
                        <td class="pro_name">${data[i]['product_name']}</td>
                        <td class="price">${data[i]['price']}</td>
                        <td class="dis">${data[i]['discount']}</td>
                        <td class="qut"><input type="text" value="${data[i]['quantity']}" class="qty" readonly onkeyup="cal_tot()"></td>
                        <td>${data[i]['amount']}</td>
                        <td><button class="edit" value=${i+1} >Edit</button></td>
                        <td><button class="delete">Delete</button></td>
                        </tr>
                        
                        `;
                    }

                    console.log(data);

                    var x = document.getElementById('new_product');
                    total_of_all_prices = document.getElementById('total_of_all_prices');
                    var count = 0;
                    for (i = 0; i < x.rows.length; i++) {
                        console.log(x.rows[i].cells.item(4).innerHTML);
                        count = parseInt(count) + parseInt((x.rows[i].cells.item(4).innerHTML));

                    }

                    total_of_all_prices.innerHTML = count;
                });







        }

        fill_table();

        function get_total_count() {

        }

        function get_total_row() {

            var tot = document.getElementById('total_of_all_prices');
            var table = document.getElementById('new_product');
            // console.log(table.rows[1].cells[1]);
            // for(i=0;i<table.rows.length;i++){

            // }

        }


        get_total_row();
        // edit values

        // function total(value){
        //  var x=document.getElementById('new_product');
        // //  x.style.removeProperty="readonly";
        // //  x.rows[value-1].cells[1].
        // // $(this).closest('tr').find('input').removeAttr('readonly');
        // x.rows[value-1].cells[3].children[0].removeAttribute('readonly');

        // console.log(value);

        // }


        //delete rows


        delete_pop_up = document.querySelector('.delete-pop-up');
        var pop_up = document.querySelector('.msg-pop');
        var conf = document.getElementById('conf');
        var cancel = document.getElementById('cancel');
        var msg_content = document.getElementById('msg-content');
        var msg_content_sub = document.getElementById('msg-content-sub');
        window.onclick = function(event) {
            var x = document.getElementById('new_product');

            if (event.target.className == "delete") {
                delete_pop_up.style.display = "block";
                var x=document.querySelector('.order');
                // x.style.opacity="0.5";



                pop_up.style.display = 'block';
                pop_up.style.marginLeft = '600px';

                msg_content.innerHTML = "Are You Sure ??";
                msg_content.style.color = "red";
                msg_content_sub.innerHTML = "Do you want to delete " + event.path[2].children[0].innerHTML + "Product From the bill??";
                conf.style.background = "red";
                conf.value = "delete_pro";
                cancel.style.background = "#184A78";






                console.log(event.path[2]);
                // x.deleteRow(event.path[2]);
            }
            if (event.target.className == "edit") {
                // console.log(event.path[2]);
                // console.log(x.rows[0].cells.item(3));
               

                for (i = 0; i < x.rows.length; i++) {
                    console.log(x.rows[i].cells.item(3).children[0]);
                    x.rows[i].cells.item(3).children[0].setAttribute('readonly', true);
                }


                event.path[2].children[3].children[0].removeAttribute('readonly');




            }


        }


        function delete_pro() {
            var x = document.getElementById('new_product');
            console.log('dele')
            var conf = document.getElementById('conf');
            if (conf.value == "delete_pro") {
                x.deleteRow(event.path[2]);
                pop_up.style.display = "none";
                delete_pop_up.style.display = "none";
            }
        }

        function cancel_pro() {

            pop_up.style.display = "none";
            delete_pop_up.style.display = "none";
        }


        function select_row(product_name, unit_price, discount) {
            product_name_input.value = product_name;
            unit_price_input.value = unit_price;
            discount_input.value = discount;
            suggestions.innerHTML = ``;
        }

        function cal_tot() {
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


        function cal_tot_suggest() {


            tot_price_input.value = (quantity_input.value * unit_price_input.value) * (100 - discount_input.value) / 100;

        }












        let product_name_input = document.getElementById("product_name");
        let unit_price_input = document.querySelector("#unit_price");
        let discount_input = document.querySelector('#discount');
        let quantity_input = document.querySelector('#quantity');
        let tot_price_input = document.querySelector('#total_price');
        let new_product = document.querySelector('#new_product');
        // let info = document.querySelector('.info');
        let table_info = document.querySelector('#order_table');
        // let total_of_all_prices = document.getElementById('total_of_all_prices');
        let user_id = document.getElementById('user_id');
        // let route_id = document.getElementById('route_id');
        let shop_name = document.getElementById('shop_name');
        let confirm_message = document.getElementById('confirm_message');
        let done = document.querySelector('.button-pop');
        // let order_id = document.getElementById('order_id');
        let order_date = document.getElementById('order_date');
        let order_amount = document.getElementById('order_amount');





        function add_product() {

            if (product_name_input.value == "") {
                alert("Enter a valid product");
            } else if (quantity_input.value == "") {
                alert("Enter a valid product");

            } else {
                var x = document.getElementById("new_product").rows.length;
                new_product.innerHTML += '<tr><td>' + product_name_input.value + '</td><td>' + unit_price_input.value + '</td><td>' + discount_input.value + `</td><td><input type="text" value=${quantity_input.value} class="qty" readonly onkeyup="cal_tot()">` + '</td><td>' + tot_price_input.value + '</td><td>' +
                    `<button class="edit" value=${i+1} >Edit</button>` + '</td><td>' + '<button class="delete">Delete</button> ' + '</td></tr>';

                product_name_input.value = '';
                unit_price_input.value = '';
                discount_input.value = '';
                quantity_input.value = '';
                tot_price_input.value = '';


                cal_tot_amount();
                // var total = 0;
                // for (i = 1; i < table_info.rows.length - 1; i++) {
                //     // total = total + 1;
                //     total = total + parseInt(table_info.rows[i].cells[4].innerHTML);
                // }
                // total_of_all_prices.innerHTML = total;

            }
        }





        //save order
        function save_order() {



            delete_pop_up.style.display = "block";

            pop_up.style.display = 'block';
            pop_up.style.marginLeft = '600px';

            msg_content.innerHTML = "Are You Sure ??";
            msg_content.style.color = "blue";
            msg_content_sub.innerHTML = "Want to update the order";
            conf.style.background = "#184A78";
            conf.value = "place_order";
            cancel.style.background = "#184A78";

            conf.setAttribute('onclick','place_order_update()');
            


         

        
    }



    function place_order_update(){
        
        pop_up.style.display = "none";
            delete_pop_up.style.display = "none";
        var table_info = document.getElementById("new_product");

        var table_data = new Array(table_info.rows.length);
        
            for (i = 0; i < table_info.rows.length; i++) {
                let table_cell = table_info.rows.item(i).cells;
              
                table_data[i-1] = new Array(table_cell.length);
                console.log(table_data[i]);


                for (j = 0; j < table_cell.length; j++) {
                    if(j==3){
                        table_data[i - 1][j] = table_cell.item(j).children[0].value;
                    }
                    else{
                        table_data[i - 1][j] = table_cell.item(j).innerHTML;
                    }
                
                }
                
    
            }

            console.log(table_data);
            

            var total_amount = total_of_all_prices.innerHTML;
            // var cus_id = $_GET['cus_id'];
              
            var order_id =document.getElementById('order_id').value;
          
            var route_id_obj= route_id.value;
          
            var today = new Date();
            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    

    
            var data_set = {
                amount: total_amount,
                
                date: date,
               order:order_id,
                // cus_id: cus_id,
                route_id: route_id_obj,
                table: table_data
            };

            console.log(data_set);

    fetch('http://localhost/web-Experts/public/customer/update_order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // confirmation_message();
                    // order_id.innerHTML = `${data[7]}`;
                    // order_date.innerHTML = `${data[2]}`;
                    // order_amount.innerHTML = `${data[0]}`;
                    // done.addEventListener("click", () => {
                    //     confirm_message.style.visibility = "hidden";
                    // });
                });


 }
    </script>

</body>

</html>