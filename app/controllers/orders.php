<?php

class orders extends controller{

    function __construct(){
        parent::__construct();
    }

    public function create_bill()
    {
        session_start();
        $this->model('order_model');
        $result=$this->model->create_bill($_SESSION['userid']);
       
        // $result1=$result->fetch_assoc();
         $this->view->added=$result;
         $this->view->render("test2");
         
        // if ($result->num_rows > 0) {
             
        //     while($row = $result->fetch_assoc()) {
        //       echo "id: " . $row["product_name"]. " - Name: " . $row["product_id"]. " " . $row["type"]. "<br>";
        //     }
        //   } else {
        //     echo "0 results";
        //   }
       
       
    }
}