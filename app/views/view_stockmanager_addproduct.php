<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../public/styles/view_stockmanager_addproduct.css">
    <!-- <script defer src="../../public/java script/validate.js"></script> -->
    <script src="https://kit.fontawesome.com/d2020d2b7c.js" crossorigin="anonymous"></script>
    <title>Products</title>

</head>
<style>
    .messagecontainer {
        visibility: hidden;

    }

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

    .pop_up_msg {
        width: 500px;
        background-color: #fff;
        height: 300px;
        border: 3px solid #184A78;

    }
</style>

<body>
    <!-- <div id="error" class="error"></div> -->
    <!-- <div class="header">
    </div> -->

    <div class="container">
        <div class="form"><br>
            <p class="text_addProduct">Add Product</p><br>
            <form id="productForm" action="../product/add_product" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="validate ()">
                <div class="input_control">
                    <p class="label_productId">Product Id</p>
                    <input id="input_productId" class="input_productId" type="text" name="id" onkeyup="errorProductId ()">
                    <span class="errorPId"></span>

                </div>
                <!-- <p class="label_productId">Product Id</p>
                <input id="input_productId" class="input_productId" type="text" name="id">
                <div class="error"></div> -->

                <div class="input_control">
                    <p class="label_productName">Product Name</p>
                    <input id="input_productName" class="input_productName" type="text" name="name">
                    <span></span>

                </div>
                <!-- <p class="label_productName">Product Name</p>
                <input id="input_productName" class="input_productName" type="text" name="name"> -->

                <p class="label_category">Category</p>
                <select class="input_category" name="category" id="type">
                    <option value="Yoghurt">Yoghurt</option>
                    <option value="IceCream">Ice Cream</option>
                    <option value="Curd">Curd</option>
                    <option value="Milk">Fresh Milk</option>
                </select>

                <!-- <input type="text" name="category" required> -->
                <div class="input_control">
                    <p class="label_description">Descrption</p>
                    <input id="input_description" class="input_description" type="text" name="des">
                    <span></span>

                </div>
                <!-- <p class="label_description">Descrption</p>
                <input id="input_description" class="input_description" type="text" name="des"> -->

                <div class="input_control">
                    <p class="label_price">Price</p>
                    <input id="input_price" class="input_price" type="text" name="price">
                    <span></span>

                </div>
                <!-- <p class="label_price">Price</p>
                <input id="input_price" class="input_price" type="text" name="price"> -->

                <div class="inputcontrol">
                    <p class="label_image">Image</p>
                    <input class="input_image" type="file" name="file" style="width:90%" class="custom-file-input"><br>
                    <span></span>

                </div>
                <!-- <p class="label_image">Image</p>
                <input class="input_image" type="file" name="file" style="width:90%" class="custom-file-input"><br> -->

                <!-- <script src="../../public/java script/view_stockManager_addProducts.js"></script> -->

                <a href="../stockManager/backToSMHome"><button class="addToStocks">Add</button></a>

                <!-- <input class="btn_submit" type="submit" name="submit" value="Add to Products" onclick="showHidePopUp()"><br> -->
                <!-- <button type="submit" class="btn_submit"  name="submit" value="Add to Products"></button> -->

                <div class="error">
                    <?php
                    if (isset($_SESSION["error"])) {
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                    ?>

                </div>

            </form>

        </div>

    </div>
    <div class="pop_up">
        <div class="pop_up_msg">
            <div class="    ">
                <h2>The Product added successfully.</h2>

            </div>

            <div class="divBtnOk">
                <button class="okBtn" onclick="showHidePopUp ()">OK</button>

            </div>
        </div>
    </div>
    <!-- <div class="div_messageContainer">
        <div class="div_messageArea" id="div_messageArea">
            <h4>Added Successfully</h4>

            <script src="../../public/java script/view_stockManager_addProducts.js"></script>

            <button onclick="popSuccessMsg ()">OK</button>

        </div>

    </div> -->
    <!-- <div class="messagecontainer">
        <div class="messageArea">
            <div class="checkIcon">
                <h4>shirantha</h4> -->
    <!-- <i class="fa-solid fa-circle-check fa-3x"></i>
            </div>
            <div class="popUpTextArea">
                <h2>The product added</h2>

            </div>
            <div class="popUpTextArea2">
                <h2>Successfully</h2>

            </div>
            <div class="divDoneBTN">
                <button class="done" onclick="backToAddProduct ()">done</button>
            </div>

        </div>

    </div> -->

    <div class="div_btnBack">
        <a href="../stockManager/backToSMHome"><button class="btn_back">Back</button></a>

    </div>
    <script>
        // var error = "<?php echo $this->added; ?>";
        // console.log(error);
        // if (error == 1) {
        //     document.querySelector('.messagecontainer').style.visibility = "visible"
        //     // console.log("shir")

        // }

        function backToAddProduct() {
            document.querySelector('.messagecontainer').style.visibility = "hidden"

        }
        backToAddProduct()

        var productId = document.querySelector('.input_productId').value
        var productIdError = document.querySelector('.errorPId').value

        function errorProductId() {
            if (productId == '') {
                productIdError.innerHTML = "Error"

            }
        }

        function showHidePopUp() {
            var a = 1
            if (a == 1) {
                document.querySelector('.pop_up').style.visibility = "visible"
                return a = 0

            } else {
                document.querySelector('.pop_up').style.visibility = "hidden"
                return a = 1

            }
        }
    </script>
</body>

</html>