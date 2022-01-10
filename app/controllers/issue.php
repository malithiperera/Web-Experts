<?php

class issue extends controller{

    function __construct(){
        parent::__construct();
    }



    public function  load_request(){
        $data_enc = file_get_contents("php://input");
        $data = json_decode($data_enc, true);
        $this->model('issue_model');
        $result = $this->model->load_requests();

        echo json_encode($result);
    }

    public function view_load(){
        $this->view->render('view_issuue_request');
    }

    //load products related to issuue id 
    public function load_products(){
        $data_enc = file_get_contents("php://input");
        $data = json_decode($data_enc, true);
        $this->model('issue_model');
        $result = $this->model->load_products($data);

        echo json_encode($result);

    }
}