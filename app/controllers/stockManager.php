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

}

?>