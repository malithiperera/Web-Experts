<?php

require '../app/core/model.php';


class profile_model extends model{

    function __construct(){
        parent::__construct();
    }

    public function edit_profile($userid){
        require '../app/core/database.php';

        $sql="SELECT * FROM user WHERE user_id='$userid'";
        $result=mysqli_query($conn,$sql);
        return $result;
      



    }
    public function save_profile($email,$tel,$address,$nic,$id){
        require '../app/core/database.php';

        $sql="UPDATE user SET email='$email',tel='$tel',address='$address',nic='$nic' WHERE user_id='$id'";
        $result=mysqli_query($conn,$sql);
        return $result;
      



    }
    
    public function test($name){
        require '../app/core/database.php';
        $sql="SELECT product_name FROM product where product_name like '%$name%' ";
        $result=mysqli_query($conn,$sql);
$data=[];
while($row=$result->fetch_assoc()){
    array_push($data,$row);
}
return $data;

    }



}