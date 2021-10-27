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



}