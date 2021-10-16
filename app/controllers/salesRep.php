<?php

class salesRep extends controller{

    function __construct(){
        parent::__construct();
    }
  
    public function register_salesrep(){

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


public function view_report(){
    $this->view->render('view_customer_viewreport');
}
public function achievements(){
    $this->view->render('view_rep_achievements');
}
public function customer_registration(){
    $this->view->render('view_rep_customerRegistration');
}
public function customer_home(){
    $this->model('_2_salesrep_model');
    $this->view->result=$this->model->not_delivered();
    // $this->view->result=$this->model->load_route();
    $this->view->render('view_rep_customerHome');
}
public function home(){
    $this->view->render('_1_view_repHome');
}
public function returns(){
    $this->view->render('view_rep_return');
}
public function cashPayment(){
    $this->view->render('view_rep_cash');
}
public function chequePayment(){
    $this->view->render('view_rep_cheque');
}
public function profile(){
    $this->view->render('view_all_editProfile');
}
public function product_list(){
    $this->view->render('view_rep_productList');
}
}

?>