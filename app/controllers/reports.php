<?php

class reports extends controller
{

    function __construct()
    {
        parent::__construct();
    }


    function order_table()
    {
        session_start();
     $this->model("cus_model");
     $result = $this->model->order_table($_SESSION['userid']);

     $data = [$result->fetch_assoc()];

    echo json_encode("Hello");
    exit;
    }



    function customer_summary()
    {
        session_start();
        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);

        $this->model("report_model");
        $result=$this->model->customer_summary($recieved_data['month'],$recieved_data['year'],$_SESSION['userid']);


        echo json_encode($result);
        exit;
        
    }
}