<?php

require '../app/core/model.php';

class _1_admin_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    public function load_route()
    {
        require '../app/core/database.php';
        $sql = "SELECT route_id, name, destination FROM route_for_test";
        $result = $conn->query($sql);
        return $result;
    }

    public function insert_route($route_id, $name, $destination)
    {
        require '../app/core/database.php';
        $sql = "INSERT INTO route_for_test
                VALUES ('$route_id', '$name', '$destination')";
        if ($conn->query($sql) == TRUE) {
            return 1;
        } else {
            return mysqli_error($conn);
        }
    }
}
