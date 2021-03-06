<?php

class admin extends controller{

    function __construct(){
        parent::__construct();
        session_start();
    }

    public function load_view(){

        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        //get data for cards
        $this->model('_1_admin_model');
        $result = $this->model->load_view_data();

        //get data for charts
        //sales overview chart
        $result1 = $this->model->get_data_for_charts();
        //best sales reps chart
        $result2 = $this->model->get_best_sales_reps();
        //get customer registration data
        $result3 = $this->model->get_customer_reg_data();


        $data = [$result];
        //add chart data to return array
        array_push($data, $result1);
        array_push($data, $result2);
        array_push($data, $result3);

        echo json_encode($data);
        exit;
    }

    public function add_user(){
        $this->view->render('view_admin_addEmployee_s');
    }

    public function send_mail($name, $email, $verificationCode){
            
            $url = 'http://localhost/web-Experts/public/admin/createPassword?code='.$verificationCode;
            $to = $email;
            $sender = "himaleedairyproducts@gmail.com";
            $subject = "verify email address";
            $body = "<p>Dear,".$name."</p>";
            $body .="<p>Welcome to Himalee takehere to verify your account</p>";
            $body .= "<a href=".$url.">Click Me</a>";
            $header = "From : {$sender}\r\nContent-Type:text/html;";
    
            $send_mail_result = mail($to, $subject, $body, $header);
            if($send_mail_result){
                echo "succuss";
            }
            else{
                echo "error";
            }
    }

