<?php

require '../app/core/model.php';


class cus_model extends model
{

    function __construct()
    {
        parent::__construct();
    }


    function get_home_orders($user)
    {

        require '../app/core/database.php';
        $sql = "SELECT * FROM orders WHERE cus_id='$user'";
        $result = $conn->query($sql);
        return $result;
    }


}