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



    public function home()
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
        $this->view->render('view_customer_report');
    }

    public function place_order_view()
    {
        session_start();
        $userid=$_SESSION['userid'];

        $this->model('order_model');
        

        //check pending orders
//         $result=$this->model->checkorders($userid);
//         // $result1=mysqli_fetch_assoc($result);
//         // print_r($result1);

// if(mysqli_num_rows($result)==0){
//     //  $this->view->render('test2');


// }
// else{
   
//     $this->view->flag=1;
//     $this->view->render("_1_view_customerHome");
// }

        
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

        $this->view->render('view_customer_vieworders');
    }

    public function view_notification()
    {
        $this->view->render('view_customer_notification');
    }

    public function profile()
    {
        $this->view->render('admin_sketch');
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
    //get discounts
    public function discounts()
    {
        $this->model('product_model');
        $result = $this->model->show_discounts();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
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
        // $data = [];

        // while ($row = $result->fetch_assoc()) {
        //     array_push($data, $row);
        // }


        echo json_encode($result);
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



    //render view reqiest
    public function send_request()
    {
        $this->view->render('repsketch');
    }



    //credit request

    public function creit_request()
    {

        session_start();

        $this->model('cus_model');
        $result = $this->model->fill_creit_request($_SESSION['userid']);

        echo json_encode($result->fetch_assoc());
        exit;
    }



    public function update_order()
    {

        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);


        $this->model('order_model');
        $result=$this->model->update_order($recieved_data['order'],$recieved_data['date'],$recieved_data['amount'], $recieved_data['table']);


        // $check = $this->model->update_order($recieved_data['order'],$recieved_data['date'],$recieved_data['amount'], $recieved_data['table']);


        echo json_encode($result);
        exit;
    }

    public function customer_request()
    {
        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);

        $this->model('cus_model');
        $result = $this->model->customer_request($recieved_data['id'], $recieved_data['new_period'], $recieved_data['reason']);

        echo json_encode($result);
    }

    public function get_overdue()
    {
        $data_enc = file_get_contents("php://input");
        $data = json_decode($data_enc, true);
        $this->model('cus_model');
        $result = $this->model->get_overdue($data);
        echo json_encode($result);
    }
}
