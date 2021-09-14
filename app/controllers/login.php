<?php

class login extends controller{

    function __construct(){
        parent::__construct();
    }

    public function home(){
        $this->view->render('home_view');
    }

    public function login(){
        $this->view->render('logIn_view');
    }

    public function actor(){
        $this->model('home_model');
        $email = $_POST['email'];
        $password = $_POST['password'];
        $true1 = 0;
        $true2 = 0;

        //check is admin
        $this->view->users = $this->model->isAdmin($email);

        if ($this->view->users->num_rows > 0) {
        // output data of each row
         while($row = $this->view->users->fetch_assoc()) {
            if($row["password"] == $password){
                $true1 = 1;
            }
            }
         } 
         if($true1 == 1){
            $this->view->render("adminHome_view");
         }
        
        //check is customer
        $this->view->users = $this->model->isCustomer($email);

        if ($this->view->users->num_rows > 0) {
        // output data of each row
         while($row = $this->view->users->fetch_assoc()) {
            if($row["password"] == $password){
                $true2 = 1;
            }
            }
         } 
         if($true2 == 1){
            $this->view->render("customerHome_view");
         }
    }

    public function help(){
        $this->view->render('help_view');
    }

    public function forgetPassword(){
        $this->view->render('forgetPassword_view');
    }

}