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


    public function viewreport()
    {
        $this->view->render('report');
    }

    public function place_order_view()
    {
        $this->view->render('test2');
    }

    public function get_details_place_order()
    {
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


        $this->model('order_model');

        // check any order is working
        $check = $this->model->check_any_order_working();

        if ($check == 0) {

            // set data object
            $data = [
                $recieved_data['amount'],
                $recieved_data['status'],
                $recieved_data['date'],
                $recieved_data['working'],
                $recieved_data['cus_id'],
                $recieved_data['route_id'],
                $recieved_data['table']
            ];

            // set order
            $this->model->place_order(
                $recieved_data['amount'],
                $recieved_data['status'],
                $recieved_data['date'],
                $recieved_data['working'],
                $recieved_data['cus_id'],
                $recieved_data['route_id']
            );

            // fill order_product table
            $order_id = $this->model->fill_order_product($recieved_data['table']);
            array_push($data, $order_id);

            // set 0 working order
            $this->model->complete_place_order();

            echo json_encode($data);
            exit;
        }

        // an order is working
        else {
            $data = ['failed'];
            echo json_encode($data);
            exit;
        }
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

    public function view_notification()
    {
        $this->view->render('view_all_notification');
    }

    public function profile()
    {
        $this->view->render('view_all_editProfile');
    }


    public function get_details_home()
    {
        session_start();

        $this->model("cus_model");
        $result = $this->model->get_home_orders($_SESSION['userid']);

        $data = [$result->fetch_assoc()];

        echo json_encode($data);
        exit;
    }


    public function load_card()
    {
        session_start();
        $this->model("cus_model");
        $result = $this->model->get_home_cards($_SESSION['userid']);

        $data = [$result];

        echo json_encode($data);
        exit;
    }


    // get details about pending orders
    public function get_pending_orders()
    {

        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_3_customer_model');
        $result = $this->model->get_pending_orders($get_data['user_id']);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }


        echo json_encode($data);
        exit;
    }

    // fill view pending order table
    public function fill_pending_order_table()
    {
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_3_customer_model');
        $result = $this->model->fill_pending_order_table($get_data['order_id']);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }


    public function get_deliveries()
    {
        session_start();
        $this->model('cus_model');
        $result = $this->model->fill_deliveries($_SESSION['userid']);
        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }


        echo json_encode($data);
        exit;
    }

    public function view_orders_deliver()
    {
        $this->view->render('view_order_deliver');
    }


    public function view_orders_deliver_pending()
    {
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_3_customer_model');
        $result = $this->model->fill_pending_order_table($get_data['order_id']);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }
}
