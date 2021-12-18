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

        //count due payments
        $sql3 = "SELECT COUNT(delivery_id) AS count_deliver FROM delivery WHERE cus_id='$userid'";
        $result3 = mysqli_query($conn, $sql3);
        array_push($result, $result3->fetch_assoc());

        $sql4 = "SELECT route_id AS routes FROM customer WHERE cus_id='$userid'";
        $result4 = mysqli_query($conn, $sql4);
        array_push($result, $result4->fetch_assoc());

        $sql5 = "SELECT name AS rep_name FROM user WHERE user_id=(SELECT rep_id FROM route WHERE route_id=(SELECT route_id FROM customer WHERE cus_id='$userid'));";
         $result6 = mysqli_query($conn, $sql5);
        array_push($result, $result6->fetch_assoc());

        $sql6 = "SELECT shop_name FROM customer WHERE cus_id='$userid';";
         $result7 = mysqli_query($conn, $sql6);
        array_push($result, $result7->fetch_assoc());

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
   
    public function fill_deliveries($user){

        require '../app/core/database.php';
         $data=[];
        $data_set=[];
        $sql = "SELECT * FROM delivery,orders WHERE delivery.order_id=orders.order_id";
        $result = $conn->query($sql);
        while($row1 = $result->fetch_assoc()){
            array_push($data_set,$row1);
            }
            
        $sql1="SELECT credit_time FROM customer WHERE cus_id='HC001'";
        $result1 = $conn->query($sql1);
        $credit=$result1->fetch_assoc();
        array_push($data,$credit);

        array_push($data,$data_set);
        
        
            
        
       
         return $data;
    }



    public function order_table($userid)
    {
        $sql="SELECT * FROM orders WHERE cus";
    }




    public function fill_creit_request($userid){

        $result = array();

    require '../app/core/database.php';
    $sql="SELECT * FROM customer WHERE cus_id='$userid' ";
    $result= $conn->query($sql);
    // array_push($result, $result1->fetch_assoc());


    // // $sql1="SELECT  FROM user WHERE user_id='$userid' ";
    // // $result2 = $conn->query($sql1);

    // array_push($result, $result2->fetch_assoc());

    
    return $result;

}


public function customer_request($id,$new_pro,$reason)
{
    require '../app/core/database.php';
    $sql="INSERT INTO `credit_request` ( `cus_id`, `request_period`, `reason`) VALUES ( '$id', '$new_pro', '$reason');";
    if($conn->query($sql)){
return 1;
    }
    else{
        return 0;
    }

}
//overdue
public function get_overdue($data)
{
require '../app/core/database.php';
$sql="SELECT credit_time FROM customer WHERE cus_id='$data'";
$result=mysqli_query($conn,$sql);
$data_set=[];
if($result){
   $credit=$result->fetch_assoc();
   array_push($data_set,$credit);

   $del_set=[];
   $sql1="SELECT * FROM delivery WHERE cus_id='$data' AND status='pending'";
   $result1=mysqli_query($conn,$sql1);
   while($row1 = $result1->fetch_assoc()){
    array_push($del_set,$row1);
    }
    array_push($data_set,$del_set);



    }


   return $data_set;
    
}
}


