<?php

class salesRep extends controller{

    function __construct(){
        parent::__construct();
    }

    public function register_salesrep(){
        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $address = $_POST['add'];
        $tele = $_POST['tel'];

        $this->model('register_model');
        $this->view->added = $this->model->register_user('salesrep', $name, $nic, $dob, $email, $address, $tele);
        $this->view->render('view_admin_addemployee');

    }

}

?>