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
    public function kindOfProducts_mod () {
        require '../app/core/database.php';
        $sql = "SELECT COUNT(product_id) as productidcount FROM product";
        $result = mysqli_query($conn, $sql);
        return $result;                                         // return the result to the controller

    }
    public function fillNoOfReps_mod(){
        require '../app/core/database.php';
        $sql = "SELECT COUNT(user_id) as repcount FROM user WHERE type='sales_rep' OR type='rep';";
        $result = mysqli_query($conn, $sql);
        return $result;

    }
    public function fillNoOfCategories_mod() {
        require '../app/core/database.php';
        $sql = "SELECT COUNT(DISTINCT type) AS categories FROM product";
        $result = mysqli_query ($conn, $sql);
        return $result;
        
    }
    public function fillNoOfRepRequests_mod() {
        require '../app/core/database.php';
        $sql = "";
        $result = mysqli_query ($conn, $sql);
        return $result;

    }
}