<?php

class salesRep extends controller{

    function __construct(){
        parent::__construct();
    }
    public function send_mail($name, $email, $verificationCode){
            
        echo $name,$email,$verificationCode;
        $url = 'http://localhost/web-Experts/public/salesrep/createPassword?code='.$verificationCode;
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
        if($this->view->added == 1){
            $this->send_mail($name, $email, $verificationCode);
            // header('Location: http://localhost/web-Experts/public/admin/addEmployee?succuss='.true);   
        }
        else{
            echo $this->view->added;
        }
    }    
        
}
    public function register_salesrep(){
        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $address = $_POST['add'];
        $tele = $_POST['tel'];
        $user_id= $_POST['userid'];
        $verificationCode=sha1($email);
        

        if(isset($_POST['submit'])){
        $this->model('register_model');
        $result=$this->model->checkmail($email,$user_id);

        if($result==null){
        $this->view->added = $this->model->register_user('salesrep', $name, $nic, $dob, $email, $address, $tele,$verificationCode);
        
        echo $this->view->added;
        if($this->view->added == 1){
            $this->send_mail($name, $email, $verificationCode);
            header('Location: http://localhost/web-Experts/public/salesrep/addEmployee?succuss='.true);   
        }
        else{
            echo $this->view->added;
        }
    }

    
}
else{
    $_SESSION['error']="User_id or email already exists";
    header('Location: http://localhost/web-Experts/public/salesrep/addEmployee?succuss='.true);   


}

}
public function addEmployee(){

        
        $this->view->render('view_admin_addemployee');
 
}

public function createPassword(){

    $this->model('register_model');
    $url = $_GET['code'];

    $resultset = $this->model->email_verification1($url);
    if(mysqli_num_rows($resultset) > 0){
        $this->view->url = $url;
        $this->view->render('view_createpassword');   
    }
    
}



}

?>