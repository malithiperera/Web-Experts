<?php

require '../app/core/model.php';


class issue_model extends model
{

    function __construct()
    {
        parent::__construct();
    }


    public function load_requests(){
        require '../app/core/database.php';
       $sql="SELECT * FROM product_issue where date=CURRENT_DATE()";
       $result=mysqli_query($conn,$sql);
       $data = [];

       while ($row = $result->fetch_assoc()) {
           array_push($data, $row);
       }
       return $data;

    }


}