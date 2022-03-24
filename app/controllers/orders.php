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
//suggest user and shop name
    public function suggest_user(){
        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);
        $this->model('order_model');
        $result=$this->model->suggest_user($recieved_data);


$data = [];
while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
}

        echo json_encode($data);
        exit;



    }
}