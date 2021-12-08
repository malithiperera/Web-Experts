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

        $sql = "SELECT * FROM notification WHERE notification_type LIKE '$notification_type' 
                AND to_whom LIKE '%$to_whom%' OR to_whom LIKE '%$user_id%' ORDER BY date,time ";
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
        require '../app/core/database.php';

        //read delivery table
        $sql1 = "SELECT * FROM delivery WHERE delivery_id = '$delivery_id'";
        $result1 = mysqli_query($conn, $sql1);

        //read order table
        $sql2 = "SELECT * FROM orders WHERE order_id = (SELECT order_id FROM delivery WHERE delivery_id = '$delivery_id')";
        $result2 = mysqli_query($conn, $sql2);

        $result2_data = [];

        while($row = $result2->fetch_assoc()){
            array_push($result2_data, $row);
        }

        //read order_product table
        $sql3 = "SELECT * FROM order_product,product
                 WHERE 
                 order_product.product_id = product.product_id
                 AND
                 order_product.order_id = (SELECT order_id FROM delivery WHERE delivery_id = '$delivery_id')";
        $result3 = mysqli_query($conn, $sql3);

        $result3_data = [];

        while($row1 = $result3->fetch_assoc()){
            array_push($result3_data, $row1);
        }

        //get customer name
        $sql4 = "SELECT name FROM user WHERE user_id = 
                 (SELECT cus_id FROM orders WHERE order_id = 
                 (SELECT order_id FROM delivery WHERE delivery_id = '$delivery_id'))";
        $result4 = mysqli_query($conn, $sql4);

        //get rep name
        $sql5 = "SELECT name FROM user WHERE user_id = 
                (SELECT rep_id FROM route WHERE route_id = 
                (SELECT route_id FROM customer WHERE cus_id = 
                (SELECT cus_id FROM orders WHERE order_id = 
                (SELECT order_id FROM delivery WHERE delivery_id = '$delivery_id'))))";
        $result5 = mysqli_query($conn, $sql5);

        $data = [];
        array_push($data, $result1->fetch_assoc());
        array_push($data, $result2_data);
        array_push($data, $result3_data);
        array_push($data, $result4->fetch_assoc());
        array_push($data, $result5->fetch_assoc());

        return $data;
    }

    //get product issue details for stock crashes notification
    public function stock_crashes($issue_id){
        require '../app/core/database.php';

        $sql1 = "SELECT * FROM product,product_issue_products
                WHERE 
                product_issue_products.product_id = product.product_id
                AND
                product_issue_products.issue_id = '$issue_id'";
        $result1 = mysqli_query($conn, $sql1);

        $data = [];

        $array = [];

        while($row = $result1->fetch_assoc()){
            array_push($array, $row);
        }

        array_push($data, $array);

        $sql2 = "SELECT name FROM product_issue,user
                WHERE 
                product_issue.rep_id = user.user_id
                AND
                product_issue.issue_id = '$issue_id'";
        $result2 = mysqli_query($conn, $sql2);

        array_push($data, $result2->fetch_assoc());


        $sql3 = "SELECT name FROM product_issue,user
                WHERE 
                product_issue.stockmanager_id = user.user_id
                AND
                product_issue.issue_id = '$issue_id'";
        $result3 = mysqli_query($conn, $sql3);

        array_push($data, $result3->fetch_assoc());

        return $data;
    }

    public function get_cheque_details($paymnetID){
        require '../app/core/database.php';
$result_set=array();
$sql="SELECT * FROM payment where payment_id='$paymnetID'";
$result1 = mysqli_query($conn, $sql);
$array = [];

while($row = $result1->fetch_assoc()){
    array_push($array, $row);
}
array_push($result_set,$array);


$sql1="SELECT * FROM cheque where payment_id='$paymnetID'";
$result1 = mysqli_query($conn, $sql1);
$array1 = [];

while($row = $result1->fetch_assoc()){
    array_push($array1, $row);
}
array_push($result_set,$array1);
return $result_set;

    }

   





    public function delivery_confirm($order_id){
        require '../app/core/database.php';
   $result_set=array();
$sql="SELECT * FROM orders where order_id='$order_id'";
$result1 = mysqli_query($conn, $sql);
$array = [];

while($row = $result1->fetch_assoc()){
    array_push($array, $row);
}
array_push($result_set,$array);




$sql3 = "SELECT * FROM order_product,product
WHERE 
order_product.product_id = product.product_id
AND
order_product.order_id = '$order_id'";
$result3 = mysqli_query($conn, $sql3);

$result3_data = [];

while($row1 = $result3->fetch_assoc()){
array_push($result3_data, $row1);
}

array_push($result_set,$result3_data);
return $result_set;


    }

    // public function inform_delivery($order_id){
    //     require '../app/core/database.php';
    //     $sql="UPDATE orders set status='delivered' WHERE order_id='$order_id'";
    //     $result1=mysqli_query($conn,$sql);
    //     // if($result){
    //     //     $date=date("Y/m/d");
    //     //     $t=time();
    //     //     $sql2="INSERT into delivery values('','$date','$t','$order_id','$user_id','HR001','pending');
    //     //     SELECT LAST_INSERT_ID();
    //     //     ";

    //     //    $result2=$conn->multi_query($sql2);
        
            
    //     // }
    //  if($result){
    //      return 1;
    //  }


    // }

   
}