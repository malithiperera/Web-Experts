<?php

require '../app/core/model.php';

class report_model extends model
{
    function __construct()
    {
        parent::__construct();
    }


    public function get_types($type){
        require '../app/core/database.php';
        $sql="SELECT report_name FROM report WHERE privilege LIKE '%$type%'";
        $result1 = mysqli_query($conn, $sql);
        return $result1;

    }


    public function customer_summary($month,$year,$userid){
        require '../app/core/database.php';
        $sql="select *from orders where month(date)=$month and year(date)=$year and cus_id='$userid'";
        $result1 = mysqli_query($conn, $sql);
        return $result1;



    }


    public function customer_summary_loadcards($month,$year,$userid){
        require '../app/core/database.php';
       
        $result = array();

        // count products
        $sql1 = "SELECT COUNT(DISTINCT(order_id)) AS count_orders FROM orders where month(date)=$month and year(date)=$year and cus_id='$userid'" ;
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());

        //error in qury
        $sql2 = "SELECT COUNT(DISTINCT(order_id)) AS count_delivery FROM delivery where month(date)=$month and year(date)=$year and cus_id='$userid'" ;
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

      


        return $result;
    }

    public function customer_summary_del($month,$year,$userid){
        require '../app/core/database.php';
        $sql="SELECT * from delivery where month(date)=$month and year(date)=$year and cus_id='$userid'";
        $result1 = mysqli_query($conn, $sql);
        return $result1;
       
      

    }


    public function customer_summary_yearloadcards($year,$userid){
        require '../app/core/database.php';
       
        $result = array();

        //count products
        $sql1 = "SELECT COUNT(DISTINCT(order_id)) AS count_orders FROM orders where year(date)=$year and cus_id='$userid'" ;
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());

       
        $sql2 = "SELECT COUNT(DISTINCT(delivery_id)) AS count_delivery FROM delivery where  year(date)=$year and cus_id='$userid'" ;
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        return $result;

    }


    public function fill_graph_sum($year,$userid){
        require '../app/core/database.php';

        $sql="SELECT EXTRACT(month FROM date) , count(*) FROM orders WHERE EXTRACT(YEAR FROM date) = '$year' AND cus_id='$userid' GROUP BY EXTRACT(month FROM date) ORDER BY EXTRACT(month FROM date) ";
        $result1 = mysqli_query($conn, $sql);

        return $result1;


    }

    public function fill_graph_sum_del($year,$userid){
        require '../app/core/database.php';
        $sql="SELECT EXTRACT(month FROM date) , count(*) FROM delivery WHERE EXTRACT(YEAR FROM date) = '$year' AND cus_id='$userid' GROUP BY EXTRACT(month FROM date) ORDER BY EXTRACT(month FROM date) ";
        $result1 = mysqli_query($conn, $sql);

        return $result1;

    }

    public function fill_graph_sum_tot(){
        require '../app/core/database.php';
        $sql="SELECT EXTRACT(month FROM date) , count(*) FROM delivery WHERE EXTRACT(YEAR FROM date) = '$year' AND cus_id='$userid' GROUP BY EXTRACT(month FROM date) ORDER BY EXTRACT(month FROM date) ";

    }


    public function sales_summary_cards($year,$month){
        require '../app/core/database.php';
        $result = array();

        //count products
        $sql1 = "SELECT COUNT(DISTINCT(order_id)) AS count_orders FROM orders where year(date)=$year and month(date)='$month'" ;
        $result1 = mysqli_query($conn, $sql1);
        array_push($result, $result1->fetch_assoc());

       
        $sql2 = "SELECT COUNT(DISTINCT(delivery_id)) AS count_delivery FROM delivery where  year(date)=$year and month(date)='$month'" ;
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        $sql2 = "SELECT SUM(amount)
        FROM orders
        WHERE year(date)=$year and month(date)='$month' and status='delivered';" ;
        $result3 = mysqli_query($conn, $sql2);
        array_push($result, $result3->fetch_assoc());

        return $result;

    }

    public function sales_summary_table($year,$month){
        require '../app/core/database.php';
        $sql1 = "SELECT route.route_id,route.route_name,route.rep_id,user.name, sum(orders.amount) FROM route LEFT JOIN orders ON route.route_id=orders.route_id INNER JOIN user ON route.rep_id=user.user_id GROUP BY route.route_id order by sum(orders.amount) desc ";
       
        $result1 = mysqli_query($conn, $sql1);
        return $result1;




    }


    public function sales_summary_year($year){
        require '../app/core/database.php';

        $result_set=array();
        //route vise summary of year
        $data1=[];
        $sql1="SELECT route.route_id,route.route_name,route.rep_id,user.name, sum(orders.amount) FROM route LEFT JOIN orders ON route.route_id=orders.route_id INNER JOIN user ON route.rep_id=user.user_id GROUP BY route.route_id order by sum(orders.amount) desc";

        $result1 = mysqli_query($conn, $sql1);
        while ($row = $result1->fetch_assoc()) {
            array_push($data1, $row);
        }


        //month vise summary



    }
//return monthly
    public function return_month($year,$month){
        require '../app/core/database.php';
        $sql="SELECT route.route_id,route.route_name,user.name,COUNT(returns.return_id) FROM user,returns,route,customer WHERE returns.cus_id=customer.cus_id AND customer.route_id=route.route_id AND returns.rep_id=user.user_id;";

    }

}