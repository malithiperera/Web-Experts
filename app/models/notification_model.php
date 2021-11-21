<?php

require '../app/core/model.php';


class notification_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function load_notification($to_whom, $user_id){
        require '../app/core/database.php';

        $sql = "SELECT * FROM notification";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}