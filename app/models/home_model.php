<?php

require '../app/core/model.php';

class home_model extends model{

    function __construct(){
        parent::__construct();
    }

    public function isAdmin($email){
        require '../app/core/database.php';
        $sql = "SELECT * FROM admin
        WHERE email LIKE '%$email%'";
        $result = $conn->query($sql);

        return $result;
    }

    public function isCustomer($email){
        require '../app/core/database.php';
        $sql = "SELECT * FROM customer
        WHERE email LIKE '%$email%'";
        $result = $conn->query($sql);

        return $result;
    }

    public function isSalesRep($email){
        require '../app/core/database.php';
        $sql = "SELECT * FROM salesrep
        WHERE email LIKE '%$email%'";
        $result = $conn->query($sql);

        return $result;
    }

    public function isStockManager($email){
        require '../app/core/database.php';
        $sql = "SELECT * FROM stockmanager
        WHERE email LIKE '%$email%'";
        $result = $conn->query($sql);

        return $result;
    }

}

?>