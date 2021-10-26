<?php

class admin extends controller{

    function __construct(){
        parent::__construct();
    }

    public function load_view(){

        $this->model('_1_admin_model');
        $result = $this->model->load_view_data();

        $data = [$result];
        echo json_encode($data);
        exit;
    }

    public function add_user(){
        $this->view->render('view_admin_addemployee');
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
            $this->view->render('view_admin_addemployee');
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

    public function customerProfile(){
        $this->view->render('view_admin_customerProfile');
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

}

?>