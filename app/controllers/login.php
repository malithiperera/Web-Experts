<?php

class login extends controller{

    function __construct(){
        parent::__construct();
    }

    public function index(){
        echo "404 ERROR";
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
        
        $users = $this->model->validate($username, $password);
        $count = mysqli_num_rows($users);
         
        if($count == 1){
            
            $row = $users -> fetch_assoc();

            $viewname = "_1_view_".$row['position']."Home";
            header('Location: http://localhost/web-Experts/public/login/adminHome?viewname='.$viewname);
          
        }
        else{
            header('Location: http://localhost/web-Experts/public/login/login?succuss=no');
        }
    }

    public function adminHome(){
        $this->view->render($_GET['viewname']);
    }

    //forget password
    public function forgetPassword(){
        //view name to this>>>>>>>
        $this->view->render('view_forgetpassword');
    }

    public function errorPage(){
        $this->view->render('view_all_errorPage');
    } 

    public function test(){
        $this->view->render('test');
    }

}