<?php

require '../app/core/model.php';


class home_model extends model
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

    public function get_orders()
    {
        // require '../app/core/database.php';
        // $sql="SELECT * FROM order WHERE cus_id='$userid' AND status='pending'";
        // $query=mysqli_query($conn,$sql);



        return "Malithi";
    }
}
