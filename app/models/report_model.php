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

        // count salesreps
        $sql2 = "SELECT COUNT(DISTINCT(delivery_id)) AS count_delivery FROM delivery where month(date)=$month and year(date)=$year and cus_id='$userid'" ;
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

}