<?php

require '../app/core/model.php';

class _1_admin_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function load_route()
    {
        require '../app/core/database.php';
        $sql = "SELECT route_id, name, destination FROM route_for_test";
        $result = $conn->query($sql);
        return $result;
    }

    public function insert_route($route_id, $name, $destination)
    {
        require '../app/core/database.php';
        $sql = "INSERT INTO route_for_test
                VALUES ('$route_id', '$name', '$destination')";
        if ($conn->query($sql) == TRUE) {
            return 1;
        } else {
            return mysqli_error($conn);
        }
    }

    public function load_view_data(){
        require '../app/core/database.php';

        $result = array();

        // count products
        $sql1 = "SELECT COUNT(product_id) AS count_products FROM product";
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());

        // count salesreps
        $sql2 = "SELECT COUNT(rep_id) AS count_salesrep FROM sales_rep";
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        // count customers
        $sql3 = "SELECT COUNT(cus_id) AS count_customer FROM customer";
        $result3 = mysqli_query($conn, $sql3);
        array_push($result, $result3->fetch_assoc());

        // count routes
        $sql4 = "SELECT COUNT(route_id) AS count_route FROM route";
        $result4 = mysqli_query($conn, $sql4);
        array_push($result, $result4->fetch_assoc());

        // count pending orders
        $sql5 = "SELECT COUNT(order_id) AS count_order FROM orders";
        $result5 = mysqli_query($conn, $sql5);
        array_push($result, $result5->fetch_assoc());

        // count overdue deliveries



        return $result;
    }

    public function search_customer($customer_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM customer 
                WHERE 
                cus_id LIKE '%".$customer_id."%' 
                OR 
                shop_name LIKE '%".$customer_id."%' 
                LIMIT 5";
                
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //search custoemr using route
    public function search_customer_by_route_get_route(){
        require '../app/core/database.php';

        $sql = "SELECT * FROM route";
        $result = mysqli_query($conn, $sql);
        return $result;

    }

    //filter customers in the route
    public function filter_customer_in_route($route_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM customer WHERE route_id = '$route_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //to suggest rep 
    public function suggest_rep($rep_id){

        require '../app/core/database.php';

        $sql = "SELECT * FROM sales_rep
                WHERE rep_id LIKE '%".$rep_id."%'
                ";

        $result = mysqli_query($conn, $sql);
        return $result;
       
    }

    //add new route
    public function add_new_route($route_name, $destination, $rep_id_input){
        
        require '../app/core/database.php';

        $sql = "INSERT INTO route (route_name, end, rep_id)
                VALUE ('$route_name', '$destination', '$rep_id_input')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}
