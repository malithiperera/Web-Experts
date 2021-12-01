<?php

require '../app/core/model.php';

class report_model extends model
{
    function __construct()
    {
        parent::__construct();
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

        // count salesreps
        $sql2 = "SELECT COUNT(DISTINCT(delivery_id)) AS count_delivery FROM delivery where month(date)=$month and year(date)=$year and cus_id='$userid'" ;
        $result2 = mysqli_query($conn, $sql2);
        array_push($result, $result2->fetch_assoc());

        //count due payments
        // $sql3 = "SELECT COUNT(payment_id) AS count_payment FROM payment where month(date)=$month and year(date)=$year and delivery_id=(SELECT delivery_id FROM delivery WHERE cus_id='$userid')";
        // $result3 = mysqli_query($conn, $sql3);
        // array_push($result, $result3->fetch_assoc());

        // $sql4 = "SELECT route_id AS routes FROM customer WHERE cus_id='$userid'";
        // $result4 = mysqli_query($conn, $sql4);
        // array_push($result, $result4->fetch_assoc());

        // $sql5 = "SELECT name AS rep_name FROM user WHERE user_id=(SELECT rep_id FROM route WHERE route_id=(SELECT route_id FROM customer WHERE cus_id='$userid'));";
        //  $result6 = mysqli_query($conn, $sql5);
        // array_push($result, $result6->fetch_assoc());

        // $sql6 = "SELECT shop_name FROM customer WHERE cus_id='$userid';";
        //  $result7 = mysqli_query($conn, $sql6);
        // array_push($result, $result7->fetch_assoc());




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

        $sql="SELECT EXTRACT(month FROM date) , count(*) FROM orders WHERE EXTRACT(YEAR FROM date) = '2021' GROUP BY EXTRACT(month FROM date) ORDER BY EXTRACT(month FROM date)";
        $result1 = mysqli_query($conn, $sql);

        return $result1;


    }

}