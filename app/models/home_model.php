<?php

require '../app/core/model.php';


class home_model extends model{

    function __construct(){
        parent::__construct();
    }

   public function validate($username1, $password1){
        
    require '../app/core/database.php';
    
        $sql = "SELECT * FROM users WHERE email = '$username1' and password = '$password1'";
        
        $result = $conn->query($sql);
        return $result;
   }

   public function resetMail($email,$link)
   {
    require '../app/core/database.php';
$query="UPDATE users SET active='false',verification='$link' WHERE email='$email'";
$conn->query($query);
       
$sql="SELECT email,name from users WHERE email='$email'";
$result=$conn->query($sql);
return $result;
   }

}

?>