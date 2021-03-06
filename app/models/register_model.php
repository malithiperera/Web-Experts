<?php

require '../app/core/model.php';

class register_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    public function register_user($user_id, $name, $email, $verificationCode, $type, $active, $nic, $address, $dob, $tele,$target,$level, $shop = "abc", $route = "abc")
    {

        require '../app/core/database.php';
        // echo $user_id .$name. $email. $verificationCode.$type. $active. $nic. $address. $dob. $tele.$target.$level.$shop. $route ;
        $sql1 = "INSERT INTO user (user_id, name, email, verification_code, type, active, nic, address, dob, tel)
                VALUES ('$user_id', '$name', '$email', '$verificationCode', '$type', '$active', '$nic', '$address', '$dob', '$tele');";



        if (mysqli_query($conn, $sql1) == true) {

            if ($type == 'admin') {
                $sql = "INSERT INTO admin (admin_id,level) VALUES ('$user_id','$level')";
                mysqli_query($conn, $sql);
                return 1;
            } else if ($type == 'rep') {
                $sql = "INSERT INTO sales_rep  VALUES ('$user_id','$target')";
                mysqli_query($conn, $sql);
                return 1;
            } else if ($type == 'stockmanager') {
                $sql = "INSERT INTO stockmanager  VALUES ('$user_id')";
                if (mysqli_query($conn, $sql) == true) {
                    return 1;
                } else {
                    return mysqli_error($conn);
                }
            } else {
                

                $sql = "INSERT INTO customer VALUES ('$user_id','$shop' ,'2','$route')";
                if(mysqli_query($conn, $sql)==true){
                    return 1;
                }
                else{
                    echo mysqli_error($conn);
                }
               
            }
        } else {
            return mysqli_error($conn);
        }
    }

    public function email_verification($url)
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM user WHERE verification_code='$url'";
        $result = $conn->query($sql);
        return $result;
    }



    public function activeUser($global_url, $newPassword)
    {
        require '../app/core/database.php';
        $newPassword_hash=sha1($newPassword);
        $sql = "UPDATE user SET password = '$newPassword_hash', active = 'active', verification_code = 0 WHERE verification_code = '$global_url'";
        if (mysqli_query($conn, $sql) == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function forgetverification($url)
    {
        require '../app/core/database.php';
        $sql = "SELECT * FROM users WHERE verificationCode='$url'";
        $result = $conn->query($sql);
        return $result;
    }


    public function checkmail($email, $userid)
    {
        require '../app/core/database.php';
        $query = "SELECT * FROM user WHERE email='$email' OR user_id='$userid'";
        $result = $conn->query($query);

        return $result;
    }

    //begin new reg process
    public function reg_admin($user_id, $name, $email, $password, $verification_code, $active, $type, $nic, $address, $dob, $tel, $deleted, $is_online, $admin_type){
        require '../app/core/database.php';
        $date=date("Y-m-d");
        $sql1 = "INSERT INTO user 
                VALUES 
                ('$user_id', '$name', '$email', '$password', '$verification_code', '$active', '$type', '$nic', '$address', '$dob', '$tel', '$deleted', '$is_online','$date')";
        $result1 = mysqli_query($conn, $sql1);

        $sql2 = "INSERT INTO admin VALUES ('$user_id', '$admin_type')";
        $result2 = mysqli_query($conn, $sql2);

        if($result1 == true && $result2 == true){
            return true;
        }
        else{
            return mysqli_error($conn);
        }
    }

    public function reg_salesrep($user_id, $name, $email, $password, $verification_code, $active, $type, $nic, $address, $dob, $tel, $deleted, $is_online, $target){
        require '../app/core/database.php';
        $date=date("Y-m-d");
        $sql1 = "INSERT INTO user 
                VALUES 
                ('$user_id', '$name', '$email', '$password', '$verification_code', '$active', '$type', '$nic', '$address', '$dob', '$tel', '$deleted', '$is_online','$date','')";
        $result1 = mysqli_query($conn, $sql1);

        $sql2 = "INSERT INTO sales_rep VALUES ('$user_id', '$target')";

        $result2 = mysqli_query($conn, $sql2);

        if($result1 == true && $result2 == true){
            return true;
        }
        else{
            return false;
        }
    }

    public function reg_stockmanager($user_id, $name, $email, $password, $verification_code, $active, $type, $nic, $address, $dob, $tel, $deleted, $is_online){
        require '../app/core/database.php';

        $date=date("Y-m-d");
       $sql1 = "INSERT INTO user 
                VALUES 
                ('$user_id', '$name', '$email', '$password', '$verification_code', '$active', '$type', '$nic', '$address', '$dob', '$tel', '$deleted', '$is_online',' $date',' null')";
        $result1 = mysqli_query($conn,$sql1);

        $sql2 = "INSERT INTO stockmanager VALUES ('$user_id')";
        $result2 = mysqli_query($conn, $sql2);

        if($result1 == true && $result2 == true){
            return true;
        }
        else{
            return false;
        }
    }

    //validate email
    public function validate_email($email){
        require '../app/core/database.php';
        $sql="SELECT email from user where email LIKE '%$email%' ";
        $result=mysqli_query($conn,$sql);
        return $result;


    }

    public function validate_userid($user_id){
        require '../app/core/database.php';
        $sql="SELECT user_id  from user where user_id LIKE '%$user_id%' ";
        $result=mysqli_query($conn,$sql);
        return $result;


    }
}
