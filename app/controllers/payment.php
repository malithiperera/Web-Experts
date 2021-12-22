<?php

class payment extends controller
{

    function __construct()
    {
        parent::__construct();
    }


    public function online_payments(){
        $data_set=[];
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);
        $this->model('payment_model');
        $result=$this->model->online_payments($get_data);
        while($row1 = $result->fetch_assoc()){
            array_push($data_set,$row1);
            }

            $result1=$this->model->online_payments_update($data_set[0]['delivery_id'],$data_set[0]['amount'],$get_data);

        echo json_encode($result1);
        exit;
    }
}