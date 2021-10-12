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
            // $this->model->place_order();

             $this->view->render('test2');
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
    $this->view->render('test2');
}

public function view_notification(){
    $this->view->render('view_all_notification');
}
public function profile(){
    $this->view->render('view_all_editProfile');
}


public function view_details($mail)
{
// session_start();
// $email=$_SESSION['email'];
echo "Hello";
}
public function back_cus_home()
{
    $this->view->render('_1_view_customerHome');
}


}

?>