<?php

require '../app/core/model.php';


class product_model extends model{

    function __construct(){
        parent::__construct();
    }

    public function search_product_id($id)
    {
        require '../app/core/database.php';
        $search="SELECT * from product WHERE product_id='$id'";
        $result=$conn->query($search);
        return $result;
    }

   public function add_product($id,$name,$des,$price,$fileName,$cat)
   {
    require '../app/core/database.php';
    $insert = "INSERT into product (product_id,product_name,description,price,image,type) VALUES ('$id','$name','$des','$price','$fileName','$cat')";
    $result=$conn->query($insert);
    return $result;
   }

   public function display_product_id($type){
    require '../app/core/database.php';
    $query = $conn->query("SELECT * FROM product  WHERE type='$type'");
    
    return $query;

   }
}
