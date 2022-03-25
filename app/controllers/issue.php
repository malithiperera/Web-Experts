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

    //issue products to sales rep
    public function issue_products(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('issue_model');
        $result = $this->model->issue_product_list_to_rep($get_data['issue_list'], $get_data['issue_id']);

        echo json_encode($result);
        exit;

    }
    //view issue list sales rep
    public function view_issue_list(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);
        $this->model('issue_model');
        $result=$this->model->view_list_rep($get_data);
        $data=[];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
      
        echo json_encode($data);
        exit;

    }

    public function issue_list(){
        $issue_id=$_GET['reqid'];
        session_start();
        $_SESSION['issue_id']=$issue_id;
        $this->view->added=$issue_id;
        $this->view->render('view_stockManager_repList_products');

        // echo $issue_id;

    }

    //save in the database after issuing

    public function issue_rep(){
        session_start();
        $issueid=$_SESSION['issue_id'];
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);
        $this->model('issue_model');
        $result=$this->model->issue_rep_pro($get_data);

        
        echo json_encode($result);
        exit;

    }
}