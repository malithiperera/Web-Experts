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

public function get_route_id($user_id){
    require '../app/core/database.php';
    $sql = "SELECT route_id FROM customer WHERE cus_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

public function get_order_id(){
    
}

public function place_order($value)
    {
        require '../app/core/database.php';
        $sql = "INSERT INTO place_order_for_test
                VALUES('$value[0]', '$value[1]', '$value[2]', '$value[3]', '$value[4]')";
        if ($conn->query($sql) == TRUE) {
            return 1;
        } else {
            return mysqli_error($conn);
        }
    }


}