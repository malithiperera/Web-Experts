<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <!-- Box icons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_stockManager_viewStocks.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
<<<<<<< HEAD
                <a href="../stockManager/notification">
=======
                <a href="../stockManager/moveToNotificationPage">
>>>>>>> 222ae6a9402693196ae889cfc2146c02c6a66e56
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Notification</span>
                </a>
                <span class="tooltip">Notification</span>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-line"></i>
                    <span class="links_name">View Reports</span>
                </a>
                <span class="tooltip">View Reports</span>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>

            <li class="profile">
                <div class="profile-details">

                    <div class="name_job">
                        <div class="name">M.Bandara</div>
                        <div class="job">Stock Manager</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <section class="cards-section">
            <div class="cards">
                <div class="div_kindOfProducts">
                    <p><i class="fas fa-ice-cream"></i><br>KINDS OF PRODUCTS</p>
                    <p class="value_kindOfProducts"></p>
                </div>
                <div class="div_noOfReps">
                    <p><i class="fas fa-user-tie"></i></i><br>No of Sales rep</p>
                    <p class="value_noOfReps"></p>
                </div>
                <div class="div_catogories">
                    <p><i class="fab fa-product-hunt"></i></i><br>Categories</p>
                    <p class="value_catogories"></p>
                </div>
                <div class="div_repRequests">
                    <p><i class="fas fa-envelope"></i><br><a href="../stockManager/viewList">Rep Requests</a></p>
                    <p class="value_repRequests"></p>
                </div>



            </div>
        </section>

        <section class="detail">

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product</th>
                        <th>Current Stock</th>
                        <th>Unit Price</th>

                    </tr>

                </thead>

                <tbody class="product">


                </tbody>

            </table>

        </section>

        <div class="add"><br><br><br><br>
            <a href="../stockManager/add_product"><button class="add">Add</button><br></a>

        </div>

    </section>


    <script src="../../public/java script/view_stockManager_viewStocks.js"></script>

    <!-- fill table -->
    <script>
        var product_table = document.querySelector('.product');



        const fill_table = () => {

            fetch('http://localhost/web-Experts/public/stockManager/fill_home', {
                    // data set to send
                })
                .then(response => response.json())
                .then(data => {

                    for (i = 0; i < data.length; i++) {
                        product_table.innerHTML += `
                
                            <tr>
                                <td><a href="../stockManager/managestock?product_id=${data[i]['product_id']}">${data[i]['product_id']}</a></td>
                                <td>${data[i]['product_name']}</td>
                                <td>100</td>
                                <td>${data[i]['price']}</td>
                            </tr>
                        
                        `;

                    }



                    console.log(data);
                });

        }

        fill_table();
    </script>

    <script>
        // fill 'Kind of products' card
        var kindOfProducts = document.querySelector('.div_kindOfProducts'); // access to the html class

        const fillKindOfProdcuts = () => { // fill the card
            fetch('http://localhost/web-Experts/public/stockManager/fillKindOfProducts_cont', {
                    /* nothing to send to the controller*/
                }) // call the controller
                .then(response => response.json())
                .then(data => {
                    kindOfProducts.innerHTML += `
                        <p class="value_kindOfProducts">${data['productidcount']}</p>

                    `;
                    console.log(data); // send data to the front end

                });

        }
        fillKindOfProdcuts();
    </script>

    <script>
        // fill 'number of rep' card
        var noOfReps = document.querySelector('.div_noOfReps');

        const fillNoOfReps = () => {
            fetch('http://localhost/web-Experts/public/stockManager/fillNoOfReps_cont', {})
                .then(response => response.json())
                .then(data => {
                    noOfReps.innerHTML += `
                        <p class="value_noOfReps">${data['repcount']}</p>

                    `;
                    console.log(data);

                })
        }
        fillNoOfReps();
    </script>

    <script>
        var noOfCategories = document.querySelector('.div_catogories');

        const fillNoOfCategories = () => {
            fetch('http://localhost/web-Experts/public/stockManager/fillNoOfCategories_cont', {})
                .then(response => response.json())
                .then(data => {
                    noOfCategories.innerHTML += `
                        <p class="value_catogories">${data['categories']}</p>

                    `;
                    console.log(data);

                });
        }
        fillNoOfCategories();
    </script>

    <script>
        var noOfRepRequests = document.querySelector('.div_repRequests');

        const fillNoOfRepRequests = () => {
            fetch('http://localhost/web-Experts/public/stockManager/fillNoOfRepRequests_cont', {})
                .then(response => response.json())
                .then(data => {
                    noOfRepRequests.innerHTML = `
                        <p class="value_repRequests">${data}</p>

                    `;
                    console.log(data);

                })
        }
    </script>

</body>

</html>