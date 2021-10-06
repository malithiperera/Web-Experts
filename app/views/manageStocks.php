<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manageStocks.css">
    <title>Manage Stocks</title>
</head>

<body>
    <?php require 'header.php'; ?><br><br><br><br><br>

    <section class="sec_1">
        <fieldset class="mainFieldSet">
            <legend class="leg_productName">Product Name</legend><br>

            <div class="inStock">
                <label class="label_inStock" for="quantity">In Stock</label><br>
                <input class="input_inStock" type="text" name="quantity" id="quantity">

                <script src="../../public/java script/manageStocks.js"></script>

                <button class="addBtn" onclick="showHideAdd ()">+</button>
                <button class="removeBtn" onclick="showHideRemove ()">-</button><br><br>

                <input class="inputAdd" type="text" id="inputAdd">

                <div class="divInputRemove">
                    <fieldset class="removeStocksFieldset" id="removeStocksFieldset">
                        <label class="labelRomoveQuantity" for="removeQuantity">Quantity</label>
                        <input class="inputRemoveQuantity" type="text" name="removeQuantity" id="removeQuantity"><br><br>

                        <label class="removeReason" for="removeReason">Reason</label>
                        <input class="inputRemoveReason" type="text" name="removeReason" id="removeReason">
                    </fieldset>
                </div>

            </div>

            <div class="withRep">
                <h1 class="text_withRep">With Rep</h1>
                <table>
                    <tr>
                        <th>Rep Id</th>
                        <th>Quantity</th>

                    </tr>

                    <tr>
                        <td>1</td>
                        <td>100</td>

                    </tr>

                    <tr>
                        <td>1</td>
                        <td>100</td>

                    </tr>

                    <tr>
                        <td>1</td>
                        <td>100</td>

                    </tr>

                    <tr>
                        <td>1</td>
                        <td>100</td>

                    </tr>

                </table>
            </div>

            <div class="discount">
                <fieldset class="fieldSet_discount">
                    <legend class="leg_discount">Discount</legend>

                    <label class="label_discount" for="percentage">Percentage</label><br>
                    <input class="input_discount" type="text" name="percentage" id="percentage"><br><br>

                    <h1 class="or">OR</h1><br><br><br>

                    <label for="buy" class="label_buy">Buy</label>
                    <input type="text" class="input_buy" name="buy" id="buy">

                    <label class="label_get" for="get">Get</label>
                    <input class="input_get" type="text" name="get" id="get"><br><br>

                </fieldset>
            </div>

        </fieldset>

        <button class="backBtn">Back</button>

    </section>

</body>

</html>