<?php

require '../app/core/model.php';


class issue_model extends model
{

    function __construct()
    {
        parent::__construct();
    }


    public function load_requests()
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM product_issue,user where product_issue.rep_id=user.user_id and date=CURRENT_DATE() ";
        $result = mysqli_query($conn, $sql);
        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }
    public  function load_products($issue_id)
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM  product_issue_products,product where product_issue_products.product_id=product.product_id and  issue_id='$issue_id'";
        $result = mysqli_query($conn, $sql);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }

    //issue products to sales rep
    public function issue_product_list_to_rep($get_data, $issue_id){
        require '../app/core/database.php';

        $result = "success";

        for($i = 0 ; $i < sizeof($get_data) ; $i++){
            
                $product_id = $get_data[$i][0];
                $quantity = $get_data[$i][2];

                $sql = "update product_issue_products set issue_qty = '$quantity', deliver_qty = '$quantity' where product_id = '$product_id' and issue_id = '$issue_id'";
                if(mysqli_query($conn, $sql) == false){
                    $result = "failed";
                }
        }
        
        return $result;
    }
}
