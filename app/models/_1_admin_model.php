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

    //get data for cards in admin view
    public function load_view_data()
    {
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

    //get data for charts in admin view
    public function get_data_for_charts()
    {
        require '../app/core/database.php';

        $sql1 = "SELECT EXTRACT(YEAR FROM delivery.date) AS year, SUM(orders.amount) AS year_amount FROM delivery,orders 
                 WHERE 
                 delivery.order_id = orders.order_id
                 AND
                 EXTRACT(YEAR FROM delivery.date) >= YEAR(CURDATE())-4 
                 GROUP BY EXTRACT(YEAR FROM delivery.date)";

        $result1 = mysqli_query($conn, $sql1);

        $sql2 = "SELECT EXTRACT(YEAR FROM returns.date) AS year, SUM(product.price*return_product.qty) AS amount FROM returns,return_product,product
                 WHERE
                 returns.return_id = return_product.return_id
                 AND
                 return_product.product_id = product.product_id
                 AND
                 EXTRACT(YEAR FROM returns.date) >= YEAR(CURDATE())-4 
                 GROUP BY EXTRACT(YEAR FROM date) 
                 ORDER BY EXTRACT(YEAR FROM date)";

        $result2 = mysqli_query($conn, $sql2);

        $data = [];

        while ($row1 = $result1->fetch_assoc()) {
            array_push($row1, $result2->fetch_assoc());
            array_push($data, $row1);
        }

        return $data;
    }

    //get data for best sales reps chart
    public function get_best_sales_reps()
    {
        require '../app/core/database.php';

        $sql1 = "SELECT SUM(orders.amount) AS amount,delivery.rep_id,user.name FROM delivery
                 INNER JOIN orders ON
                 delivery.order_id = orders.order_id
                 INNER JOIN user ON
                 delivery.rep_id = user.user_id
                 GROUP BY delivery.rep_id 
                 ORDER BY SUM(orders.amount) DESC
                 LIMIT 6
                 ";
        $result1 = mysqli_query($conn, $sql1);

        $data = [];

        while ($row1 = $result1->fetch_assoc()) {
            array_push($data, $row1);
        }

        return $data;
    }

    //get customer reg data to admin view chart
    public function get_customer_reg_data()
    {
        require '../app/core/database.php';

        $sql1 = "SELECT COUNT(*) AS count, DATE_FORMAT(reg_date, '%b') AS month FROM user
                 WHERE 
                 type = 'customer'
                 AND
                 EXTRACT(MONTH FROM reg_date) >= MONTH(CURDATE())-3
                 GROUP BY EXTRACT(MONTH FROM reg_date)
                 ";
        $result1 = mysqli_query($conn, $sql1);

        $data = [];

        while ($row1 = $result1->fetch_assoc()) {
            array_push($data, $row1);
        }

        return $data;
    }

    public function search_customer($customer_id)
    {
        require '../app/core/database.php';

        $sql = "SELECT * FROM customer 
                WHERE 
                cus_id LIKE '%" . $customer_id . "%' 
                OR 
                shop_name LIKE '%" . $customer_id . "%' 
                LIMIT 5";

        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //search custoemr using route
    public function search_customer_by_route_get_route()
    {
        require '../app/core/database.php';

        $sql = "SELECT * FROM route";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //filter customers in the route
    public function filter_customer_in_route($route_id)
    {
        require '../app/core/database.php';

        $sql = "SELECT * FROM customer WHERE route_id = '$route_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //to suggest rep 
    public function suggest_rep($rep_id)
    {

        require '../app/core/database.php';

        $sql = "SELECT * FROM sales_rep
                WHERE rep_id LIKE '%" . $rep_id . "%'
                ";

        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //add new route
    public function add_new_route($route_name, $destination, $rep_id_input)
    {

        require '../app/core/database.php';

        $sql = "INSERT INTO route (route_name, end, rep_id)
                VALUE ('$route_name', '$destination', '$rep_id_input')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //delete route
    public function delete_route($route_id)
    {

        require '../app/core/database.php';

        $sql = "UPDATE route
                SET deleted = 1
                WHERE
                route_id = '$route_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //test reports
    public function test_report1()
    {

        require '../app/core/database.php';

        $data = [];

        $sql1 = "SELECT order_id FROM orders";
        $result1 = mysqli_query($conn, $sql1);

        $data1 = [];

        while ($row1 = $result1->fetch_assoc()) {
            array_push($data1, $row1);
        }



        $sql2 = "SELECT user_id FROM user";
        $result2 = mysqli_query($conn, $sql2);

        $data2 = [];

        while ($row2 = $result2->fetch_assoc()) {
            array_push($data2, $row2);
        }



        return [$data1, $data2];
    }

    //get data to load customer profile for admin
    public function load_cus_data($cus_id)
    {
        require '../app/core/database.php';

        $sql1 = "SELECT * FROM user, customer,route
                 WHERE user.user_id = customer.cus_id
                 AND
                 customer.route_id = route.route_id
                 AND
                 user.user_id = '$cus_id'";

        $result1 = mysqli_query($conn, $sql1);
        return $result1->fetch_assoc();
    }

    //change customer credit time
    public function change_credit_period($cus_id, $new_time)
    {
        require '../app/core/database.php';

        $sql = "update customer set credit_time = '$new_time' where cus_id = '$cus_id'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    //check the admin level
    public function check_level($user_id)
    {
        require '../app/core/database.php';

        $sql = "select level from admin where admin_id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    public function search_rep($rep)
    {
        require '../app/core/database.php';

        $sql = "select * from user where (name LIKE '%$rep%' or user_id LIKE '%$rep%') and type = 'rep' LIMIT 5";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    public function check_admin($user_id)
    {
        require '../app/core/database.php';

        $sql = "select * from admin where admin_id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

    //remove user function
    public function remove_the_user($user_id, $position, $purpose)
    {
        require '../app/core/database.php';

        $check = 0;

        $sql1 = "update user set deleted = '1' where user_id = '$user_id'";
        $result1 = mysqli_query($conn, $sql1);

        if ($result1 == false) {
            $check = 1;
        }

        $sql2 = "insert into removed_users (user_id, position, purpose) values ('$user_id', '$position', '$purpose')";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2 == false) {
            $check = 1;
        }

        return $check;
    }

    public function test_test(){
        require '../app/core/database.php';

        $sql = "select date from orders where order_id = '23'";
        $result = mysqli_query($conn, $sql);
        $date = $result->fetch_assoc()['date'];
        $sql1 = "SELECT DATE_ADD('$date', INTERVAL 7 DAY)";  
        $result1 = mysqli_query($conn, $sql1);

        return $result1->fetch_assoc();
    }

    //give suggestions according to the user role in remove user function
    public function remove_user_suggestions($user, $position){
        require '../app/core/database.php';

        $sql = "select * from user where type = '$position' and user_id LIKE '%$user%' limit 5";
        $result = mysqli_query($conn, $sql);

        $data_array = [];

        while($row = $result->fetch_assoc()){
            array_push($data_array, $row);
        }

        return $data_array;
    }

    //load tables customer profile admin
    public function load_customer_tables($cus_id){
        require '../app/core/database.php';

        $data_array = [];

        $pending_orders = [];

        $sql = "select * from orders where cus_id = '$cus_id' and status = 'not-delivered'";
        $result = mysqli_query($conn, $sql);

        while($row = $result->fetch_assoc()){
            array_push($pending_orders, $row);
        }

        $sql1 = "select * from payment, cheque, orders where payment.payment_id = cheque.payment_id and payment.order_id = orders.order_id and orders.cus_id = '$cus_id'";
        $result1 = mysqli_query($conn, $sql1);

        $pending_cheques = [];

        while($row1 = $result1->fetch_assoc()){
            array_push($pending_cheques, $row1);
        }

        array_push($data_array, $pending_orders);
        array_push($data_array, $pending_cheques);

        return $data_array;
    }
}
