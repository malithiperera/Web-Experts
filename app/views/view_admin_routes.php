<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .routes{
            position:fixed;
            width:100%;
            height: 800px;
            top:20px;
            display:flex;
            justify-content: center;
            z-index: 20000;
            /* background-color: red; */
        }


        .content {
            position: absolute;
            top: 100px;
            z-index: 2000;
            background-color: white;
            border: 3px solid #184A78;
            border-radius: 20px;
            padding-right: 50px;
            height: 600px;
        }

        .table {
            position: relative;
            width: 100%;
            z-index: 2000;
            height: 300px;
            overflow: scroll;
            overflow-x: hidden;
        }

        table {
            margin-left: 50px;
            z-index: 2000;
            
        }

        tr {
            background-color: white;
        }

        thead th {
            padding-left: 100px;
            padding-right: 100px;
            text-align: center;
            background-color: white;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        tr td {
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
            color: #184A78;
        }

        tr td a {
            text-decoration: none;
            color: #184A78;
        }

        tr td a:hover {
            text-decoration: underline;
        }

        table th {
            color: #000000;
            background: #4FC3A1;
        }

        table th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .buttons {
            position: relative;
            width: 100%;
            margin-left: 50px;
            margin-top: 30px;
            margin-bottom: 70px;
        }

        .buttons p {
            color: #184A78;
        }

        button {
            width: 100px;
            height: 30px;
            background-color: white;
            border-radius: 20px;

        }

        .new_added_row {
            position: relative;
            left: 50px;
            top: -50px;
        }

        .new_added_row input {
            padding: 10px;
            color: #184A78;
        }

        #suggestion {
            position: absolute;
            top: 108px;
            left:450px;
            width: 190px;
            /* height: 100px; */
            background-color: white;
            z-index: 10001;
            display: flex;
            flex-direction: column;
        }
        #suggestion a{
            color:#184A78;
            margin:5px;
            text-decoration: none;
        }
        #content-routes{
            height:200px;
            overflow:scroll;
        }
        .route_add_popup{
            position: fixed;
            top:200px;
            width:100%;
            height: 600px;
            /* background-color: blue; */
            z-index: 20000;
            visibility: hidden;
            display:flex;
            justify-content: center;
        }
    </style>
</head>

<body>


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

    </div>

    <div class="route_add_popup">
        <!-- <?php require 'view_admin_routes_add_successfull.php'; ?> -->
    </div>



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
                    for(i = 0 ; i < data.length ; i++){
                        suggestion.innerHTML += `<a href="#"onclick="set_sales_rep('${data[i]['rep_id']}')">${data[i]['rep_id']}</a>`;
                    }
                    if(rep_id.value == ""){
                        suggestion.innerHTML = ``;
                    }
                    
                });
            
        }

        //set sales rep
        const set_sales_rep = (rep_id) =>{
            rep_id_input.value = rep_id;
            suggestion.innerHTML = ``;
            console.log(rep_id);
        }


        //get routes
        const get_routes = () => {
            fetch('http://localhost/web-Experts/public/admin/get_routes')
                .then(response => response.json())
                .then(data => {

                    for (i = 0; i < data.length; i++) {
                        content_route.innerHTML += `
                
                            <tr>
                                <td>${data[i]['route_id']}</td>
                                <td>${data[i]['end']}</td>
                                <td>${data[i]['route_name']}</td>
                                <td>${data[i]['rep_id']}</td>
                            </tr>
                        
                        `;
                    }



                    console.log(data);
                })
        }

        get_routes();




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

                    
                    if(data[0] == true){
                        
                        console.log('true');
                    }
                    else{
                        
                        console.log('false');
                    }
                    console.log(data_set);
                });
            
        }
    </script>


</body>

</html>