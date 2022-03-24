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
</head>

<body>
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

                <input type="text" id="quantity" placeholder="quantity" onkeyup=" cal_tot_suggest()">
               
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
    <div class="input-fields"><input type="submit" value="Confirm" id="confirm"></div>
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


    </script>
</body>

</html>