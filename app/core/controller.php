<?php

class Controller {

    function __construct(){
        require 'view.php';
        $this->view = new view();
    }

    

    public function model($modelName){
        
        require '../app/models/'.$modelName.'.php';
        $this->model = new $modelName();
    }
}