<?php

class admin extends controller{

    function __construct(){
        parent::__construct();
    }

    public function add_user(){
        $this->view->render('view_admin_addemployee');
    }
    public function register_admin(){
        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $address = $_POST['add'];
        $tele = $_POST['tel'];
        
        $this->model('register_model');
        $this->view->added = $this->model->register_user('admin', $name, $nic, $dob, $email, $address, $tele);
        unset($name);
        unset($nic);
        unset($dob);
        unset($email);
        unset($address);
        unset($tele);
        $this->view->render('view_admin_addemployee');
        
    }

    public function createPassword(){
        $this->view->render('view_createpassword');
    }

}

?>