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

        $get_data = file_get_contents('php://input');                           // Get the value come from view
        $get_data = json_decode($get_data, true);                               // decode json object

        $this->model('_4_stockmanager_model');
        $result = $this->model->product_details($get_data['product_id']);       // get the result from the model

        // $data = ['dineth'];

        echo json_encode($result->fetch_assoc());                               // send result accoc. array to the view
        exit;

    }
    public function fillKindOfProducts_cont () {
        $this->model('_4_stockmanager_model');                                  // call the model
        $result = $this->model->kindOfProducts_mod ();                          // get the result of 'kindOfProducts_mod' function in model and store it in 'result' variable
        echo json_encode($result->fetch_assoc ());                              // send the json encoded result to the view
        exit;

    }
    public function fillNoOfReps_cont () {
        $this->model('_4_stockmanager_model');
        $result = $this->model->fillNoOfReps_mod ();
        echo json_encode($result->fetch_assoc ());
        exit;

    }
    public function fillNoOfCategories_cont () {
        $this->model ('_4_stockmanager_model');
        $result = $this->model->fillNoOfCategories_mod ();
        echo json_encode ($result->fetch_assoc ());
        exit;
            
    }
    public function fillNoOfRepRequests_cont () {
        $this->model ('_4_stockmanager_model');
        $result = $this->model->fillNoOfRepRequests_mod ();
        echo json_encode ($result->fetch_assoc ());
        exit;

    }
    public function fillRepItemsTable_con () {
        $getProductId = file_get_contents('php://Input');
        $getProductId = json_decode ($getProductId, true);
        $this->model ('_4_stockmanager_model');
        $result = $this->model->fillRepItemsTable_mod ($getProductId);
        $data  = [];
        while ($row = $result->fetch_assoc ()) {
            array_push ($data, $row);

        }
        echo json_encode ($data);
        exit;

    }
    public function viewList () {
        $this->view->render ("view_stockmanager_repRequest");
        // $this->view->render("view_stockManager_requestedRepList");
        
    }
    public function get_request_con() {
        echo json_encode ("hello");
        exit;
        
    }
    public function fillRepRequestTable_con () {
        $this->model ('_4_stockmanager_model');
        $result = $this->model->fillRepRequestTable_mod ();
        $data = [];
        while ($row = $result->fetch_assoc ()) {
            array_push ($data, $row);

        }
        echo json_encode ($data);
        exit;

    }
    public function backToSMHome () {
        $this->view->render ('_1_view_stockmanagerHome');

    }
    public function moveToNotificationPage () {
        $this->view->render ('view_stockmanager_notification');
    }

    //to notifications
    public function notification(){
        $this->view->render('view_stockmanager_notification');
    }

    
    public function updatePrice_con() {
        $get_data = file_get_contents ('php://input');
        $get_data = json_decode ($get_data, true);

        $this->model('_4_stockmanager_model');
        $result = $this->model->updatePrice_mod ($get_data ['productId'], $get_data ['newPrice']);
        echo json_encode ($result);
        exit;
        
    }

    public function getRepList_cont () {
        $this->model ('_4_stockmanager_model');
        $result = $this->model->getRepList_mod ();
        $data = [];
        while ($row = $result->fetch_assoc ()) {
            array_push ($data, $row);

        }
        echo json_encode($data);
        exit;

    }
}

?>