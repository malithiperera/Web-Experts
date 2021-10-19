<?php

class salesRep extends controller{

    function __construct(){
        parent::__construct();
    }
  
   







public function view_report(){
    $this->view->render('view_customer_viewreport');
}
public function achievements(){
    $this->view->render('view_rep_achievements');
}
public function customer_registration(){
    $this->view->render('view_rep_customerRegistration');
}
public function customer_home(){
    $this->model('_2_salesrep_model');
    $this->view->result=$this->model->not_delivered();
    // $this->view->result=$this->model->load_route();
    $this->view->render('view_rep_customerHome');
}
public function home(){
    $this->view->render('_1_view_repHome');
}
public function returns(){
    $this->view->render('view_rep_return');
}
public function cashPayment(){
    $this->view->render('view_rep_cash');
}
public function chequePayment(){
    $this->view->render('view_rep_cheque');
}
public function profile(){
    $this->view->render('view_all_editProfile');
}
public function product_list(){
    $this->view->render('view_rep_productList');
}
public function place_order(){
    $this->view->render('test2');
}
}

?>