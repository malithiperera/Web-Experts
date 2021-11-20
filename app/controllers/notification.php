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

        echo json_encode($get_data);
        exit;
    }
}

?>