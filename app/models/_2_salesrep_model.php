<?php

require '../app/core/model.php';

class _2_salesrep_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    // NOT DELIVERED ORDERS
    public function not_delivered()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM orders ";
        

        $result = $conn->query($sql);
        
        
        return $result;
    }

    // DELIVERED ORDERS
    public function delivered()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM orders ";
        

        $result = $conn->query($sql);
        
        
        return $result;
    }


    public function select_order()
    {
        require '../app/core/database.php';
        $sql = "SELECT order_id FROM orders WHERE status='D'";
        $result = $conn->query($sql);
        return $result;
    }

    // CASH,CHEQUE PAYMENT ORDER SELECT DROP DOWN

    public function select_route()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM route";
        $result = $conn->query($sql);
        return $result;
    }

    public function order_amount($id)
    {
        require '../app/core/database.php';
        $sql = "SELECT amount FROM orders WHERE order_id ='$id'";
        $result = $conn->query($sql);
        return $result;
    }

    // INSERT CASH PAYMENT

    public function insert_cashPayment($order_id, $total, $date)
    {
        require '../app/core/database.php';

        //insert query
        $sql = "INSERT INTO payment (amount, order_id, date,type,delivery_id,time)
        VALUES ('$total','$order_id','$date','cash','1',CURDATE())";

        //update query
        $sql1 = "UPDATE orders SET status='complete' WHERE order_id=$order_id";

        $result = $conn->query($sql1);
        if (mysqli_query($conn, $sql) == TRUE) {
            return 1;
        } else {
            return mysqli_error($conn);
        };
    }

    // CONFIRM ORDER DELIVERY 

    public function confirm_delivery($order_id){

        require '../app/core/database.php';

        //update query
        $sql = "UPDATE orders SET status='D' WHERE order_id='$order_id'";

        $result = $conn->query($sql);
        return $result;
    }


    // INSERT CHEQUE PAYMENT

    public function insert_chequePayment($order_id, $total, $date)
    {
        require '../app/core/database.php';
        
        //insert query
        $sql = "INSERT INTO payment (amount, order_id, date,type,delivery_id,time)
        VALUES ('$total','$order_id','$date','cheque','1',CURDATE())";
        $sql1 = "UPDATE orders SET status='pending' WHERE order_id=$order_id";
        $result = $conn->query($sql1);
        if (mysqli_query($conn, $sql) == TRUE) {
            return 1;
        } else {
            return mysqli_error($conn);
        };
    }

    // DAILY PRODUCT LIST

    public function daily_productList()
    {
        require '../app/core/database.php';
        $sql = "SELECT product_name FROM product";
        $result = $conn->query($sql);
        return $result;
    }


    public function get_orders_data()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM orders,route,customer 
        WHERE orders.route_id=route.route_id AND 
        orders.cus_id=customer.cus_id AND
        orders.status='not-delivered' ORDER BY orders.route_id";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //GET ORDER PRODUCT FOR PATICULAR ROUTE

    public function get_order_products($route_id){
        require '../app/core/database.php';

        $sql = "SELECT product_name, SUM(quantity) FROM order_product, product
                WHERE
                order_product.product_id = product.product_id
                AND
                order_product.order_id 
                IN 
                (SELECT order_id FROM orders WHERE route_id = '$route_id') 
                GROUP BY order_product.product_id";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //GET HOME CARDS

    function get_home_cards($userid)
    {
        require '../app/core/database.php';
       
        $result = array();

        // target
        $sql1 = "SELECT target AS tar FROM sales_rep WHERE rep_id='$userid'";
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());

        // kinds of products
        $sql2 = "SELECT COUNT(product_id) AS count_products FROM product";
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        // pending deliveries
        $sql3 = "SELECT COUNT(order_id) AS Pending FROM orders WHERE status='not-delivered'";
        $result3 = mysqli_query($conn, $sql3);
        array_push($result, $result3->fetch_assoc());

        // No of customers
        //$sql4 = "SELECT COUNT(cus_id) NoOfCus FROM customer";
        $sql4 = "SELECT COUNT(*) AS NoOfCus FROM `route`,`customer` WHERE customer.route_id = route.route_id and route.rep_id = '$userid'";
        $result4 = mysqli_query($conn, $sql4);
        array_push($result, $result4->fetch_assoc());

        // No of routes
        $sql5 = "SELECT COUNT(route_id) AS NoOfRoutes FROM route WHERE rep_id='$userid'";
        $result5 = mysqli_query($conn, $sql5);
        array_push($result, $result5->fetch_assoc());
        

        return $result;

    }

    //REP ACHIVEMENTS

    function target($userid)
    {
        require '../app/core/database.php';

        // target
        $sql = "SELECT target AS tar FROM sales_rep WHERE rep_id='$userid'";
        $result = mysqli_query($conn, $sql);
        return $result;

    }

    //SEARCH CUSTOMER

    public function search_customer($cus_id){
        require '../app/core/database.php';

        $sql = "select * from customer where cus_id = '$cus_id' or shop_name = '$cus_id'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    //GET DATA FOR CHARTS IN REP ACHIEVEMENTS

    public function achievements($userid){

        require '../app/core/database.php';

        // $result = array();

        // $sql1 ="SELECT sum(orders.amount) AS achieved from route,orders 
        // where route.route_id = orders.route_id 
        // and 
        // route.rep_id = '$userid' 
        // and 
        // month(orders.date) =   month(CURRENT_DATE)";
        // $result1 = mysqli_query($conn, $sql1);
        // array_push($result, $result1->fetch_assoc());

        // $sql2 = "SELECT target AS tar FROM sales_rep WHERE rep_id='$userid'";
        // $result2 = mysqli_query($conn, $sql2);
        // array_push($result, $result2->fetch_assoc());

        return "result";
    }

    //request product from stock manager
    public function request_product_from_stock($product_name, $requested_qty, $final_qty, $rep_id){
        require '../app/core/database.php';

        $check = 0;

        $sql1 = "insert into product_issue (date, time, rep_id, issue_status) VALUES (curdate(), current_time(), '$rep_id', '0')";
        $result = mysqli_query($conn, $sql1);

        $last_issue_id = "select last_insert_id()";
        $result1 = mysqli_query($conn, $last_issue_id);
        $issue_id = $result1->fetch_assoc()['last_insert_id()'];

        $sql2 = "select product_id from product where product_name = 'Kiri pani'";
        $result2 = mysqli_query($conn, $sql2);

        for($i = 0 ; $i < sizeof($product_name) ; $i++){
            $sql2 = "select product_id from product where product_name = '$product_name[$i]'";
            $result2 = mysqli_query($conn, $sql2);
            $product_id = $result2->fetch_assoc()['product_id'];

            $sql3 = "insert into product_issue_products (issue_id, product_id, requested_qty, issue_qty) values ('$issue_id', '$product_id', '$requested_qty[$i]', '$final_qty[$i]')";
            $result3 = mysqli_query($conn, $sql3);

            if($result3 == false){
                $check = 1;
            }
           
        }
        
        return $check;

       
    }
    
}
