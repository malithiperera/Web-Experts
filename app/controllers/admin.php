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
    
            $send_mail_result = mail($to, $subject, $body, $header);
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
            unset($_POST['submit']);
        }
    $this->send_mail($name, $email, $verificationCode);
        $this->view->render('view_admin_addemployee');
        
        
    }


    public function createPassword(){

        $this->model('register_model');
        $url = $_GET['code'];

        
        // print($url);
        $resultset = $this->model->email_verification($url);
        if(mysqli_num_rows($resultset) > 0){
            $this->view->url = $url;
            $this->view->render('view_createpassword');
            
        }
        
        // print($resultset);
        
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
                    $this->view->render('_1_view_adminHome');
                }
                else{
                    echo "something error";
                }
            }
        }
        

        
    }

}

?>