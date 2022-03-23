<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/web-Experts/public/login/index");
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="../../public/styles/sidebar.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/view_button.css">
    <link rel="stylesheet" href="../../public/styles/view_routes.css">
  
    
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
            <a href="#" onclick="popup_message('.popup')">
            <i class="fas fa-luggage-cart fa-lg"></i>
                    <span class="links_name">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>

            <li>
            <a href="#" onclick="popup_message('.popup')">
            <i class="fas fa-landmark fa-lg"></i>
                    <span class="links_name">Customers</span>
                </a>
                <span class="tooltip">Customers</span>
            </li>
            <li>
            <a href="#" onclick="popup_message('.search_salesrep')">
            <i class="fas fa-user-tie fa-lg"></i>
                    <span class="links_name">Sales Rep</span>
                </a>
                <span class="tooltip">Sales Rep</span>
            </li>
            <li>
            <a href="#" onclick="popup_message('.select_report')">
            <i class="fas fa-chart-line fa-lg"></i>
                    <span class="links_name">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>
            <li>
            <a href="../admin/add_user">
            <i class="fas fa-user-plus fa-lg"></i>
                    <span class="links_name">Add User</span>
                </a>
                <span class="tooltip">Add User</span>
            </li>
            <li>
            <li>
            <a href="#" onclick="popup_message('.removeuser')">
            <i class="fas fa-user-minus fa-lg"></i>
                    <span class="links_name">Remove User</span>
                </a>
                <span class="tooltip">Remove User</span>
            </li>
            <li>
            <li>
            <li>
            <a href="#" onclick="popup_message('.routes')"><i class="fas fa-map-marker-alt fa-lg"></i>
                    <span class="links_name">Routes</span>
                </a>
                <span class="tooltip">Routes</span>
            </li>
            <li>
            <li>
            <a href="../admin/notification">
            <i class="fas fa-bell fa-lg"></i>
                    <span class="links_name">Notification</span>
                </a>
                <span class="tooltip">Notification</span>
            </li>
            <li>
                <a href="logout">
                <i class="fas fa-user-alt fa-lg"></i>
                    <span class="links_name">profile</span>
                </a>
                <span class="tooltip">profile</span>
            </li>
            <li>
                <a href="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
            <!-- <li class="profile">
                <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_job">
                        <div class="name"></div>
                        <div class="job">Admin</div>
                    </div>
                </div>
                <i class="fas fa-store" id="log_out"></i>
            </li> -->
        </ul>
    </div>

    <section class="home-section">
    <div class="header">
      <?php  require 'view_headertype2.php'; ?>
    </div>

    <div class="content">

<div class="buttons">
    <p>Add new Route</p>

    <!-- <button id="edit">EDIT</button> -->
</div>

<div class="new_added_row">
    <!-- <input type="text" name="route_id" placeholder="Route Id" id="route_id" required> -->
    <!-- <input type="text" name="route_id" placeholder="route_id" id="route_id"> -->
    <input type="text" name="destination" placeholder="Destination" id="destination" required>
    <input type="text" name="route_name" placeholder="Route Name" id="route_name" required>
    <input type="text" name="rep_id" placeholder="salesrep ID" id="rep_id" onkeyup="suggest_rep()" require>
    <input type="submit" name="submit" onclick="add_new_route()">
</div>

<div class="table">

    <table>
        <thead>
            <th>ROUTE ID</th>
            <th>DESTINATION</th>
            <th>ROAD</th>
            <th>Sales Rep Id</th>
        </thead>
        <tbody id="content-routes">

        </tbody>


    </table>
</div>
<div id="suggestion">

</div>

<button class="back_button" onclick="back_to_home()">
    back
</button>

</div>

<div class="route_add_popup">

</div>
    
    </section>

    <script src="../../public/java script/side_bar.js"></script>

