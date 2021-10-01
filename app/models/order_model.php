<?php

require '../app/core/model.php';


class order_model extends model{

    function __construct(){
        parent::__construct();
    }

public function create_bill()
{ require '../app/core/database.php';
    $sql="SELECT * FROM product";
    $result = $conn->query($sql);
    return $result;
}




}