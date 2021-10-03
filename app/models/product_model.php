<?php

require '../app/core/model.php';


class order_model extends model{

    function __construct(){
        parent::__construct();
    }

    public function search_product_id($id)
    {
        $search="SELECT * from product WHERE product_id='$id'";
        $result=$db->query($search);
        return $result;
    }

   public function add_product($id,$name,$des,$price,$fileName,$cat)
   {
    $insert = $db->query("INSERT into product (product_id,product_name,description,price,image,type) VALUES ('$id','$name','$des','$price','$fileName','$cat')");
    $result=$db->query($insert);
   }
}
