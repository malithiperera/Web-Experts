<?php

class orders extends controller{

    function __construct(){
        parent::__construct();
    }

    public function create_bill()
    {
        $this->model('order_model');
        $result=$this->model->create_bill();
        $this->view->added=$result;
         $this->view->render("view_customer_placeorder");
        // if ($result->num_rows > 0) {
             
        //     while($row = $result->fetch_assoc()) {
        //       echo "id: " . $row["product_name"]. " - Name: " . $row["product_id"]. " " . $row["type"]. "<br>";
        //     }
        //   } else {
        //     echo "0 results";
        //   }
       
       
    }
}