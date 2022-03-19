<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../public/styles/view_stockmanager_addproduct.css">
    <script defer src="../../public/java script/validate.js"></script>
    <title>Products</title>

</head>

<body>
    <!-- <div id="error" class="error"></div> -->
    <!-- <div class="header">
    </div> -->

    <div class="container">
        <div class="form"><br>
            <p class="text_addProduct">Add Product</p><br>
            <form id="productForm" action="../product/add_product" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="input_control">
                    <p class="label_productId">Product Id</p>
                    <input id="input_productId" class="input_productId" type="text" name="id">
                    <div class="error"></div>

                </div>
                <!-- <p class="label_productId">Product Id</p>
                <input id="input_productId" class="input_productId" type="text" name="id">
                <div class="error"></div> -->

                <div class="input_control">
                    <p class="label_productName">Product Name</p>
                    <input id="input_productName" class="input_productName" type="text" name="name">
                    <div class="error"></div>

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
                    <div class="error"></div>

                </div>
                <!-- <p class="label_description">Descrption</p>
                <input id="input_description" class="input_description" type="text" name="des"> -->

                <div class="input_control">
                    <p class="label_price">Price</p>
                    <input id="input_price" class="input_price" type="text" name="price">
                    <div class="error"></div>

                </div>
                <!-- <p class="label_price">Price</p>
                <input id="input_price" class="input_price" type="text" name="price"> -->

                <div class="inputcontrol">
                    <p class="label_image">Image</p>
                    <input class="input_image" type="file" name="file" style="width:90%" class="custom-file-input"><br>
                    <div class="error"></div>

                </div>
                <!-- <p class="label_image">Image</p>
                <input class="input_image" type="file" name="file" style="width:90%" class="custom-file-input"><br> -->

                <!-- <script src="../../public/java script/view_stockManager_addProducts.js"></script> -->

                <input class="btn_submit" type="submit" name="submit" value="Add to Products"><br>

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
    <div class="div_messageContainer">
        <div class="div_messageArea" id="div_messageArea">
            <h4>Added Successfully</h4>

            <script src="../../public/java script/view_stockManager_addProducts.js"></script>

            <button onclick="popSuccessMsg ()">OK</button>

        </div>

    </div>

    <div class="div_btnBack">
        <a href="../stockManager/backToSMHome"><button class="btn_back">Back</button></a>

    </div>

</body>

</html>

<?php
unset($_SESSION["error"]);
?>