<script>
        content_route = document.getElementById('content-routes');
        // route_id = document.getElementById('route_id');
        destination = document.getElementById('destination');
        route_name = document.getElementById('route_name');
        rep_id_input = document.getElementById('rep_id');
        suggestion = document.getElementById('suggestion');
        route_add_popup = document.querySelector('.route_add_popup');

        //suggest sales rep
        const suggest_rep = () => {
            type_rep = {
                rep_id: rep_id_input.value
            }

            fetch('http://localhost/web-Experts/public/admin/suggest_rep', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify(type_rep)
                })
                .then(response => response.json())
                .then(data => {
                    for (i = 0; i < data.length; i++) {
                        suggestion.innerHTML += `<a href="#"onclick="set_sales_rep('${data[i]['rep_id']}')">${data[i]['rep_id']}</a>`;
                    }
                    if (rep_id.value == "") {
                        suggestion.innerHTML = ``;
                    }

                });

        }

        //set sales rep
        const set_sales_rep = (rep_id) => {
            rep_id_input.value = rep_id;
            suggestion.innerHTML = ``;
            console.log(rep_id);
        }


        //get routes
        const get_routes = () => {
            fetch('http://localhost/web-Experts/public/admin/get_routes')
                .then(response => response.json())
                .then(data => {

                    content_route.innerHTML = ``;

                    for (i = 0; i < data.length; i++) {
                        if (data[i]['deleted'] == 0) {
                            content_route.innerHTML += `
                
                            <tr>
                                <td>${data[i]['route_id']}</td>
                                <td>${data[i]['end']}</td>
                                <td>${data[i]['route_name']}</td>
                                <td>${data[i]['rep_id']}</td>
                                <td class="delete_button" id="edit"><a href="#"><i class="fas fa-pen"></a></td>
                                <td class="delete_button" id="del"><a href="#" onclick="delete_route(${data[i]['route_id']})"><i class="fas fa-trash-alt"></a></td>
                                

                                </tr>
                        
                        `;
                        }

                    }



                    console.log(data);
                })
        }

        get_routes();

        //delete route
        const delete_route = (route_id) => {
            route_delete_data_set = {
                route_id: route_id
            }

            fetch('http://localhost/web-Experts/public/admin/delete_route', {
                method: 'POST',

                headers: {
                    'Content-Type': 'application/json'

                },

                body: JSON.stringify(route_delete_data_set)
            })
            .then(response => response.json())
            .then(data =>{
                console.log(data);
                get_routes();
            });

        }


        //add new route
        const add_new_route = () => {
            data_set = {
                // route_id: route_id.value,
                destination: destination.value,
                route_name: route_name.value,
                rep_id_input: rep_id.value
            }

            fetch('http://localhost/web-Experts/public/admin/add_new_route', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    route_add_popup.style.visibility = "visible";
                    route_add_popup.innerHTML = `<?php require 'view_admin_routes_add_successfull.php'; ?>`;

                    message_body = document.querySelector('.route_add_success_container');
                    success_or_failed = document.getElementById('route_add_success_or_not');
                    message_text_area = document.querySelector('.route_add_success_sub_div1');

                    route_add_route_name = document.getElementById('route_add_success_route_name');
                    route_add_destination = document.getElementById('route_add_success_destination')
                    route_add_rep_id = document.getElementById('route_add_success_rep_id')
                    route_icon= document.getElementById('icon-success')

                    confirmation = document.getElementById('route_add_confirm');

                    if (data[0] == true) {

                        message_body.style.backgroundColor = "#5DA423";
                        success_or_failed.innerHTML = `SUCCESS`;
                        message_text_area = "blue";
                       
                        route_icon.innerHTML=' <i class="far fa-check-circle"></i>';

                        confirmation.innerHTML = `Done`;

                        console.log('true');
                    } else {
                        message_body.style.backgroundColor = "red";
                        success_or_failed.innerHTML = `FAILED`;
                        message_text_area = "yellow";

                        confirmation.innerHTML = `Dismiss`;

                        console.log('false');
                    }

                    route_add_route_name.innerHTML += `${data_set['route_name']}`;
                    route_add_destination.innerHTML += `${data_set['destination']}`;
                    route_add_rep_id.innerHTML += `${data_set['rep_id_input']}`;

                    window.onclick = (event) => {
                        if (event.target == confirmation) {
                            route_add_popup.innerHTML = ``;
                            route_name.value = "";
                            rep_id_input.value = "";
                            destination.value = "";
                            route_add_popup.style.visibility = "hidden";
                        }
                    }

                    console.log(data_set);
                    get_routes();
                });


        }
    </script>


</body>

</html>