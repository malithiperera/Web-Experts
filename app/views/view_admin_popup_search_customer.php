<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .popup {
        position: fixed;
        top: 70px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .search_customer {
        position: relative;
        width: 400px;
        height: 300px;
        background-color: white;
        border: 1px solid #184A78;
        border-radius: 10px;
    }

    .serach_bar {
        position: relative;
    }

    .search_bar input {
        position: relative;
        top: 20px;
        left: 68px;
        width: 250px;
        height: 30px;
        border-radius: 10px;
        padding-left: 20px;

        color: #184A78;
    }

    .suggestion {
        position: absolute;
        top: 55px;
        left: 70px;
        width: 250px;
        /* height: 100px; */
        background-color: white;
        z-index: 1000;
    }
    .suggestion p{
        margin-left:20px;
    }
    .fa-search {
        position: relative;
        left: 35px;
        top: 23px;
        color: #184A78;
    }

    .search_customer p,
    .search_customer select,
    .search_customer select option {
        color: #184A78;
    }

    .search_customer select {
        width: 100px;
        height: 30px;
    }

    .search_by_route {
        position: relative;
        top: 80px;
        left: 50px;
    }

    .select_route {
        float: left;
        margin-right: 70px;
    }

    .search_by_route a {
        position: relative;
        border: 1px solid #184A78;
        border-radius: 18px;
        top: 30px;
        left: 120px;
        color: #184A78;
        text-decoration: none;
        padding: 8px;
    }

    .search_by_route a:hover {
        background-color: #184A78;
        color: white;
    }

    .add_new_cus a {
        position: relative;
        top: 150px;
        left: 130px;
        text-decoration: none;
        color: #184A78;
    }

    .card i {
        color: black;
    }

    #count {
        color: rgb(45, 211, 45);
        font-size: 25px;
        font-weight: 700;
        margin-top: -10px;

    }

    h3 {
        color: black;
        padding: 10px;
        margin-top: 10px;
        text-align: center;
        text-transform: uppercase;
    }
    .search_customer a{
        color:#184A78;
        text-decoration: none;
    }
</style>

<body>
    <div class="search_customer">
        <div class="search_bar">
            <input type="text" onkeyup="filter_customer()" id="search_customer">
            <div class="suggestion">

            </div>
            <i class="fas fa-search fa-lg"></i>
        </div>
        <div class="search_by_route">

            <div class="select_route">
                <p>Select Route : </p>
                <select name="cars" id="route">
                    <option>route 1</option>
                    <option>route 2</option>
                    <option>route 3</option>
                    <option>route 4</option>
                </select>
            </div>


            <div class="select_customer">
                <p>Select Customer : </p>
                <select name="cars" id="customer">
                    <option>customer 1</option>
                    <option>customer 2</option>
                    <option>customer 3</option>
                    <option>customer 4</option>
                </select>
            </div>

            <a href="#" id="link" onclick="redirect_to_customer_profile()">GO...</a>
        </div>
        <div class="add_new_cus">
            <a href="../admin/add_new_cus">Add New Customer</a>
        </div>
    </div>

    <script>
        search_customer = document.getElementById('search_customer');
        suggestion = document.querySelector('.suggestion');
        route = document.getElementById('route');
        customer = document.getElementById('customer');
        link = document.getElementById('link');

        var customer_to_redirect;

        //search customer using search bar
        const filter_customer = () => {
            var data_set = {
                customer_id: search_customer.value
            }

            fetch('http://localhost/web-Experts/public/admin/search_customer', {
                    method: 'POST', 
                    
                    headers: {
                        'Content-Type': 'application/json'
                      
                    },
                    
                    body: JSON.stringify(data_set) 
                })
                .then(response => response.json())
                .then(data => {
                   suggestion.innerHTML = ``;
                   for(i = 0 ; i < data.length ; i++){
                       suggestion.innerHTML += `<p><a href="#" onclick="redirect_to_customer_profile_searchbar('${data[i]['cus_id']}', '${data[i]['shop_name']}')">${data[i]['cus_id']} ${data[i]['shop_name']}</a></p>`;
                   }
                   if(search_customer.value == ""){
                       suggestion.innerHTML = ``;
                   }
                   console.log(data);
                });
        }

        //search customer using route
        const search_customer_by_route = () => {
            route.innerHTML = ``;
            customer.innerHTML = ``;

            //get routes
            fetch('http://localhost/web-Experts/public/admin/search_customer_by_route_get_route', {})
            .then(response => response.json())
            .then(data => {

                for(i = 0 ; i < data.length ; i++){
                    route.innerHTML += `<option>${data[i]['route_id']}</option>`;
                }
                route.value = "";
                
                console.log(data);
            });
        }
        search_customer_by_route();

        //filter customers in the route
        route.addEventListener("change", () =>{
            var route_to_send = {
                route_id : route.value
            }

            customer.innerHTML = ``;

            fetch('http://localhost/web-Experts/public/admin/filter_customer_in_route', {
                method: 'POST', 
                    
                    headers: {
                        'Content-Type': 'application/json'
                      
                    },
                    
                    body: JSON.stringify(route_to_send) 
            })
            .then(response => response.json())
            .then(data =>{

                for(i = 0 ; i < data.length ; i++){
                    customer.innerHTML += `<option>${data[i]['cus_id']}</option>`;
                }

                customer_to_redirect = customer.value;
                console.log(data);
            });
        });

        //assign customer id when change
        customer.addEventListener("change", () => {
            customer_to_redirect = customer.value;
        });

        //redirect to the particular customer profile
        const redirect_to_customer_profile = () =>{
            window.location.href = "../admin/customerProfile?cus_id="+customer_to_redirect;
        }

        //redirect to customer profile when search by search bar
        const redirect_to_customer_profile_searchbar = (customer_id, shop_name) =>{
            search_customer.value = customer_id+" "+shop_name;
            window.location.href = "../admin/customerProfile?cus_id="+customer_id;
        }

    </script>
</body>

</html>