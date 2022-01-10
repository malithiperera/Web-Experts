<?php

require '../app/core/model.php';


class payment_model extends model
{

    function __construct()
    {
        parent::__construct();
    }
public function online_payments($orderId){
    require '../app/core/database.php';
  $data_set=[];
  $sql="SELECT * FROM delivery,orders WHERE delivery.order_id='$orderId' and orders.order_id='$orderId'";
 $result=mysqli_query($conn,$sql);


    // $sql1="UPDATE delivery
    // SET status = 'payed'
    // WHERE order_id='$orderId' ";
    // $result1=mysqli_query($conn,$sql1);

    // if($result1){
    //     $sql2="INSERT INTO payment values('',$data_set['amount']) ";
    // $result1=mysqli_query($conn,$sql2);

    // }
   
    return $result;

}

public function online_payments_update($delivery_id,$amount,$orderId){

    require '../app/core/database.php';
    date_default_timezone_set('Asia/Colombo');
  $sql1="UPDATE delivery
    SET status = 'payed'
    WHERE order_id='$orderId' ";
    $result1=mysqli_query($conn,$sql1);
    
    if($result1){
        $date=date("Y.m.d");
        $timestamp = time();
        $time=date("h:i:s", $timestamp);
        $sql2="INSERT INTO payment values('','$amount','$date','$time','online','$orderId','$delivery_id') ";
       $result2=mysqli_query($conn,$sql2);
       return $result2;
    

    }

else{
    return 3;
}

}

}