<?php

require '../app/core/model.php';


class _3_customer_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function place_order()
    {
        require '../app/core/database.php';
        $records = mysqli_query($conn, "SELECT product_id,name,price FROM product");

        if ($records == true) {
            $data = mysqli_fetch_array($records);
            return $data;
        }
    }

    public function customer_home_detail_check($userid)
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM order WHERE cus_id='$userid' AND status='pending'";
        $query = mysqli_query($conn, $sql);
        if ($query == true) {
            $data = mysqli_fetch_array($query);
            return $data;
        }
    }



    public function get_pending_orders($user_id)
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM orders WHERE cus_id = '$user_id' AND status = 'not-delivered'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function fill_pending_order_table($order_id)
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM order_product,product 
                WHERE 
                order_product.product_id = product.product_id 
                AND 
                order_product.order_id = '$order_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
