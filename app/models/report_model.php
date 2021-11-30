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

}