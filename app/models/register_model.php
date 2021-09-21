<?php

require '../app/core/model.php';

 class register_model extends model{
     function __construct(){
         parent:: __construct();
     }

     public function register_user($tablename, $name, $nic, $dob, $tele, $email, $address, $verificationCode){
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
 }

?>