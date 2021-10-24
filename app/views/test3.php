<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre>
    <?php 
    
    
    foreach($this->result as $row){
        echo($row['product_name']);
    }
    
    echo "<br>";

    foreach($this->result as $row){
        echo($row['product_name']);
    }
    ?>
    
    </pre>

</body>

</html>