<?php

class customer extends controller{

    function __construct(){
        parent::__construct();
    }

          public function cus_home()
         {
         $this->view->render('_1_view_customerHome');
          }
        public function place_order(){
             $this->view->render('view_customer_placeorder');
             }
            public function my_order(){
        $this->view->render('view_customer_orderspayments');
            }
     
            public function our_products()
            {
                $this->view->render('view_customer_ourProduct');
            }
    
public function view_report()
{
    $this->view->render('view_customer_viewreport');
}


public function get_details()
{
session_start();
$email=$_SESSION['email'];

}

}

?>