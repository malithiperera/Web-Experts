<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../public/styles/view_stockManager_manageStocks.css">
    <title>Manage Stocks</title>
    <!-- <script src="https://kit.fontawesome.com/d2020d2b7c.js" crossorigin="anonymous"></script> -->
    <style>
        .pop_up {
            width: 100%;
            height: 500px;
            /* background-color: red; */
            margin-top: -600px;
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;

        }

        /* .pop_up_msg {
            width: 300px;
            background-color: #fff;
            height: 300px;
            border: 3px solid black;
        } */
    </style>
</head>

<body>
    <br><br><br><br><br>


    <section class="sec_1">
        <fieldset class="mainFieldSet">
            <legend class="leg_productName" id="leg_productName">Product Name</legend><br>

            <div class="inStock">
                <label class="label_inStock" for="quantity">In Stock</label><br>
                <input class="input_inStock" type="text" name="quantity" id="quantity" value="" readonly>

                <script src="../../public/java script/manageStocks.js"></script>

                <button class="addBtn" onclick="showHideAdd ()">

                </button>
                <button class="removeBtn" onclick="showHideRemove ()">
                    <!--i class="fas fa-minus"--></i>
                </button><br><br>

                <!-- <div class="classA">
                    <input class="inputAdd" type="text" id="inputAdd" placeholder="Amount">
                    <button class="addamountAddBtn" id="addamountAddBtn" onclick="myfunc()"> -->
                <!--i class="fas fa-calendar-check"></i-->
                <!-- </button>

                </div> -->
                <div class="addAmountDiv">
                    <fieldset class="addAmountFieldset">
                        <input type="text" class="addAmountInput">
                        <!-- <a href="../stockManager/backToSMHome"><button class="submitAddAmount">S</button></a> -->
                        <button class="submitAddAmount" onclick="showHideConfirmAdd ()"></button>

                    </fieldset>
                </div>

            </div>

            <div class="divInputRemove">
                <fieldset class="removeStocksFieldset" id="removeStocksFieldset">
                    <label class="labelRomoveQuantity" for="removeQuantity">Quantity</label>
                    <input class="inputRemoveQuantity" type="text" name="removeQuantity" id="removeQuantity" placeholder=" Enter Amount"><br><br>

                    <label class="removeReason" for="removeReason">Reason</label>
                    <input class="inputRemoveReason" type="text" name="removeReason" id="removeReason" placeholder=" Type Reason">

                    <a href="#" onclick="myfunc()">
                        <button class="btn_submitRemove"></button>

                    </a>

                    <!-- <button class="btn_submitRemove" onclick="showHideRemove ()"> -->
                    <!--i class="fas fa-check"></i-->
                    <!-- </button> -->

                </fieldset>

            </div>

            <fieldset class="fieldsetPrice">
                <legend>Price</legend>
                <!-- <div class="a"> -->

                </div>
                <!-- <h1>shirantha</h1> -->
                <div class="div_currentPrice">

                    <label class="label_currentPrice" for="currentPrice">Current Price</label>
                    <input class="input_currentPrice" type="text" name="currentPrice" id="currentPrice" value="Rs." readonly>

                    <script src="../../public/java script/manageStocks.js"></script>

                    <button class="btn_change" onclick="showHideNewPrice ()">Change</button>

                </div>

                <div class="div_newPrice" id="newPrice">
                    <label class="label_newPrice" for="newPrice">New Price</label>
                    <input class="input_newPrice" type="text" name="newPrice" id="newPrice" value="">

                    <script src="../../public/java script/manageStocks.js"></script>

                    <button class="btn_update">Update</button>

                </div>
            </fieldset>

            <div class="withRep">
                <p class="text_withRep">With Rep</p>
                <div class="repTable">
                    <table>
                        <!-- <div class="repTable"> -->
                        <thead>
                            <tr>
                                <th>Sales Rep</th>
                                <th>Quantity</th>

                            </tr>

                        </thead>


                        <tbody class="tbody">

                        </tbody>

                </div>

                </table>

            </div>
            <fieldset class="fieldsetDiscount">
                <legend>Discount</legend>
                <div class="discount">
                    <!-- <h2>Discount</h2> -->
                    <div class="div_currentDiscount">
                        <label class="label_currentDiscount" for="currentDiscount">Current Discount</label>
                        <!-- <label class="label_currentDiscount" for="currentDiscount">Current Discount</label>
                        <input class="input_currentDiscount" type="text" name="currntDiscount" id="currentDiscount" value="" readonly> -->
                        <input class="input_currentDiscount" type="text" name="currntDiscount" id="currentDiscount" value="" readonly>

                        <!-- notify limit of product to notify the stock manager -->
                        <!-- <label for="" class="notify_limit_label">Notify Limit </label>
                    <input type="text" id="notify_limit_input"> -->

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

            <!-- </div> -->

        </fieldset>

        <!-- <button class="backBtn"></button> -->
        <a href="../stockManager/backToSMHome"><button class="backBtn">Back</button></a>


    </section>
    <!-- <div class="messagecontainer">
        <div class="messageArea">
            <div class="checkIcon">

                <i class="fa-solid fa-location-question"></i>
            </div>
            <div class="popUpTextArea_1">
                <h2>Are you sure</h2>

            </div>

            <div class="popUpTextArea_2">
                <h2>removing 50 items ?</h2>
            </div>
            <div class="divDoneBTN">
                <button class="Yes">Yes</button>
            </div>

            <div class="divDoneBTN">
                <button class="No">No</button>
            </div> -->

    <!-- </div> -->

    <div class="pop_up">
        <!-- Adding confirmation pop up-->
        <div class="pop_up_msg">
            <div class="confirmTextArea_1">
                <h2>Are you sure adding 50 items ?</h2>

            </div>

            <div class="Btn">
                <button class="yes" onclick="change(); showHideAdd (); validateEmptyAndMinusValues ();">Yes</button>
                <button class="no" onclick="hideAddConfirmMessage ()">No</button>

            </div>
        </div>
    </div>

    <!-- <div class="addedSuccessfullyPopUp">
            <div class="addedSuuccessfullyMessage">
                <div class="successfullText">

                </div>
            </div>
        </div> -->

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
                    console.log(data);
                    currentPrice.value = "      Rs." + data['price'];
                    productName.innerHTML = data['product_name'];
                    discount.value = "           " + data['discount'] + "%";

                });

        }

        details_of_product();

        function getcurrentStock() {



            fetch('http://localhost/web-Experts/public/stockManager/currentstock', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify("data_set")

                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                });

        }






        getcurrentStock();



        var productId = '<?php echo $_GET['product_id'] ?>';
        var repItemsTable = document.querySelector('.tbody');

        //console.log (productId);
        var productIdData = {
            productId: productId

        }
        var test = 1103;

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

        var btnUpdate = document.querySelector(".btn_update")
        var productId = '<?php echo $_GET['product_id']; ?>'
        var newPrice = document.querySelector(".input_newPrice")

        btnUpdate.addEventListener("click", () => {
            var productId = '<?php echo $_GET['product_id']; ?>'
            let dataSet = {
                productId: productId,
                newPrice: newPrice.value

            }
            console.log(dataSet)
            fetch('http://localhost/web-Experts/public/stockManager/updatePrice_con', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'

                    },
                    body: JSON.stringify(dataSet)

                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)

                })
            // console.log (dataSet)

        })

        // <!-- change the notify limit to stockmanager -->

        let notify_limit_input = document.getElementById('notify_limit_input');

        fetch('http://localhost/web-Experts/public/stockManager/initial_information', {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                headers: {
                    'Content-Type': 'application/json'
                    // 'Content-Type': 'application/x-www-form-urlencoded',

                },
                body: JSON.stringify(productId)
            })
            .then(response => response.json())
            .then(data => {
                notify_limit_input.value = data['notify_limit'];
            });




        let type = "<?php echo $_SESSION['type']; ?>"
        console.log(type);


        if (type == "stockmanager") {
            var disbutton = document.querySelector('.btn_changeDiscount');
            var price = document.querySelector('.btn_change');
            price.style.visibility = "hidden";
            disbutton.style.visibility = "hidden";

        }


        function currentStock() {
            var currentStock = document.querySelector('.input_inStock');

            fetch('http://localhost/web-Experts/public/stockManager/currentStock', {
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    headers: {
                        'Content-Type': 'application/json'
                        // 'Content-Type': 'application/x-www-form-urlencoded',

                    },
                    body: JSON.stringify(productId)
                })

                .then(response => response.json())
                .then(data => {
                    currentStock.value = data['qty'];
                });

        }
        currentStock();

        var btnRemove = document.querySelector('.btn_submitRemove') // remove stocks
        var removeAmount = document.querySelector('.inputRemoveQuantity')

        btnRemove.addEventListener('click', () => {
            let dataSet = {
                productId: productId,
                amount: removeAmount.value

            }
            // console.log (dataSet)
            fetch('http://localhost/web-Experts/public/stockManager/removeStocks_con', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'

                    },
                    body: JSON.stringify(dataSet)

                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)

                })
        })

        function myfunc() {
            console.log("Malithii")
        }

        var addBtn = document.querySelector('.yes') // add amount
        var addAmount = document.querySelector('.addAmountInput')

        addBtn.addEventListener('click', () => {

            let dataSet = {
                productId: productId,
                amount: addAmount.value

            }
            console.log(dataSet)
            fetch('http://localhost/web-Experts/public/stockManager/addStocks_con', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'

                    },
                    body: JSON.stringify(dataSet)

                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)

                })
        })

        function validateEmptyAndMinusValues() {
            if (addAmount.value == '' || addAmount.value <= 0) {
                var popUpText = document.querySelector('.confirmTextArea_1').innerHTML = `
                    <h2>Invalid input or empty input</h2>
                
                `

                var tryAgain = document.querySelector('.Btn').innerHTML = `
                    <button class="tryAgainBtn" onclick="showHideConfirmAdd ()">Try Again</button>
                
                `
            }
        }

        function myfunc() {
            var removeqty = document.querySelector('.inputRemoveQuantity').value;

            window.location.href = "http://localhost/web-Experts/public/stockManager/popUpComfirm?removeqty=" + removeqty
        }

        function addingConfirmation() {                                                     // if add amount input is not empty the 1st pop up be
            var confirmationText = document.querySelector('.confirmTextArea_1').innerHTML = `
                <h2>Are you sure adding 50 items ?</h2>

            `

            
        }

        function change() { // load content of the 'added successfully ' message
            var text = document.querySelector('.confirmTextArea_1').innerHTML = `
                <h2>Added successfully</h2>

            `
            // done btn of the 'added successfully' message
            var doneBtn = document.querySelector('.Btn').innerHTML = `                          
                <button class="addedSuccessfullyDoneBtn" onclick="showHideConfirmAdd ()">OK</button>

            `
        }
    </script>



</body>

</html>