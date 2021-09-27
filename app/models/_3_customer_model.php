<?php

require '../app/core/model.php';


class home_model extends model{

    function __construct(){
        parent::__construct();
    }

public function place_order()
{
    $records = mysqli_query($conn,"SELECT product_id,name,price FROM product");
    
   if($records==true)
   {
       $data=mysqli_fetch_array($records);
       return $data;
   }

}


    
}