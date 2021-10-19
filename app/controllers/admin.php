<?php

class admin extends controller{

    function __construct(){
        parent::__construct();
    }

    public function add_user(){
        $this->view->render('view_admin_addemployee');
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