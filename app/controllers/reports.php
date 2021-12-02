<?php

class reports extends controller
{

    function __construct()
    {
        parent::__construct();
    }


    function order_table()
    {
        session_start();
     $this->model("cus_model");
     $result = $this->model->order_table($_SESSION['userid']);

     $data = [$result->fetch_assoc()];

    echo json_encode("Hello");
    exit;
    }

 public function get_types()
{
    session_start();
    $type=$_SESSION['type'];


    echo json_encode($type);
    exit;
    
}

    function customer_summary()
    {
        $result_set=array();
        session_start();
        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);

        $this->model("report_model");
        
        $result=$this->model->customer_summary_loadcards($recieved_data['month'],$recieved_data['year'],$_SESSION['userid']);

        array_push($result_set,$result);



        $result1=$this->model->customer_summary($recieved_data['month'],$recieved_data['year'],$_SESSION['userid']);
        $data = [];

        while ($row = $result1->fetch_assoc()) {
            array_push($data, $row);
        }
        array_push($result_set,$data);


        $result2=$this->model->customer_summary_del($recieved_data['month'],$recieved_data['year'],$_SESSION['userid']);
        $data1 = [];

        while ($row = $result2->fetch_assoc()) {
            array_push($data1, $row);
        }
        array_push($result_set,$data1);




        echo json_encode($result_set);
        exit;
        
    }

    public function reports(){
       $month= $_GET['month'];
       $year=$_GET['year'];
       $this->view->added=$month;
       $this->view->added1=$year;
        $this->view->render('view_all_report');


     

    //   
        if(isset($_POST['submit'])){
          
        
       
    }

    }


    public function customer_summary_year(){
        session_start();
        $result_set=array();
        $userid=$_SESSION['userid'];


        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);
        $this->model("report_model");

        $result1=$this->model->customer_summary_yearloadcards( $recieved_data['year'],$userid);
        array_push($result_set,$result1);

        $result2=$this->model->fill_graph_sum( $recieved_data['year'],$userid);
        $data1 = [];
        while ($row = $result2->fetch_assoc()) {
            array_push($data1, $row);
        }
        array_push($result_set,$data1);
        

      
        echo json_encode($result_set);
        exit;

    }

    
}