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

    //change password

    public function changepass($oldpass,$userid){
        require '../app/core/database.php';
        
$sql="SELECT password from user where user_id='$userid'";
$result=mysqli_query($conn,$sql);
$password=$result->fetch_assoc();
if($password['password']==$oldpass){
return true;
}
else{
    return false;
}
        






    }

    //update password
    public function savepass($newpass,$userid){
        require '../app/core/database.php';
        
        $sql="UPDATE user
        SET
        password='$newpass'
        WHERE user_id='$userid'";
        $result=mysqli_query($conn,$sql);
        return $result;

    }
//save changes

public function save_change_info($name,$address,$email,$nic,$tele,$userid){
    require '../app/core/database.php';
    $sql="UPDATE user SET name='$name',email='$email',tel='$tele',nic='$nic' WHERE user_id='$userid'";
    $result=mysqli_query($conn,$sql);
    return $result;


}


}