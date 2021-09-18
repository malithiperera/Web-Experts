<?php

class login extends controller{

    function __construct(){
        parent::__construct();
    }

    public function home(){
        $this->view->render('view_newhome');
        
    }

    public function login(){
        $this->view->render('view_login');
    }

    public function loginSubmit(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $this->model('home_model');
        // $this->view->render('test');
        // $this->view->users = $this->model->validate($username, $password);
        $users = $this->model->validate($username, $password);
        $count = mysqli_num_rows($users);
        
        // echo $row['position'];
        // // echo $users;
        if($count == 1){
            $row = $users -> fetch_assoc();
            $viewname = "_1_view_".$row['position']."Home";
            $this->view->render($viewname);
        }
        else{
            $this->view->error = "error";
            $this->view->render('view_login');
        }
    }

    

}