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
        $sql = "SELECT * FROM product_issue,user where product_issue.rep_id=user.user_id and date=CURRENT_DATE() and issue_status='0' ";
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

    public function view_list_rep($issue_id){
        require '../app/core/database.php';
        $sql="SELECT * FROM product_issue_products,product where issue_id='$issue_id' AND product_issue_products.product_id=product.product_id;";
        $result=mysqli_query($conn,$sql);
        return $result;


    }
    public function issue_rep_pro($get_data){
        require '../app/core/database.php';
        $issue_id=$_SESSION['issue_id'];
        // session_start();
        // foreach($get_data as $row){
        //     $sql="INSERT INTO product_issue_products values('$row')"
        // }
       $check = 0;


        for ($x = 0; $x < sizeof($get_data);$x++) {
            $product_id = $get_data[$x][0];
            $issue_qty = $get_data[$x][2];
            $requested_qty = $get_data[$x][3];

           $sql="UPDATE product_issue_products SET issue_qty='$issue_qty',deliver_qty='$issue_qty' where issue_id='$issue_id' and product_id='$product_id' ";
           $result=mysqli_query($conn,$sql);

           if($result == false){
               $check = 1;
           }

       
          }
          if($check==0){
              $sql1="UPDATE product_issue SET issue_status=1 where issue_id='$issue_id'";
$result1=mysqli_query($conn,$sql1);
          }
      
        
    //   return $_SESSION['issue_id'];
    return $result1;
    }


    //final process issue stock handover
    public function issue_rep_final($get_data){

        require '../app/core/database.php';
        $issue_id=$_SESSION['issue_id'];
      
       $check = 0;


        for ($x = 0; $x < sizeof($get_data);$x++) {
            $product_id = $get_data[$x][0];
            // $issue_qty = $get_data[$x][2];
            // $requested_qty = $get_data[$x][3];
            $final_qty = $get_data[$x][4];

           $sql="UPDATE product_issue_products SET final_qty='$final_qty' where issue_id='$issue_id' and product_id='$product_id' ";
           $result=mysqli_query($conn,$sql);

           if($result == false){
               $check = 1;
           }

       
          }
          if($check==0){
              $sql1="UPDATE product_issue SET issue_status=2 where issue_id='$issue_id'";
$result1=mysqli_query($conn,$sql1);
          }
      
        
    return $check;

    }
}
