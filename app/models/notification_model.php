<?php

require '../app/core/model.php';


class notification_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function load_notification($to_whom, $user_id, $notification_type){
        require '../app/core/database.php';

        $sql = "SELECT * FROM notification WHERE notification_type LIKE '$notification_type'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function load_notification_page($notification_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM notification WHERE notification_id = '$notification_id'";
        $result = mysqli_query($conn, $sql);

        return $result;

    }

    public function product_addition($product_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    //get product details
    public function get_product_details($product_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //get data about credit requests
    public function requst_credit_period($req_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM credit_request,customer,route 
                WHERE 
                credit_request.cus_id = customer.cus_id
                AND
                customer.route_id = route.route_id
                AND
                credit_request.req_id = '$req_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}