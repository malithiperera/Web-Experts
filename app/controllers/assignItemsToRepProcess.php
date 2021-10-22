<?php 
    $productid = '';
    $productname = '';
    $quantity = '';
    $id = 0;
    $update = false;

    $mysqli = new mysqli('localhost', 'root', '', 'items') or die (mysqli_error($mysqli));    # database connection

    if (isset ($_POST ['add'])) {
        # code...
        $productid = $_POST ['productid'];
        $productname = $_POST ['productname'];
        $quantity = $_POST ['quantity'];

        $mysqli->query("INSERT INTO data (productid, productname, quantity) VALUES ('$productid', '$productname', '$quantity')") or 
        die (mysqli_error($mysqli));
        
        header("location: assignItemsToRep.php");

    }
    if (isset ($_GET ['delete'])) {
        $id = $_GET ['delete'];

        $mysqli->query("DELETE FROM data WHERE id = $id") or die (mysqli_error($mysqli));

        header("location: assignItemsToRep.php");

    }
    if (isset ($_GET ['edit'])) {
        $id = $_GET ['edit'];
        $update = true;

        $result = $mysqli->query("SELECT * FROM data WHERE id = $id") or die ($mysqli->error);

        $row = $result->fetch_array();
        $productid = $row ['productid'];
        $productname = $row ['productname'];
        $quantity = $row ['quantity'];

    }
    if (isset ($_POST ['update'])) {
        $id = $_POST ['id'];
        $productid = $_POST ['productid'];
        $productname = $_POST ['productname'];
        $quantity = $_POST ['quantity'];

        $mysqli->query("UPDATE data SET productid = '$productid', productname = '$productname', quantity = '$quantity' WHERE id = $id")
        or die ($mysqli->error);

        header("location: assignItemsToRep.php");
        
    }

?>