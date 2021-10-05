<?php

require '../app/core/model.php';

 class register_model extends model{
     function __construct(){
         parent:: __construct();
     }

     public function register_user($user_id, $name, $email, $verificationCode, $type, $active, $nic, $address, $dob, $tele){
        
        require '../app/core/database.php';
        $sql = "INSERT INTO user (user_id, name, email, verification_code, type, active, nic, address, dob, tel)
                VALUES ('$user_id', '$name', '$email', '$verificationCode', '$type', '$active', '$nic', '$address', '$dob', '$tele');";

        

        if(mysqli_query($conn, $sql) == true){
            return 1;
        }
        else{
            return mysqli_error($conn);
        }
     }

     public function email_verification($url){
         require '../app/core/database.php';
         $sql = "SELECT * FROM user WHERE verification_code='$url'";
         $result = $conn->query($sql);
         return $result;
     }
     


     public function activeUser($global_url, $newPassword){
        require '../app/core/database.php';
        $sql = "UPDATE user SET password = '$newPassword', active = 'active', verification_code = 0 WHERE verification_code = '$global_url'";
        if ($conn->query($sql) === TRUE) {
            return 1;
          } else {
            return 0;
          }
     }



     public function forgetverification($url)
     {require '../app/core/database.php';
        $sql = "SELECT * FROM users WHERE verificationCode='$url'";
        $result = $conn->query($sql);
        return $result;

     }


     public function checkmail($email,$userid)
     {
        require '../app/core/database.php';
         $query="SELECT * FROM user WHERE email='$email' OR user_id='$userid'";
         $result=$conn->query($query);

         return $result;
     }
 }

?>