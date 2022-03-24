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



    <script src="../../public/java script/side_bar.js"></script>
    <script src="../../public/java script/view_place_order.js"></script>
</body>

</html>