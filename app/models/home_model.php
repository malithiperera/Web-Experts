<?php

require '../app/core/model.php';


class home_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function validate($username1, $password1)
    {

        require '../app/core/database.php';

        $sql = "SELECT * FROM user WHERE email = '$username1' and password = '$password1'";

        $result = $conn->query($sql);
        return $result;
    }

    public function resetMail($email, $link)
    {
        require '../app/core/database.php';
        $query = "UPDATE user SET active='false',verification_code='$link' WHERE email='$email'";
        $conn->query($query);

        $sql = "SELECT email,name from user WHERE email='$email'";
        $result = $conn->query($sql);
        return $result;
    }

    public function search_items($product_name)
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM product WHERE product_name LIKE '" . $product_name . "%' LIMIT 5";
        $result = $conn->query($sql);
        return $result;
    }

    

   
    public function test3(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn, $sql);
        return $query;
    }




public function customer_card($userid)
{

    require '../app/core/database.php';




    
$query="SELECT count(product_id) AS p_count FROM product";
$result=mysqli_query($conn,$query);
if($result==true)
{
    $data=$result->fetch_array();
    $input=array("products"=>$data);
  
    // return $input;
}


 
 
// $query="SELECT count(order_id) FROM orders WHERE cus_id='$userid' AND status='pending'";
// $result=mysqli_query($conn,$query);
// $data=$result->fetch_array();
// $input["delievery"]=$data;

// $query="SELECT count(delivery_id) FROM delivery WHERE cus_id='$userid' AND status='pending'";
// $result=mysqli_query($conn,$query);
// $data=$result->fetch_array();
// $input["payment"]=$data;

// return $input;


}

public function customer_home_detail_check($userid){
    require '../app/core/database.php';
    $sql="SELECT * FROM orders WHERE cus_id='$userid' AND status='pending' ";
    $sql1="SELECT * FROM delivery  ";
    $result1=mysqli_query($conn,$sql);
    $result2=mysqli_query($conn,$sql1);

    if( $result1==true  && $result2==true)
    {

        // $data=$result1->fetch_array();
        // $data1=$result2->fetch_array();
      return array($result1,$result2);
    }
   }
}