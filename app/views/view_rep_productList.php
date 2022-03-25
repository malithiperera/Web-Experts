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
    <title>Product List</title>
    <link rel="stylesheet" href="../../public/styles/view_rep_productList.css">
    <style>
        .requested_qty {
            border: none;
            text-align: center;
            height: 30px;
        }

        .center {
            position: fixed;
            top: 0px;
            width: 100%;
            height: 100vh;
            /* background-color: blue; */
            display: flex;
            justify-content: center;
            visibility: hidden;
        }

        .success_msg_body {
            position: absolute;
            top: 100px;
            background-color: white;
            width: 400px;
            height: 250px;
            border: 4px solid #184A78;
            border-radius: 20px;
            visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .success_msg {
            align-self: center;
            margin-bottom: 20px;
        }

        .done_button {
            width: 100px;
            border-radius: 20px;
            background-color: #184A78;
            color:white;
            align-self: center;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <?php require 'view_headertype2.php'; ?>
        </div>
        <h2>DAILY PRODUCT LIST</h2>

        <div class="data_form">
            <div class="search_product">
                <input type="text" id="product_name" placeholder="Search Product" onkeyup="fetchText(this.value)">
                <div>
                    <ul class="suggestions">

                    </ul>
                </div>
            </div>

            <input type="text" id="quantity" placeholder="quantity">

            <button id="new" onclick="add_product()"><i class="fas fa-plus"></i>Add New</button>
        </div>

        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Requested Quantity</th>

                    </tr>
                </thead>
                <tbody class="content">

                </tbody>

            </table>
        </div>
        <div class="input-fields"><input type="submit" value="Back" id="back" onclick="window.location.href='../salesRep/home';"></div>
        <div class="input-fields"><input type="submit" value="Confirm" id="confirm" onclick="confirm_product_list()"></div>
    </div>
    <div class="center"></div>
    <script>
        content = document.querySelector('.content');

        var data_set = {
            route_id: '<?php echo $_GET['route_id']; ?>'
        }

        const get_product = () => {
            fetch('http://localhost/web-Experts/public/salesRep/get_product', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {

                    for (i = 0; i < data.length; i++) {
                        content.innerHTML += `
                    
                            <tr>
                            <td>${data[i]['product_name']}</td>
                            <td>${data[i]['SUM(quantity)']}</td>
                            <td><input type="text" id="${data[i]['product_name']}" class="requested_qty" value="${data[i]['SUM(quantity)']}"></td>
                            </tr>

                            `;
                    }

                    console.log(data);
                });
        }

        get_product();

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

                    suggestions.innerHTML += `<li><a href="#" onclick="select_row('${item['product_name']}')">${item['product_name']}</a></li>`;
                }

            }).catch(reason => {
                console.log(reason);
            })
        }

        //fill another fields according to the product name
        let product_name_input = document.getElementById('product_name');
        let quantity = document.querySelector('#quantity');
        let container = document.querySelector('.container');

        function select_row(product_name) {
            product_name_input.value = `${product_name}`;
            suggestions.innerHTML = ``;

            console.log(product_name);
        }

        function add_product() {

            content.innerHTML += `
                    
                            <tr>
                            <td>${product_name_input.value}</td>
                            <td>${quantity.value}</td>
                            <td><input type="text" id="${product_name}" class="requested_qty" value="${quantity.value}"></td>
                            </tr>

                            `;
            product_name_input.value = ``;
            quantity.value = ``;
        }

        //function of confirm button
        let user_id = "<?php echo $_SESSION['userid'] ?>";

        function confirm_product_list() {
            let product_table = document.querySelector('.fl-table');
            let table_length = product_table.rows.length;

            let dataset = new Array(4)

            dataset[0] = new Array(table_length - 1);
            dataset[1] = new Array(table_length - 1);
            dataset[2] = new Array(table_length - 1);
            dataset[3] = user_id;

            for (let i = 1; i < table_length; i++) {
                let row = product_table.rows[i];

                dataset[0][i - 1] = row.cells[0].innerHTML;
                dataset[1][i - 1] = row.cells[1].innerHTML;
                dataset[2][i - 1] = row.cells[2].children[0].value;


            }
            console.log(dataset);


            fetch('http://localhost/web-Experts/public/salesRep/request_product_from_stock', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(dataset)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data == 0) {
                        content.innerHTML = ``;
                        console.log("successfully added");
                        success_msg_body.style.visibility = "visible";
                        container.style.opacity = "30%";
                    }
                });
        }


        //successfully requested msg
        let center = document.querySelector('.center');

        let success_msg_body = document.createElement('DIV');
        success_msg_body.classList.add("success_msg_body");
        center.appendChild(success_msg_body);

        let success_msg = document.createElement('P');
        success_msg.classList.add("success_msg");
        success_msg_body.appendChild(success_msg);
        success_msg.innerHTML = `Successfully Requested the product list`;

        let done_button = document.createElement('BUTTON');
        done_button.classList.add("done_button");
        success_msg_body.appendChild(done_button);
        done_button.innerHTML = `Done`;
        done_button.setAttribute("onclick", "done_function()");

        function done_function() {
            success_msg_body.style.visibility = "hidden";
            container.style.opacity = "100%";
            window.location.href='../salesRep/home';
        }
    </script>
</body>

</html>