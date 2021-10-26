<?php

require '../app/core/model.php';


class cus_model extends model
{

    function __construct()
    {
        parent::__construct();
    }


    function get_home_orders($user)
    {

        require '../app/core/database.php';
        $sql = "SELECT * FROM orders WHERE cus_id='$user'";
        $result = $conn->query($sql);
        return $result;
    }


    function get_home_cards($userid)
    {
        require '../app/core/database.php';
       
        $result = array();

        // count products
        $sql1 = "SELECT COUNT(product_id) AS count_products FROM product";
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());

        // count salesreps
        $sql2 = "SELECT COUNT(order_id) AS pending_orders FROM orders WHERE cus_id='$userid' AND status='not-delivered'";
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        // count customers
        // $sql3 = "SELECT COUNT(cus_id) AS count_customer FROM customer";
        // $result3 = mysqli_query($conn, $sql3);
        // array_push($result, $result3->fetch_assoc());

        // // count routes
        // $sql4 = "SELECT COUNT(route_id) AS count_route FROM route";
        // $result4 = mysqli_query($conn, $sql4);
        // array_push($result, $result4->fetch_assoc());

        // count pending orders
        // $sql5 = "SELECT COUNT(order_id) AS count_order FROM orders";
        // $result5 = mysqli_query($conn, $sql5);
        // array_push($result, $result5->fetch_assoc());

        // count overdue deliveries



        return $result;

    }


}