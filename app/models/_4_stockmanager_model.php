<?php

require '../app/core/model.php';


class _4_stockmanager_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_product_data(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    public function product_details($product_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

}