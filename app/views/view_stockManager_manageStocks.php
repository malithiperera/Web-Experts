<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../public/styles/view_stockManager_manageStocks.css">
    <title>Manage Stocks</title>
</head>

<body>
    <?php require 'view_headertype2.php'; ?><br><br><br><br><br>

    <section class="sec_1">
        <fieldset class="mainFieldSet">
            <legend class="leg_productName" id="leg_productName">Product Name</legend><br>

            <div class="inStock">
                <label class="label_inStock" for="quantity">In Stock</label><br>
                <input class="input_inStock" type="text" name="quantity" id="quantity" value="1500">

                <script src="../../public/java script/manageStocks.js"></script>

                <button class="addBtn" onclick="showHideAdd ()"><i class="fas fa-plus"></i></i></button>
                <button class="removeBtn" onclick="showHideRemove ()"><i class="fas fa-minus"></i></button><br><br>

                <div>
                    <input class="inputAdd" type="text" id="inputAdd" placeholder="Amount">
                    <button class="addamountAddBtn" id="addamountAddBtn" onclick="showHideAdd ()"><i class="fas fa-calendar-check"></i></i></button>

                </div>

            </div>

            <div class="divInputRemove">
                <fieldset class="removeStocksFieldset" id="removeStocksFieldset">
                    <label class="labelRomoveQuantity" for="removeQuantity">Quantity</label>
                    <input class="inputRemoveQuantity" type="text" name="removeQuantity" id="removeQuantity" placeholder=" Enter Amount"><br><br>

                    <label class="removeReason" for="removeReason">Reason</label>
                    <input class="inputRemoveReason" type="text" name="removeReason" id="removeReason" placeholder=" Type Reason">

                    <button class="btn_submitRemove" onclick="showHideRemove ()"><i class="fas fa-check"></i></button>

                </fieldset>

            </div>

            <div class="div_currentPrice">
                <label class="label_currentPrice" for="currentPrice">Current Price</label>
                <input class="input_currentPrice" type="text" name="currentPrice" id="currentPrice" value="Rs.">

                <script src="../../public/java script/manageStocks.js"></script>

                <button class="btn_change" onclick="showHideNewPrice ()">Change</button>

            </div>

            <div class="div_newPrice" id="newPrice">
                <label class="label_newPrice" for="newPrice">New Price</label>
                <input class="input_newPrice" type="text" name="newPrice" id="newPrice" value="Rs.">

                <script src="../../public/java script/manageStocks.js"></script>

                <button class="btn_update" onclick="showHideNewPrice ()">Update</button>

            </div>

            <div class="withRep">
                <p class="text_withRep">With Rep</p>
                <table>
                    <thead>
                        <tr>
                            <th>Sales Rep</th>
                            <th>Quantity</th>

                        </tr>

                    </thead>

                    <tbody class="tbody">

                    </tbody>

                </table>

            </div>

            <div class="discount">
                <!-- <h2>Discount</h2> -->
                <div class="div_currentDiscount">
                    <label class="label_currentDiscount" for="currentDiscount">Current Discount</label>
                    <input class="input_currentDiscount" type="text" name="currntDiscount" id="currentDiscount" value="">

                    <script src="../../public/java script/manageStocks.js"></script>

                    <button class="btn_changeDiscount" onclick="showHideNewDiscount ()">Change</button>

                </div>

                <div class="div_newDiscount" id="div_newDiscount">
                    <label class="label_newDiscount" for="newDiscount">New Discount</label>
                    <input class="input_newDiscount" type="text" name="newDiscount" id="newDiscount">

                    <script src="../../public/java script/manageStocks.js"></script>

                    <button class="btn_updateDiscount" onclick="showHideNewDiscount ()">Update</button>

                </div>
            </div>

        </fieldset>

        <!-- <button class="backBtn"></button> -->
        <a href="../stockManager/backToSMHome"><button class="backBtn">Back</button></a>


    </section>

    <script>
        var product_id = '<?php echo $_GET['product_id']; ?>';
        var currentPrice = document.getElementById('currentPrice');
        var productName = document.getElementById('leg_productName');
        var discount = document.getElementById('currentDiscount');


        console.log(product_id);
        // console.log (productName);

        var data_set = {
            product_id: product_id

        }

        const details_of_product = () => {

            fetch('http://localhost/web-Experts/public/stockManager/details_of_product', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify(data_set)

                })
                .then(response => response.json())
                .then(data => {
                    currentPrice.value = "      Rs." + data['price'];
                    productName.innerHTML = data['product_name'];
                    discount.value = "           " + data['discount'] + "%";

                });

        }

        details_of_product();
    </script>

    <script>
        var productId = '<?php echo $_GET['product_id'] ?>';
        var repItemsTable = document.querySelector('.tbody');

        //console.log (productId);
        var productIdData = {
            productId: productId

        }
        //var test = 1103;

        const fillRepItemsTable = () => {
            fetch('http://localhost/web-Experts/public/stockManager/fillRepItemsTable_con', {
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    headers: {
                        'Content-Type': 'application/json'
                        // 'Content-Type': 'application/x-www-form-urlencoded',

                    },
                    body: JSON.stringify(productId)

                })
                .then(response => response.json())
                .then(data => {
                    for (let index = 0; index < data.length; index++) {
                        repItemsTable.innerHTML += `
                            <tr>
                                <td>${data [index] ['rep_id'] + " - " + data [index] ['name']}</td>
                                <td>${data [index] ['qty']}</td>

                            </tr>
                        `;

                    }
                    console.log(data);

                });
        }
        fillRepItemsTable();
    </script>

</body>

</html>