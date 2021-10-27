<?php

class profile extends controller{

    function __construct(){
        parent::__construct();
    }

public function edit_profile()
{
    session_start();
     $this->model("profile_model");
     $result = $this->model->edit_profile($_SESSION['userid']);

     $data = [$result->fetch_assoc()];

    echo json_encode($data);
    exit;



}





}