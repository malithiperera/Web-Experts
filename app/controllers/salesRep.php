<?php

class salesRep extends controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function register_salesrep()
    {

        $user_id = $_POST['userid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $verificationCode = sha1($email);
        $type = "rep";
        $active = "pending";
        $nic = $_POST['nic'];
        $address = $_POST['add'];
        $dob = $_POST['dob'];
        $tele = $_POST['tel'];




        if (isset($_POST['submit'])) {
            $this->model('register_model');
            $this->view->added = $this->model->register_user(
                $user_id,
                $name,
                $email,
                $verificationCode,
                $type,
                $active,
                $nic,
                $address,
                $dob,
                $tele
            );
            if ($this->view->added == 1) {
                $this->send_mail($name, $email, $verificationCode);
                header('Location: http://localhost/web-Experts/public/admin/addEmployee?succuss=' . true);
            } else {
                echo $this->view->added;
            }
        }
    }
/
    public function addEmployee()
    {
        if ($_GET['succuss'] == true) {
            $this->view->added = 1;
            $this->view->render('view_admin_addemployee');
        }
        $_GET['success'] = 'false';
    }


    public function createPassword()
    {

        $this->model('register_model');
        $url = $_GET['code'];
        $resultset = $this->model->email_verification($url);

        $rowcount = $resultset->num_rows;
        if ($rowcount == 1) {
            $this->view->url = $url;
            $this->view->render('view_createpassword');
        }
    }

    public function send_mail($name, $email, $verificationCode)
    {

        $url = 'http://localhost/web-Experts/public/admin/createPassword?code=' . $verificationCode;
        $to = $email;
        $sender = "himaleedairyproducts@gmail.com";
        $subject = "verify email address";
        $body = "<p>Dear," . $name . "</p>";
        $body .= "<p>Welcome to Himalee takehere to verify your account</p>";
        $body .= "<a href=" . $url . ">Click Me</a>";
        $header = "From : {$sender}\r\nContent-Type:text/html;";

        $send_mail_result = mail($to, $subject, $body, $header);
        if ($send_mail_result) {
            echo "succuss";
        } else {
            echo "error";
        }
    }


    public function view_report()
    {
        $this->view->render('view_customer_viewreport');
    }
    
    public function customer_registration()
    {
        $this->model('_2_salesrep_model');
        $this->view->result = $this->model->select_route();
        $this->view->render('view_rep_customerRegistration');
    }

    //to load customer details
    public function customer_home(){
        $this->model('_2_salesrep_model');
        $this->view->result=$this->model->not_delivered();
        $this->view->result1=$this->model->delivered();
        $this->view->render('view_rep_customerHome');
    }
    public function home()
    {
        $this->view->render('_1_view_repHome');
    }
    public function returns()
    {
        $this->view->render('view_rep_return');
    }
    public function cashPayment()
    {
        $this->model('_2_salesrep_model');
        $this->view->result = $this->model->select_order();
        $this->view->render('view_rep_cash');
    }
    public function chequePayment()
    {
        $this->model('_2_salesrep_model');
        $this->view->result = $this->model->select_order();
        $this->view->render('view_rep_cheque');
    }
    public function profile()
    {
        $this->view->render('view_all_editProfile');
    }
    public function product_list()
    {
        $this->model('_2_salesrep_model');
        $this->view->result = $this->model->daily_productList();
        $this->view->render('view_rep_productList');
    }

    public function shop_product_list()
    {
        $this->model('_2_salesrep_model');
        $this->view->result = $this->model->daily_productList();
        $this->view->render('view_rep_shopProductList');
    }

    public function place_order()
    {
        $this->view->render('test2');
    }

    // INSERT CASH PAYMENT

    public function add_cashPayment()
    {
        // echo $_POST['abc'];
        $orders_id = $_POST['orderId'];
        $total = $_POST['total'];
        $date = $_POST['date'];

        $this->model('_2_salesrep_model');
        $this->model->insert_cashPayment($orders_id, $total, $date);
        header("Location: http://localhost/web-Experts/public/salesRep/cashPayment");
    }

    // INSERT CHEQUE PAYMENT

    public function add_chequePayment()
    {
        // echo $_POST['abc'];
        $orders_id = $_POST['orderId'];
        $total = $_POST['total'];
        $date = $_POST['date'];
        $bank = $_POST['bank'];


        $this->model('_2_salesrep_model');
        $this->model->insert_cashPayment($orders_id, $total, $date, $bank);
        header("Location: http://localhost/web-Experts/public/salesRep/chequePayment");
    }

    //CONFIRM ORDER DELIVERY- REP PROFILE

    public function ConfirmOrder()
    {
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_2_salesrep_model');
        $result=$this->model->confirm_delivery($get_data);  

        $data = [];

        // while ($row = $result->fetch_assoc()) {
        //     array_push($data, $row);
        // }

        echo json_encode($data);
        exit;
        
        

    }

    public function view_notifications()
    {
        $this->view->render('view_rep_notification');
    }
    public function amount()
    {
        $data = [];
        $body = json_decode(file_get_contents('php://input'));
        $order_id = $body->order_id;
        $this->model('_2_salesrep_model');
        $result = $this->model->order_amount($order_id);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
        exit;
    }
    public function fill_home()
    {
        $data = [];

        $this->model('_2_salesrep_model');
        $result = $this->model->get_orders_data();

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    //get product of order
    public function get_product()
    {
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_2_salesrep_model');

        //get order products
        $result = $this->model->get_order_products($get_data['route_id']);

        $data = [];

        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }



        echo json_encode($data);
        exit;
    }

    public function load_card()
    {
        session_start();
        $this->model('_2_salesrep_model');
        $result = $this->model->get_home_cards($_SESSION['userid']);

        $data = [$result];

        echo json_encode($data);
        exit;
    }


    //achievements 

    public function target()
    {
        session_start();
        $this->model('_2_salesrep_model');
        $result = $this->model->get_home_cards($_SESSION['userid']);

        $data = [$result];

        echo json_encode($data);
        exit;
    }

    //search customer by sales rep
    public function search_customer()
    {
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_2_salesrep_model');
        $result = $this->model->search_customer($get_data);

        echo json_encode($result->fetch_assoc());
        exit;
    }

    public function achievement()
    {
        session_start();

        $this->model('_2_salesrep_model');
        $result = $this->model->achievements($_SESSION['userid']);
        

       

        echo json_encode($result);
        exit;

        // $this->view->render('view_rep_achievements');
    }
    public function achievements()
    {

        $this->view->render('view_rep_achievements');
    }
    
 

    //request a product list from stock manager
    public function request_product_list(){
        $this->view->render('view_rep_stock_request');
    }
}
