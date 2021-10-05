<?php

class admin extends controller{

    function __construct(){
        parent::__construct();
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
    
            $send_mail_result = mail($sender,$to, $subject, $body, $header);
            if($send_mail_result){
                echo "succuss";
            }
            else{
                echo "error";
            }
    }

    public function register_admin(){

            $name = $_POST['name'];
            $nic = $_POST['nic'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $address = $_POST['add'];
            $tele = $_POST['tel'];
           
            $verificationCode = sha1($email);  

        if(isset($_POST['submit'])){
            $this->model('register_model');
            $this->view->added = $this->model->register_user('admin', $name, $nic, $dob, $email, $address, $tele, $verificationCode);
            echo $name,$nic,$dob,$address;
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
        $rowcount=mysqli_num_rows($resultset);
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
                    header('Location: http://localhost/web-Experts/public/admin/renderAdminHome');
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
        $this->view->render('view_admin_routes');
    }
    public function add_route(){
        //adding process here
        header("Location: http://localhost/web-Experts/public/admin/routes");
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

    public function logout(){
        
    }

}

?>