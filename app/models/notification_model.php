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

    //get customer request details for front subject
    public function get_credit_request_details($req_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM credit_request,customer
                WHERE
                credit_request.cus_id = customer.cus_id
                AND
                credit_request.req_id = '$req_id'";

        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //get details about returns
    public function add_returns($return_id){
        require '../app/core/database.php';

        //to get rep details
        $sql1 = "SELECT * FROM returns,user
                WHERE 
                returns.rep_id = user.user_id
                AND
                return_id = '$return_id'";
        $result1 = mysqli_query($conn, $sql1);

        $rep_details = $result1->fetch_assoc();
        $rep_name = $rep_details['name'];

        //to get customer details 
        $sql2 = "SELECT * FROM returns,user
                WHERE 
                returns.cus_id = user.user_id
                AND
                return_id = '$return_id'";
        $result2 = mysqli_query($conn, $sql2);

        $cus_details = $result2->fetch_assoc();
        $cus_name = $cus_details['name'];


        $sql3 = "SELECT * FROM return_product,product
                 WHERE 
                 return_product.product_id = product.product_id
                 AND
                 return_product.return_id = '$return_id'";

        $result3 = mysqli_query($conn, $sql3);

        $return_details = [];

        while($row = $result3->fetch_assoc()){
            array_push($return_details, $row);
        }

        
        $data = [];

        array_push($data, $rep_name);
        array_push($data, $cus_name);
        array_push($data, $return_details);

        return $data;
    }

    //get delivery details
    public function confirm_delivery($delivery_id){
        
    }

   
}