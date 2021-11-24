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
        $result = $this->model->load_notification($get_data['to_whom'], $get_data['user_id']);

        $data = [];

        while($row = $result->fetch_assoc()){
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
}

?>