<?php

require '../app/core/model.php';

class report_model extends model
{
    function __construct()
    {
        parent::__construct();
    }


    public function get_types($type)
    {
        require '../app/core/database.php';
        $sql = "SELECT report_name FROM report WHERE privilege LIKE '%$type%'";
        $result1 = mysqli_query($conn, $sql);
        return $result1;
    }


    public function customer_summary($month, $year, $userid)
    {
        require '../app/core/database.php';
        $sql = "select *from orders where month(date)=$month and year(date)=$year and cus_id='$userid'";
        $result1 = mysqli_query($conn, $sql);
        return $result1;
    }


    public function customer_summary_loadcards($month, $year, $userid)
    {
        require '../app/core/database.php';

        $result = array();

        // count products
        $sql1 = "SELECT COUNT(DISTINCT(order_id)) AS count_orders FROM orders where month(date)=$month and year(date)=$year and cus_id='$userid'";
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());

        //error in qury
        $sql2 = "SELECT COUNT(DISTINCT(order_id)) AS count_delivery FROM delivery where month(date)=$month and year(date)=$year and cus_id='$userid'";
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());




        return $result;
    }

    public function customer_summary_del($month, $year, $userid)
    {
        require '../app/core/database.php';
        $sql = "SELECT * from delivery where month(date)=$month and year(date)=$year and cus_id='$userid'";
        $result1 = mysqli_query($conn, $sql);
        return $result1;
    }


    public function customer_summary_yearloadcards($year, $userid)
    {
        require '../app/core/database.php';

        $result = array();

        //count products
        $sql1 = "SELECT COUNT(DISTINCT(order_id)) AS count_orders FROM orders where year(date)=$year and cus_id='$userid'";
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());


        $sql2 = "SELECT COUNT(DISTINCT(delivery_id)) AS count_delivery FROM delivery where  year(date)=$year and cus_id='$userid'";
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        return $result;
    }


    public function fill_graph_sum($year, $userid)
    {
        require '../app/core/database.php';

        $sql = "SELECT EXTRACT(month FROM date) , count(*) FROM orders WHERE EXTRACT(YEAR FROM date) = '$year' AND cus_id='$userid' GROUP BY EXTRACT(month FROM date) ORDER BY EXTRACT(month FROM date) ";
        $result1 = mysqli_query($conn, $sql);

        return $result1;
    }

    public function fill_graph_sum_del($year, $userid)
    {
        require '../app/core/database.php';
        $sql = "SELECT EXTRACT(month FROM date) , count(*) FROM delivery WHERE EXTRACT(YEAR FROM date) = '$year' AND cus_id='$userid' GROUP BY EXTRACT(month FROM date) ORDER BY EXTRACT(month FROM date) ";
        $result1 = mysqli_query($conn, $sql);

        return $result1;
    }

    public function fill_graph_sum_tot()
    {
        require '../app/core/database.php';
        $sql = "SELECT EXTRACT(month FROM date) , count(*) FROM delivery WHERE EXTRACT(YEAR FROM date) = '$year' AND cus_id='$userid' GROUP BY EXTRACT(month FROM date) ORDER BY EXTRACT(month FROM date) ";
    }


    public function sales_summary_cards($year, $month)
    {
        require '../app/core/database.php';
        $result = array();

        //count products
        $sql1 = "SELECT COUNT(DISTINCT(order_id)) AS count_orders FROM orders where year(date)=$year and month(date)='$month'";
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());


        $sql2 = "SELECT COUNT(DISTINCT(delivery_id)) AS count_delivery FROM delivery where  year(date)=$year and month(date)='$month'";
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        $sql2 = "SELECT SUM(amount)
        FROM orders
        WHERE year(date)=$year and month(date)='$month' and status='delivered';";
        $result3 = mysqli_query($conn, $sql2);
        array_push($result, $result3->fetch_assoc());

        return $result;
    }

    public function sales_summary_table($year, $month)
    {
        require '../app/core/database.php';
        $sql1 = "SELECT route.route_id,route.route_name,route.rep_id,user.name, sum(orders.amount) FROM route LEFT JOIN orders ON route.route_id=orders.route_id INNER JOIN user ON route.rep_id=user.user_id where month(date)=$month AND year(date)=$year GROUP BY route.route_id order by sum(orders.amount) desc  ";

        $result1 = mysqli_query($conn, $sql1);
        return $result1;
    }
    public function sales_summary_year_cards($year)
    {
        require '../app/core/database.php';
        $result = array();

        //count products
        $sql1 = "SELECT COUNT(DISTINCT(order_id)) AS count_orders FROM orders where year(date)=$year";
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());


        $sql2 = "SELECT COUNT(DISTINCT(delivery_id)) AS count_delivery FROM delivery where  year(date)=$year";
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        $sql2 = "SELECT SUM(amount)
        FROM orders
        WHERE year(date)=$year and status='delivered';";
        $result3 = mysqli_query($conn, $sql2);
        array_push($result, $result3->fetch_assoc());

        return $result;
    }

    public function sales_summary_year($year)
    {
        require '../app/core/database.php';

        $result_set = array();
        //route vise summary of year
        $data1 = [];
        $sql1 = "SELECT route.route_id,route.route_name,route.rep_id,user.name, sum(orders.amount) FROM route LEFT JOIN orders ON route.route_id=orders.route_id INNER JOIN user ON route.rep_id=user.user_id GROUP BY route.route_id order by sum(orders.amount) desc";

        $result1 = mysqli_query($conn, $sql1);
        while ($row = $result1->fetch_assoc()) {
            array_push($data1, $row);
        }

        $sql2="";

        return $data1;
        


    }
    //return monthly
    public function return_month($year, $month)
    {
        require '../app/core/database.php';
        $sql = "SELECT customer.route_id,sum(product.price*return_product.qty) as total_amount,user.name as rep_name,route.route_name from returns,return_product,customer,product,user,route
        where returns.return_id = return_product.return_id
        AND
        returns.cus_id = customer.cus_id
        AND
        return_product.product_id = product.product_id
        AND
        returns.rep_id = user.user_id
        AND
        customer.route_id=route.route_id 
      and month(date)='$month' and
       year(date)='$year'
        group by customer.route_id;";

        $result=mysqli_query($conn,$sql);
        return $result;


    }


    public function return_month_cards($year, $month){
        require '../app/core/database.php';
        $cards=[];
        $sql = "SELECT sum(product.price*return_product.qty) as total_amount from returns,return_product,product
        where returns.return_id = return_product.return_id
        AND

        return_product.product_id = product.product_id;";

        $result=mysqli_query($conn,$sql);
       array_push($cards,$result->fetch_assoc());

       $sql1="SELECT COUNT(DISTINCT(cus_id)) as shops FROM returns where month(date)='$month' and
       year(date)='$year'";
       $result1=mysqli_query($conn,$sql1);
       array_push($cards,$result1->fetch_assoc());
       return $cards;


    }
    //customer summary sales
    public function fill_graph_sum_table($year, $userid)
    {
        require '../app/core/database.php';
        $data1 = [];
        $sql = "SELECT extract(month from delivery.date) as date, sum(orders.amount) as data FROM orders,delivery where orders.order_id = delivery.order_id and extract(year from delivery.date) = '$year' and orders.cus_id='$userid' group by extract(month from delivery.date);";
        $result1 = mysqli_query($conn, $sql);
        // array_push($data1,$result1);




        return $result1;
    }
    //customer summary returns
    public function fill_graph_sum_table_return($year, $userid)
    {
        require '../app/core/database.php';
        $sql1 = "SELECT extract(month from returns.date) as date, sum(product.price*return_product.qty) as data from returns,return_product,product where returns.return_id = return_product.return_id and extract(year from returns.date) and return_product.product_id = product.product_id and returns.cus_id='$userid' and extract(year from returns.date) = '$year' group by extract(month from returns.date)";
        $result2 = mysqli_query($conn, $sql1);
        return $result2;
    }
