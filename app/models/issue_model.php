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
       $sql="SELECT * FROM product_issue,user where product_issue.rep_id=user.user_id and date=CURRENT_DATE() ";
       $result=mysqli_query($conn,$sql);
       $data = [];

       while ($row = $result->fetch_assoc()) {
           array_push($data, $row);
       }
       return $data;

    }
public  function load_products($issue_id){
    require '../app/core/database.php';
    $sql="SELECT * FROM  product_issue_products,product where product_issue_products.product_id=product.product_id and  issue_id='$issue_id'";
    $result=mysqli_query($conn,$sql);

$data = [];

       while ($row = $result->fetch_assoc()) {
           array_push($data, $row);
       }
       return $data;

}

}