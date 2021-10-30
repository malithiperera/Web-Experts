<?php

require '../app/core/model.php';

class _2_salesrep_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    // public function load_route(){
    //     require '../app/core/database.php';
    //     $sql = "SELECT orders_id, orders_date, amount FROM orders WHERE status='D'";
    //     $result = $conn->query($sql);
    //     return $result;
    // }
    public function not_delivered()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM orders ";
        

        $result = $conn->query($sql);
        
        
        return $result;
    }
    public function delivered()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM orders ";
        

        $result = $conn->query($sql);
        
        
        return $result;
    }


    // public function delivered()
    // {
    //     require '../app/core/database.php';
    //     $sql = "SELECT order_id, date, amount FROM orders WHERE status='D'";
    //     $result = $conn->query($sql);
    //     return $result;
    // }

    public function cash_payment()
    {
        require '../app/core/database.php';
        $sql = "SELECT order_id FROM orders WHERE status='D'";
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
    public function insert_cashPayment($order_id, $total, $date)
    {
        require '../app/core/database.php';
        //insert query
        $sql = "INSERT INTO payment (amount, order_id, date)
        VALUES ('$total','$order_id','$date')";
        // $result = $conn->query($sql);
        if (mysqli_query($conn, $sql) == TRUE) {
            return 1;
        } else {
            return mysqli_error($conn);
        };
    }
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

    //get order product of particular route
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
    
}
