<?php

class notification extends controller{
    function __construct()
    {
        parent::__construct();
    }

    //testing notification
    public function test_notification(){
        $this->view->render('view_all_notification');
    }

    public function load_notification(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->load_notification($get_data['to_whom'], $get_data['user_id'], $get_data['notification_type']);

        $data = [];

        while($row = $result->fetch_assoc()){
            

            switch ($row['notification_type']){
                case 1:
                    $details = $this->model->get_product_details($row['product_id']);
                    $product_details = $details->fetch_assoc();

                    $subject = 'added new '.$product_details['type']." product , named ".$product_details['product_name'].".";
                    break;
                case 2:
                    
                default:
                    $subject = 'subject';
            }

            array_push($row, $subject);
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    public function see_notification($notification_id){

        $this->view->notification_id = $notification_id;
        $this->view->render('view_all_notification_view');
        
    }

    public function load_notification_page(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->load_notification_page($get_data);

        echo json_encode($result->fetch_assoc());
        exit;
    }

    public function product_addition(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->product_addition($get_data);

        echo json_encode($result->fetch_assoc());
        exit;
    }

   
}

?>