<?php

require '../app/core/model.php';


class order_model extends model{

    function __construct(){
        parent::__construct();
    }

public function create_bill($cusid)
{ 
    require '../app/core/database.php';
    $sql="SELECT * FROM customer WHERE cus_id='$cusid' ";
    
    $result = mysqli_query($conn, $sql);
    return $result;
    
}




}