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
        return $result;                                                         // return the result to the controller

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
    public function fillRepItemsTable_mod ($getProductId) {
        require '../app/core/database.php';
        $sql = "SELECT product_issue.rep_id, user.name, product_issue_products.qty
                FROM product_issue 
                RIGHT JOIN product_issue_products 
                ON product_issue.issue_id = product_issue_products.issue_id 
                INNER JOIN user
                ON product_issue.rep_id = user.user_id
                WHERE product_id = '$getProductId'";
        $result = mysqli_query ($conn, $sql);
        return $result;
        
    }
    public function fillRepRequestTable_mod ($issue_id) {
        require '../app/core/database.php';
        $sql = "SELECT product_issue_products.product_id, product.product_name, product_issue_products.requested_qty
                FROM product_issue_products
                RIGHT JOIN product_issue
                ON product_issue_products.issue_id=product_issue.issue_id
                RIGHT JOIN product
                ON product_issue_products.product_id = product.product_id
                WHERE product_issue.issue_id = '$issue_id'";
        $result = mysqli_query ($conn, $sql);
        return $result;

    }
    public function updatePrice_mod ($productId, $newPrice) {
        require '../app/core/database.php';
        $sql = "UPDATE product SET price='$newPrice' WHERE product_id='$productId'";
        $result = mysqli_query ($conn, $sql);
        return $result;

    }
    public function getRepList_mod () {
        require '../app/core/database.php';
        $sql = "SELECT rep_id, date FROM product_issue";
        $result = mysqli_query ($conn, $sql);
        return $result;
        
    }
}