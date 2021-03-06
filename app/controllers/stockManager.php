<?php

class stockManager extends controller {

    function __construct(){
        parent::__construct();
    }
      
    public function add_product() {
        $this->view->render('stockmanager_sketch_1');

    }
    public function product_profile() {
        $this->model('_4_stockmanager_model');
        $this->view->var_1 = $this->model->compareQtyLim_mod();
        // echo($this->view->var_1);    
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
        $this->view->render('stockmanager_sketch');
        
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

        $this->view->render ("view_stockManager_repList");
        
        exit;
        
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
        $result = $this->model->getRepList_mod();
        $data = [];
        while ($row = $result->fetch_assoc ()) {
            array_push ($data, $row);

        }
        echo json_encode($data);
        exit;

    }


    public function getRepList_cont_handover () {
        $this->model ('_4_stockmanager_model');
        $result = $this->model->getRepList_mod_handover();
        $data = [];
        while ($row = $result->fetch_assoc ()) {
            array_push ($data, $row);

        }
        echo json_encode($data);
        exit;

    }
    //render initial information(notify amount of the product)
    public function initial_information(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_4_stockmanager_model');
        $result = $this->model->initial_information($get_data);

        echo json_encode($result);
        exit;
    }

    public function currentStock(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_4_stockmanager_model');
        $result=$this->model->currentStock($get_data);

        echo json_encode($result);
        
    }
    
    public function removeStocks_con (){                        // remove from the stock
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_4_stockmanager_model');
        $result = $this->model->removeStocks_mod ($get_data ['productId'], $get_data ['amount']);

        echo json_encode($result);

    }

    public function addStocks_con () {                          // add to stock
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_4_stockmanager_model');
        $result = $this->model->addStocks_mod($get_data['productId'], $get_data['amount']);

        echo json_encode($result);

    }

    public function rep_list_back(){
        $this->view->render('view_stockManager_handover_sketch');

    }
    public function popUpComfirm () {  
        $amount=$_GET['removeqty'];
        $this->view->qty=$amount;                                     // pop up confirm delete message
        $this->view->render ('view_stockManager_confirmationPopUp');

    }

    public function popUpRemoveSuccessfully () {                                     // pop up removed successfully message
        $this->view->render ('view_stockManager_removeSuccessPopUp');

    }

    //stock return to stockmanager in the evening
    public function stock_return(){
        $this->view->render('view_stockManager_stock_return');

    }

    public function updateNewLimit_con () {                         // update the limit
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_4_stockmanager_model');
        $result = $this->model->updateNewLimit_mod ($get_data ['productId'], $get_data ['newLimit']);
        
    }
}

?>