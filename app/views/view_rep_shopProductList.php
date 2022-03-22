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


<!-- ADD HEADER -->

<div class="header">
    <?php require 'view_headertype2.php'; ?>
</div>

    <h2>DAILY PRODUCT LIST</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>

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
    </script>
</body>

</html>