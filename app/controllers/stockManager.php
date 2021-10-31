<?php

class stockManager extends controller {

    function __construct(){
        parent::__construct();
    }
      
    public function add_product() {
        $this->view->render('view_stockmanager_addproduct');

    }
    public function product_profile() {
        $this->view->render('view_stockManager_manageStocks');

    }
    public function viewStocks () {
        $this->view->render('view_stockManager_viewStocks');

    }

    public function fill_home(){
        $data = [];

        $this->model('_4_stockmanager_model');
        $result = $this->model->get_product_data();

        while($row = $result->fetch_assoc()){
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    public function managestock(){
        $this->view->render('view_stockManager_manageStocks');
    }

    public function details_of_product(){

        $get_data = file_get_contents('php://input');           // Get the value come from view
        $get_data = json_decode($get_data, true);               // decode json object

        $this->model('_4_stockmanager_model');
        $result = $this->model->product_details($get_data['product_id']);       // get the result from the model

        // $data = ['dineth'];

        echo json_encode($result->fetch_assoc());               // send result accoc. array to the view
        exit;
    }

}

?>