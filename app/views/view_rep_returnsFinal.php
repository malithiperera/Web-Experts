<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="../../public/styles/view_rep_Home.css">
    <link rel="stylesheet" href="../../public/styles/view_customer_ourproduct.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_button.css">
    <link rel="stylesheet" href="../../public/styles/view_place_order.css">

</head>
<style>
    ::placeholder {
        font-size: 14px;
    }

    #user_id1,
    #shop_name1,
    #route_id1 {
        /* border: 1px solid black; */
        width: 120px;
        margin: 10px;
        color: black;
        font-size: 20px;
    }

    #det1 {
        font-size: 18px;
    }

    #sug-div {
        width: 250px;
        height: auto;
        background-color: #fff;
        z-index: 5000;
        border: 1px solid black;
    }

    .data_form-1 {

display: flex;
margin-top: 150px;

}

.data_form-1 button {
/* margin: 10px; */
width: 80px;
height: 40px;
border-radius: 10px;
background-color: #184A78;
color: #fff;
}

.data_form-1 button:hover {
background-color: #4d647a;
cursor: pointer;
}

.data_form-1 input {
margin: 10px;
margin-top: 30px;
padding-left: 10px;
width: 200px;
height: 40px;
border-radius: 10px;
text-align: center;

}
h2{
    margin-top: 100px;
}
.customer-serach{
    /* display: flex; */
}

#serach_user,#shop_name,#route_id{
    width: 200px;
    color: black;
    font-size: 18px;
}
</style>

<body>

    <div class="sidebar">
        <div class="logo-details">

            <div class="logo_name">Himalee Dairy Product</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">

            <li>
                <a href="../customer/home">
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
    

                    <div class="customer-serach">
                        <input type="text" placeholder="enter the cus id or cus name" id="serach_user" onkeyup="place_order_intial()">

                        <div id="sug-div">
                            <ul class="suggestions-user" id="suggestions-user">

                            </ul>
                        </div>
                        
                        


                    </div>
                    <div class="route-name">
                            <input type="text" value="" id="shop_name">
                            
                        </div>
                        <div class="route-name">
                            <input type="text" value="" id="route_id">
                            
                        </div>


                </div>



            </div>


            <h2>Insert Product to bill</h2>

            <div class="data_form-1">
                <div class="serach_product">
                    <input type="text" id="product_name" placeholder="Insert Product Name" onkeyup="fetchText(this.value)">
                    <div>
                        <ul class="suggestions" id="suggestions">

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
                    <button onclick="place_order_offline()">PLACE ORDER</button>
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



    <script src="../../public/java script/side_bar.js"></script>
    <script src="../../public/java script/view_place_order.js"></script>
    <script>
        //suggestions userid or shopname
        function place_order_intial() {

            var userid = document.getElementById('serach_user').value;
            console.log(userid);
            fetch('http://localhost/web-Experts/public/orders/suggest_user', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify(userid)
                })
                .then(response => response.json())
                .then(data => {
                    suggestions_user = document.getElementById('suggestions-user');


                    suggestions_user.innerHTML = ``;
                    data.forEach(myFunction);

                    function myFunction(item) {

                        suggestions_user.innerHTML += `<li><a href="#" onclick="select_row_user('${item['cus_id']}','${item['shop_name']}', '${item['route_id']}')">${item['cus_id']} - ${item['shop_name']}</a></li>`;

                        console.log(data);
                    }
                    if (userid == "") {
                        console.log("hellow");
                        suggestions_user.innerHTML = ``;
                    } 
                    console.log(data);


                });

        }



        function select_row_user(userid, shop_name, route) {

            let product_name = document.querySelector('#serach_user');
            let shp_name=document.getElementById('shop_name');
            let route_id=document.getElementById('route_id');
            product_name.value = userid;

            // console.log(userid+' '+shop_name);
            suggestions_user.innerHTML = ``;
            route_id.value=route;
            shp_name.value=shop_name;

        }


        //place order offline
function place_order_offline() {
    
    if (table_info.rows.length != 2) {
        for (i = 1; i < table_info.rows.length - 1; i++) {
            let table_cell = table_info.rows.item(i).cells;
            table_data[i - 1] = new Array(table_cell.length);
            for (j = 0; j < table_cell.length; j++) {
                if(j==3){
                    
                table_data[i - 1][j]=table_cell.item(j).children[0].value;
                }

                else{
                    table_data[i - 1][j] = table_cell.item(j).innerHTML;
                }
               
                console.log(table_data[i - 1][j])
               
            }

        }
        console.log(table_data);

    }
    if (new_product.rows.length == 0) {
        change.style.visibility = "hidden";
    }

    var total_amount = total_of_all_prices.innerHTML;
    // var cus_id = user_id.value;
    // var route_id_obj = route_id.value;
    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

    let product_name = document.querySelector('#serach_user');
            // let shp_name=document.getElementById('shop_name');
            let route_id=document.getElementById('route_id');

    var data_set = {
        amount: total_amount,
        status: 'not-delivered',
        date: date,
        working: 1,
        cus_id: product_name.value,
        route_id: route_id.value,
        table: table_data
    };
console.log(data_set);

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
    </script>
</body>

</html>