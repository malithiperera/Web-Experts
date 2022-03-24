<?php

class product extends controller{

    function __construct(){
        parent::__construct();
    }

public function add_product()
{
   
    $statusMsg = '';
    $id=$_POST["id"];
    $cat=$_POST['category'];
    $name=$_POST["name"];
    $des=$_POST["des"];
    $price=$_POST["price"];
    // File upload path
    $targetDir = "../../Web-Experts/public/images/uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

        $allowTypes = array('jpg','png','jpeg','gif','pdf','JPG');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                
                $this->model('product_model');

                $result= $this->model->search_product_id($id);
                if($result->num_rows>0){
                    
                   
                       echo "invalid  Id";
                 }
                 $result=$this->model->add_product($id,$name,$des,$price,$fileName,$cat);
                 
            if($result){
                $error= 1;
                $_SESSION["error"] = $error;
                $this->view->added=$_SESSION["error"];
                // echo $_SESSION["error"];
                $this->view->render('view_stockmanager_addproduct');
               
           
          
            }
            else{
                $error = 0;
                $_SESSION["error"] = $error;
               
            } 
}
else{
    $error = "Sorry, there was an error uploading your file.";
    $_SESSION["error"] = $error;
   
}
}   
else{
    $error = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    $_SESSION["error"] = $error;
   
}
}
else{
    $error = 'Please select a file to upload.';
    $_SESSION["error"] = $error;
    
    
    
}

// Display status message
echo $statusMsg;

}    
}