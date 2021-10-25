<?php

require '../app/core/model.php';


class order_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function create_bill($cusid)
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM customer WHERE cus_id='$cusid' ";

        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function get_route_id($user_id)
    {
        require '../app/core/database.php';
        $sql = "SELECT route_id FROM customer WHERE cus_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function get_order_id()
    {
    }

    public function place_order($amount, $status, $date, $cus_id, $route_id)
    {
        require '../app/core/database.php';
        $sql = "INSERT INTO orders (amount, status, date, cus_id, route_id)
                VALUES ('$amount', '$status', '$date', '$cus_id', '$route_id')";
        mysqli_query($conn, $sql);
    }
}