//customer summary payment table year
    public function fill_graph_sum_table_payment($year, $userid)
    {
        require '../app/core/database.php';
        
        $sql1 = "SELECT extract(month from payment.date) as date, sum(orders.amount) as data from orders,payment where orders.order_id = payment.order_id and orders.cus_id='$userid' and extract(year from payment.date) = '$year';";
        $result2 = mysqli_query($conn, $sql1);
        return $result2;
    }



    public function customer_summary_pay($month,$year,$userid)
    {
        require '../app/core/database.php';
        $sql="SELECT * from payment,orders,delivery where orders.order_id=payment.order_id and payment.delivery_id=delivery.delivery_id and orders.cus_id='$userid' and year(payment.date)='$year' and month(payment.date)='$month';";
        $result2=mysqli_query($conn,$sql);
        return $result2;
        
    }

    public function sales_rep_month($year,$month){
        require '../app/core/database.php';
        $sql="SELECT delivery.rep_id,user.name ,sum(orders.amount) as sumSales, sales_rep.target from orders,delivery,user,sales_rep WHERE orders.order_id=delivery.delivery_id AND year(delivery.date)='$year' and month(delivery.date)='$month' AND user.user_id=delivery.rep_id AND sales_rep.rep_id=delivery.rep_id GROUP BY delivery.rep_id";
        $result2=mysqli_query($conn,$sql);
        return $result2;
    }
}
