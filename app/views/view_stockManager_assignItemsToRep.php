<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assignItemsToRep.css">
    <title>Assign Items To Rep</title>
</head>

<body>
    <?php require '../header.php'; ?>
    <?php require_once '../controllers/assignItemsToRepProcess.php'; ?>
    <?php require_once '../controllers/selectFromDB.php'; ?>

    <br><br><br><br><br>

    <fieldset class="mainFieldset">
        <legend class="legendRepName">
            <h1>Rep Name</h1>
        </legend><br>

        <table class="table">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Action</th>

                </tr>
            </thead>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['productid']; ?></td>
                            <td><?php echo $row['productname']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>
                                <button class="btnEdit">
                                    <a class="editLink" href="assignItemsToRep.php?edit= <?php echo $row['id']; ?>">Edit</a>

                                </button>

                                <button class="btnDelete">
                                    <a class="deleteLink" href="assignItemsToRepProcess.php?delete= <?php echo $row['id']; ?>">Delete</a>

                                </button>
                            </td>

                        </tr>

                    </tbody>

            <?php
                }
            } ?>

        </table>

        <br><br>

        <div class="formDiv">
            <fieldset class="formFieldset">
                <legend class="legendAddHere"><b>Add Here</b></legend>

                <br>
                <form action="assignItemsToRepProcess.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="productIdDiv">
                        <label class="labelProductId" for="productid">Product Id</label>
                        <input class="inputProdutId" type="text" name="productid" value="<?php echo $productid; ?>">

                    </div><br>

                    <div class="productNameDiv">
                        <label class="labelProductName" for="productname">Product Name</label>
                        <input class="inputProdutName" type="text" name="productname" value="<?php echo $productname; ?>">

                    </div><br>

                    <div class="quantityDiv">
                        <label class="labelQuantity" for="quantity">Quantity</label>
                        <input class="inputQuantity" type="text" name="quantity" value="<?php echo $quantity; ?>">

                    </div><br>

                    <div class="btnAddDiv">
                        <?php
                        if ($update == true) { ?>
                            <button class="btnUpdate" type="submit" name="update">Update</button>

                        <?php
                        } else { ?>
                            <button class="btnAdd" type="submit" name="add">Add</button>

                        <?php
                        } ?>

                    </div>

                </form>

                <br>

            </fieldset>

        </div><br>

    </fieldset>


</body>

</html>