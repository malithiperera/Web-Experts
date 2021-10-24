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

    public function place_order($value)
    {
        require '../app/core/database.php';
        $sql = "INSERT INTO place_order_for_test
                VALUES('$value[0]', '$value[1]', '$value[2]', '$value[3]', '$value[4]')";
        if ($conn->query($sql) == TRUE) {
            return 1;
        } else {
            return mysqli_error($conn);
        }
    }

   public function customer_home_detail_check($userid){
    require '../app/core/database.php';
    $sql="SELECT * FROM orders WHERE cus_id='$userid' AND status='pending' ";
    $query="SELECT * FROM delivery WHERE cus_id='$userid'";
    $sql1=mysqli_query($conn,$sql);
    $query1=mysqli_query($conn,$query);
    if($query1==true && $sql1==true )
    {
       return array($query1,$sql1);
    }
   }
    public function test3(){
        require '../app/core/database.php';
        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
}
