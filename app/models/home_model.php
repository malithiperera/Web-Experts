<?php

require '../app/core/model.php';


class home_model extends model{

    function __construct(){
        parent::__construct();
    }

   public function validate($username1, $password1){
        
    require '../app/core/database.php';
    
        $sql = "SELECT * FROM user WHERE email = '$username1' and password = '$password1'";
        
        $result = $conn->query($sql);
        return $result;
   }

   public function resetMail($email,$link)
   {
    require '../app/core/database.php';
$query="UPDATE user SET active='false',verification_code='$link' WHERE email='$email'";
$conn->query($query);
       
$sql="SELECT email,name from user WHERE email='$email'";
$result=$conn->query($sql);
return $result;
   }

   public function customer_home_detail_check($userid){
    require '../app/core/database.php';
    $sql="SELECT * FROM orders WHERE cus_id='$userid' AND status='pending' ";
    $query=mysqli_query($conn,$sql);
    if($query==true)
    {
        
        return $query;
    }
 
}

}

?>