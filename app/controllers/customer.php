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


    public function view_report()
    {
        $this->view->render('view_customer_viewreport');
    }

     public function place_order_view()
    {
        $this->view->render('test2');
    }

    public function get_details_place_order(){
        session_start();

        $this->model('order_model');
        $route_id = $this->model->get_route_id($_SESSION['userid']);

        $data = [$_SESSION['userid'], $route_id->fetch_assoc()];

        echo json_encode($data);
        exit;
    }

    public function place_order()
    {
        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);

        // $order_id = "";
        // $amount = $recieved_data[];
        $status = "";
        $date = "";
        $cus_id = "";
        $route_id = "";
        // $this->model('order_model');

        // foreach ($recieved_data as $value) {
        //     $result = $this->model->place_order($value);
        //     echo $result;
        // }
        // print $recieved_data;

        // $this->model('home_model');
        // $this->model->place_order($recieved_data);

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
    public function view_orders()
    {
        $this->view->render('view_vieworder');
    }

   
    
    
}
