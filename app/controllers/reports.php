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
    $this->model("report_model");
        
    $result=$this->model->get_types($type);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }


    echo json_encode($data);
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
       $type=$_GET['type'];
       $this->view->added=$month;
       $this->view->added1=$year;
       $this->view->added2=$type;
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


        $result2=$this->model->fill_graph_sum_del( $recieved_data['year'],$userid);
        $data2 = [];
        while ($row = $result2->fetch_assoc()) {
            array_push($data2, $row);
        }
        array_push($result_set,$data2);


        
        // $result3=$this->model->fill_graph_sum_del( $recieved_data['year'],$userid);
        // $data2 = [];
        // while ($row = $result2->fetch_assoc()) {
        //     array_push($data2, $row);
        // }
        // array_push($result_set,$data2);


        

        



      
        echo json_encode($result_set);
        exit;

    }


    public function sales_summary(){
        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);
        $result_set=array();
        $this->model("report_model");

        $result1=$this->model->sales_summary_cards( $recieved_data['year'],$recieved_data['month']);
        array_push($result_set,$result1);

        $result2=$this->model->sales_summary_table( $recieved_data['year'],$recieved_data['month']);
        $data2 = [];
        while ($row = $result2->fetch_assoc()) {
            array_push($data2, $row);
        }

        array_push($result_set,$data2);
      
      
        echo json_encode($result_set);
        exit;

    }

    public function sales_summary_year(){

        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);

       $this->model('report_model');
       $this->model->sales_summary_year($recieved_data['year']);


    echo json_encode($recieved_data);
        exit;




    }


    public function return_month(){
        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);

       $this->model('report_model');
       $this->model->return_month($recieved_data['year'],$recieved_data['month']);


    echo json_encode($recieved_data);
        exit;


    }

    
}