    public function register_admin(){

            $user_id = $_POST['userid'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $verificationCode = sha1($email); 
            $type = "admin";
            $active = "pending";
            $nic = $_POST['nic'];
            $address = $_POST['add'];
            $dob = $_POST['dob'];
            $tele = $_POST['tel'];

           
             

        if(isset($_POST['submit'])){
            $this->model('register_model');
            $this->view->added = $this->model->register_user($user_id, $name, $email, $verificationCode, $type, $active, $nic, $address, $dob, $tele);
            if($this->view->added == 1){
                $this->send_mail($name, $email, $verificationCode);
                header('Location: http://localhost/web-Experts/public/admin/addEmployee?succuss='.true);   
            }
            else{
                echo $this->view->added;
            }
        }    
    }

    public function addEmployee(){
        if($_GET['succuss'] == true){
            $this->view->added = 1;
            $this->view->render('view_admin_addEmployee_s');
        }
        $_GET['succuss'] = 'false';
    }


    public function createPassword(){

        $this->model('register_model');
        $url = $_GET['code'];
        $resultset = $this->model->email_verification($url);

        $rowcount=$resultset->num_rows;
        if($rowcount==1){
            $this->view->url = $url;
            $this->view->render('view_createpassword');   
        }
        
    }



    public function confirmPassword(){
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword']; 

      if(isset($_POST['submit'])){
            if($newPassword == $confirmPassword){
                
                $this->model('register_model');
                $global_url = $_GET['code'];
                $check = $this->model->activeUser($global_url, $newPassword);
                if($check == 1){
                    header('Location: http://localhost/web-Experts/public/login/login');
                }
                else{
                    echo "something error";
                }
            }
        }      
    }

    public function renderAdminHome(){
        $this->view->render('_1_view_adminHome');
    }


    public function remove_user(){
        $this->view->render('view_admin_removeEmployee');
    }

    public function routes(){
        // 1 get data
        $this->model('_1_admin_model');
        // print_r($this->model->load_route()); 
        // 2 pass view
        $this->view->result = $this->model->load_route();
        // 3 render view
        if(isset($_GET['success'])){
            echo "successfully added";
        }
        $this->view->render('view_admin_routes');
    }
    public function add_route(){
        //adding process here
        $route_id = $_POST['route_id'];
        $name = $_POST['route_name'];
        $destination = $_POST['destination'];

        $this->model('_1_admin_model');
        $result = $this->model->insert_route($route_id, $name, $destination);
        if($result == 1){
            header("Location: http://localhost/web-Experts/public/admin/routes?success=1");
        }
        
    }

    public function routeProfile(){
        $this->view->render('view_admin_routeProfile');
    }

    // render customer profile for admin
    public function customerProfile(){
        $this->view->cus_id = $_GET['cus_id'];
        $this->view->render('view_admin_cusProfile');
    }

    //get data to load customer profile view
    public function load_cus_view(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->load_cus_data($get_data);

        echo json_encode($result);
        exit;
    }

    //change the customer's credit time from customer profile window by admin
    public function change_credit_time(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->change_credit_period($get_data['cus_id'], $get_data['new_time']);

        $data = [];

        array_push($data, $get_data);
        array_push($data, $result);

        echo json_encode($data);
        exit;
    }

    public function viewReport(){
        $this->view->render('view_customer_viewreport');
    }

    public function notification(){

        $this->view->render('view_all_notification');
        
    }

    public function profile(){
        $this->view->render('view_all_editProfile');
    }

    public function add_new_cus(){
        $this->view->render('view_rep_customerRegistration');
    }

    public function test(){
        $this->view->render('test');
    }
    public function test_test(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->test_test();

        echo json_encode($result);
        exit;
    }

    //get suggestions for search customer
    public function search_customer(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->search_customer($get_data['customer_id']);

        $data = [];
        
        while($row = $result->fetch_assoc()){
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    //search customer using route
    public function search_customer_by_route_get_route(){
        $data = [];

        $this->model('_1_admin_model');
        $result = $this->model->search_customer_by_route_get_route();

        while($row = $result->fetch_assoc()){
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    //filter customers in the route
    public function filter_customer_in_route(){

        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->filter_customer_in_route($get_data['route_id']);

        $data = [];

        while($row = $result->fetch_assoc()){
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    //to get routes
    public function get_routes(){
        $this->model('_1_admin_model');
        $result = $this->model->search_customer_by_route_get_route();

        $data = [];

        while($row = $result->fetch_assoc()){
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    //to suggets sales reps
    public function suggest_rep(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->suggest_rep($get_data['rep_id']);

        $data = [];

        while($row = $result->fetch_assoc()){
            array_push($data, $row);
        }

        echo json_encode($data);
        exit;
    }

    //to add new route
    public function add_new_route(){

        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->add_new_route($get_data['route_name'],
                                            $get_data['destination'],
                                            $get_data['rep_id_input']);

        $data = [$result];

        echo json_encode($data);
        exit;

    }

    //delete route
    public function delete_route(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->delete_route($get_data['route_id']);

        echo json_encode($result);
        exit;
    }

    //check the admin level
    public function check_level(){
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('_1_admin_model');
        $result = $this->model->check_level($get_data);

        echo json_encode($result->fetch_assoc());
        exit;
    }
//routes

public function route_file(){
    $this->view->render("view_admin_routes_new");
}

//search sales rep in popup 
public function search_rep(){
    $get_data = file_get_contents('php://input');
    $get_data = json_decode($get_data, true);

    $this->model('_1_admin_model');
    $result = $this->model->search_rep($get_data);

    $data = [];

    while($row = $result->fetch_assoc()){
        array_push($data, $row);
    }

    echo json_encode($data);
}

//check admin level
public function check_admin(){
    $get_data = file_get_contents('php://input');
    $get_data = json_decode($get_data, true);

    $this->model('_1_admin_model');
    $result = $this->model->check_admin($get_data);


    echo json_encode($result->fetch_assoc());
    exit;
}

public function remove_the_user(){
    $get_data = file_get_contents('php://input');
    $get_data = json_decode($get_data, true);

    $this->model('_1_admin_model');
    $result = $this->model->remove_the_user($get_data['user_id'], $get_data['position'], $get_data['purpose']);

    echo json_encode($result);
    exit;
}

//add employee new view
// public function add_employee_new(){
//     $this->view->render('view_admin_addemployee2');
// }

// //new registration function
// public function new_registration_func(){
//     $get_data = file_get_contents('php://input');
//     $get_data = json_decode($get_data, true);

//     if($get_data['user'] == "admin"){

//     }
//     else if($get_data['user'] == "rep"){

//     }
//     else if($get_data['user'] == "stockManager"){

//     }

//     echo json_encode($get_data);
//     exit;
// }

//give suggestions according to the user role in remove user
public function remove_user_suggestions(){
    $get_data = file_get_contents('php://input');
    $get_data = json_decode($get_data, true);

    $this->model('_1_admin_model');
    $result = $this->model->remove_user_suggestions($get_data['user'], $get_data['position']);

    echo json_encode($result);
    exit;
}

//load tables customer profile in admin 
public function load_customer_tables(){
    $get_data = file_get_contents('php://input');
    $get_data = json_decode($get_data, true);

    $this->model('_1_admin_model');
    $result = $this->model->load_customer_tables($get_data);

    echo json_encode($result);
    exit;
}

}
