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
        $sql = "SELECT route_id ,shop_name FROM customer WHERE cus_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function get_order_id()
    {
    }

    // begining of the place order process
    public function check_any_order_working(){
        require '../app/core/database.php';

        $sql = "SELECT * FROM orders WHERE working = 1";

        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            return 0;
        }
        else{
            return 1;
        }
    }

    public function place_order($amount, $status, $date, $working, $cus_id, $route_id)
    {
        require '../app/core/database.php';
        $sql = "INSERT INTO orders (amount, status, date, working, cus_id, route_id)
                VALUES ('$amount', '$status', '$date', '$working', '$cus_id', '$route_id')";
        mysqli_query($conn, $sql);
    }

    public function fill_order_product($table){
        require '../app/core/database.php';

        $sql1 = "SELECT order_id FROM orders WHERE working = 1";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = $result1->fetch_assoc();
        $id = (int)$row1['order_id'];

        foreach($table as $row){
            $order_id = $id;
                $sql2 = "SELECT product_id FROM product WHERE product_name = '$row[0]'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = $result2->fetch_assoc();
            $product_id = (int)$row2['product_id'];
            $price = $row[1];
            $discount = $row[2];
            $qty = $row[3];
            $amount = $row[4];

            $sql3 = "INSERT INTO order_product
                    VALUES ('$order_id', '$product_id', '$price', '$discount', '$qty','0', '$amount')";
            mysqli_query($conn, $sql3);

        }
        return $id;

    }

    public function complete_place_order(){
        require '../app/core/database.php';
        $sql = "UPDATE orders SET working = 0 WHERE working = 1";
        mysqli_query($conn, $sql);
    }
    // end of the place order process



    public function update_order($orderid,$date,$total,$table){
        require '../app/core/database.php';
        $sql="DELETE FROM order_product where order_id='$orderid'";

        if(mysqli_query($conn, $sql)){

            // return '$table';
            foreach($table as $row){
                $order_id = $orderid;
                    $sql2 = "SELECT product_id FROM product WHERE product_name = '$row[0]'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = $result2->fetch_assoc();
                $product_id = (int)$row2['product_id'];
                $price = $row[1];
                $discount = $row[2];
                $qty = $row[3];
                $amount = $row[4];
    
                $sql3 = "INSERT INTO order_product
                        VALUES ('$order_id', '$product_id', '$price', '$discount', '$qty', '0','$amount')";
                mysqli_query($conn, $sql3);
               
            }
       


            $sql1="UPDATE orders SET  date='$date' , amount='$total' where order_id='$orderid'";
            if(mysqli_query($conn, $sql1)){
                return $order_id;
            }
      else{
          return 'error';
      }



        }



        

    }

    //check whether have pending orders
public function checkorders($userid){
    require '../app/core/database.php';
    $sql=" SELECT * FROM orders where cus_id='$userid' and status ='not-delivered' ";
    $result=mysqli_query($conn,$sql);
    return $result;

}


public function suggest_user($userid){
    require '../app/core/database.php';
    $sql="SELECT * FROM customer where cus_id LIKE '%$userid%' or shop_name like '%$userid%'";
    $result=mysqli_query($conn,$sql);
    return $result;

}
}
