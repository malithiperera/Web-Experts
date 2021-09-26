<?php

require '../app/core/model.php';

 class register_model extends model{
     function __construct(){
         parent:: __construct();
     }

     public function register_user($tablename, $name, $nic, $dob, $email, $address, $tele, $verificationCode){
        require '../app/core/database.php';
        $sql = "INSERT INTO $tablename (name, address, email, DOB, NIC, TELE, verificationCode, active)
                VALUES ('$name', '$address', '$email', '$dob', '$nic', '$tele', '$verificationCode', 'pending');";
        
        if(mysqli_query($conn, $sql) == true){
            return 1;
        }
        else{
            return 2;
        }
     }

     public function email_verification($url){
         require '../app/core/database.php';
         $sql = "SELECT * FROM admin WHERE verificationCode='$url'";
         $result = $conn->query($sql);
         return $result;
     }

     public function activeUser($global_url, $newPassword){
        require '../app/core/database.php';
        $sql = "UPDATE admin SET password = '$newPassword', active = 'active', verificationCode = 0 WHERE verificationCode = '$global_url'";
        if ($conn->query($sql) === TRUE) {
            return 1;
          } else {
            return 0;
          }
     }
 }

?>