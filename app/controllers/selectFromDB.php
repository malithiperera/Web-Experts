<?php
    $mysqli = new mysqli('localhost', 'root', '', 'items') or die($mysqli->error);

    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);

?>