<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'himalee_dairy_products_new') or die (mysqli_error($mysqli));

    $result = $mysqli->query("SELECT * FROM product") or die (mysqli_error($mysqli));

?>