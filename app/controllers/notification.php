<?php

class notification extends controller{
    function __construct()
    {
        parent::__construct();
    }

    //testing notification
    public function test_notification(){
        $this->view->render('view_all_notification');
    }

    public function load_notification(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->load_notification($get_data['to_whom'], $get_data['user_id'], $get_data['notification_type']);

        $data = [];

        while($row = $result->fetch_assoc()){
            

            switch ($row['notification_type']){
                case 1:
                    $details = $this->model->get_product_details($row['product_id']);
                    $product_details = $details->fetch_assoc();

                    $subject = 'added new '.$product_details['type']." product , named ".$product_details['product_name'].".";
                    
                    break;
                case 2:

                    $details = $this->model->confirm_delivery($row['delivery_id']);
                    $subject = $details[3]['name'].'\'s delivery completed by '.$details[4]['name'];
                    break;
                case 31:
                case 32:
                    $subject = 'this notification about stocks.';
                    break;
                case 4:
                    $details = $this->model->get_credit_request_details($row['req_id']);
                    $request_details = $details->fetch_assoc();

                    $subject = $request_details['shop_name'].' is requesting a credit time.';
                    break;
                case 5:
                    $details = $this->model->add_returns($row['return_id']);           

                    $subject = $details[0].' is added a return from '.$details[1];
                    break;
                case 6: 
                    
                    $details = $this->model->stock_crashes($row['issue_id']);

                    $subject = 'some issue with '.$details[1]['name'].' stock completion, issued by '.$details[2]['name'].'.';
                    break;
                default:
                    $subject = 'subject';
            }

            array_push($row, $subject);
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    public function see_notification($notification_id){

        $this->view->notification_id = $notification_id;
        $this->view->render('view_all_notification_view');
        
    }

    public function load_notification_page(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->load_notification_page($get_data);

        echo json_encode($result->fetch_assoc());
        exit;
    }

    //notifications about new product addition
    public function product_addition(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->product_addition($get_data);

        echo json_encode($result->fetch_assoc());
        exit;
    }

    //notifications for cretid period requests from customers
    public function request_credit_period(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->requst_credit_period($get_data);

        echo json_encode($result->fetch_assoc());
        exit;
    }

    //details abuot returns
    public function add_returns(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->add_returns($get_data);

        echo json_encode($result);
        exit;
    }

    //get delivery details
    public function confirm_delivery(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->confirm_delivery($get_data);

        echo json_encode($result);
        exit;
    }

    //get product issue details
    public function stock_crashes(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('notification_model');
        $result = $this->model->stock_crashes($get_data);

        echo json_encode($result);
        exit;
    }
   
}

?>