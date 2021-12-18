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
    <title>Products</title>

</head>

<body>
    <div class="header">



    </div>

    <div class="container">
        <div class="form"><br>
            <p class="text_addProduct">Add Product</p><br>
            <form action="../product/add_product" method="post" autocomplete="off" enctype="multipart/form-data">
                <p class="label_productId">Product Id</p>
                <input class="input_productId" type="text" name="id" required>

                <p class="label_productName">Product Name</p>
                <input class="input_productName" type="text" name="name" required>

                <p class="label_category">Category</p>
                <select class="input_category" name="category" id="type">
                    <option value="Yoghurt">Yoghurt</option>
                    <option value="IceCream">Ice Cream</option>
                    <option value="Curd">Curd</option>
                    <option value="Milk">Fresh Milk</option>
                </select>

                <!-- <input type="text" name="category" required> -->
                <p class="label_description">Descrption</p>
                <input class="input_description" type="text" name="des" required>

                <p class="label_price">Price</p>
                <input class="input_price" type="text" name="price" required>

                <p class="label_image">Image</p>
                <input class="input_image" type="file" name="file" style="width:90%" class="custom-file-input" required><br>

                <!-- <script src="../../public/java script/view_stockManager_addProducts.js"></script> -->

                <input class="btn_submit" type="submit" name="submit" value="Add to Product"><br>

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