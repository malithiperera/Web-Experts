<?php

require '../app/core/model.php';

class _2_salesrep_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    // public function load_route(){
    //     require '../app/core/database.php';
    //     $sql = "SELECT orders_id, orders_date, amount FROM orders WHERE status='D'";
    //     $result = $conn->query($sql);
    //     return $result;
    // }
    public function not_delivered()
    {
        require '../app/core/database.php';
        $sql = "SELECT orders_id, orders_date, amount FROM orders WHERE status='D'";
        $result = $conn->query($sql);
        return $result;
    }
    
    public function cash_payment(){
        require '../app/core/database.php';
        $sql = "SELECT orders_id FROM orders WHERE status='D'";
        $result = $conn->query($sql);
        return $result;
    }
    public function order_amount($id){
        require '../app/core/database.php';
        $sql = "SELECT amount FROM orders WHERE orders_id ='$id'";
        $result = $conn->query($sql);
        return $result;
    }
    }

    // public function insert_route($route_id, $name, $destination){
    //     require '../app/core/database.php';
    //     $sql = "INSERT INTO route_for_test
    //             VALUES ('$route_id', '$name', '$destination')";
    //     if($conn->query($sql) == TRUE){
    //         return 1;
    //     }
    //     else{
    //         return mysqli_error($conn);
    //     }
    // }
