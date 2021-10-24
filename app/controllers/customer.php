<?php

class customer extends controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function cus_home()
    {
        $this->view->render('_1_view_customerHome');
    }

        public function place_order(){
        

            $this->view->render('test2');
             }


          
     
            public function our_products()
            {
                $this->model('product_model');
                $query= $this->model->display_product_id('iceCream');
                 $this->view->added=$query;
                 $query1= $this->model->display_product_id('Yoghurt');
                 $this->view->added1=$query1;
                 $query2= $this->model->display_product_id('Curd');
                 $this->view->added2=$query2;
                 $query3= $this->model->display_product_id('Milk');
                 $this->view->added3=$query3;
             $this->view->render('view_customer_ourProduct');
                 }
    
    
            public function view_report()
{
    $this->view->render('view_customer_viewreport');
}

    public function our_products()
    {
        $this->model('product_model');
        $query = $this->model->display_product_id('iceCream');
        $this->view->added = $query;
        $query1 = $this->model->display_product_id('Yoghurt');
        $this->view->added1 = $query1;
        $query2 = $this->model->display_product_id('Curd');
        $this->view->added2 = $query2;
        $query3 = $this->model->display_product_id('Milk');
        $this->view->added3 = $query3;
        $this->view->render('view_customer_ourProduct');
    }


<<<<<<< HEAD
    public function view_report()
    {
        $this->view->render('test2');
    }

    public function view_notification()
    {
        $this->view->render('view_all_notification');
    }
    public function profile()
    {
        $this->view->render('view_all_editProfile');
    }

=======
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
public function view_orders()
{
    $this->view->render('view_vieworder');
}
>>>>>>> f4ff4f9792bd861bfeaadeb0d1b47f609e8038fc

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
