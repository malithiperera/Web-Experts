<?php

require '../app/core/model.php';

class home_model extends model{

    function __construct(){
        parent::__construct();
    }

   public function validate($username1, $password1){
        // require_once '../app/core/database.php';
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "himalee";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM users WHERE email = '$username1' and password = '$password1'";
        
        $result = $conn->query($sql);
        return $result;
   }

}

?>