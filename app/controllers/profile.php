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

public function save_profile(){

    session_start();
    $email=$_POST['email'];
    $tel=$_POST['tele'];
    $address=$_POST['address'];
    $nic=$_POST['nic'];

    if(isset($_POST['submit'])){
        $this->model('profile_model');
        $result = $this->model->save_profile($email,$tel,$address,$nic,$_SESSION['userid']);
        
        if($result){
            
            $_SESSION['msg']="Profile Updated successfully";
            $this->view->render('view_all_editProfile');

        }

    }

    
}

public function changepassword(){
    session_start();
    $userid=$_SESSION['userid'];
    $get_data = file_get_contents('php://input');
    $get_data = json_decode($get_data, true);

$this->model('profile_model');
$result=$this->model->changepass($get_data['old_password'],$userid);
if($result){
$result1=$this->model->savepass($get_data['new_pass'],$userid);
echo json_encode($result1);
exit;
}
else{
    echo json_encode($result);
    exit;
}


}

public function testmali(){
    $this->view->render('testmali');
}

public function test(){
    $get_data=file_get_contents('php://input');
    $get_data=json_decode($get_data,true);
    $this->model('profile_model');
    $result=$this->model->test($get_data);
    echo json_encode($result);
}

public function landform(){
    // if(isset($_POST['submit'])){

        $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

  

    // }

    


}

//save changes
public function save_changes(){

    session_start();
    $userid=$_SESSION['userid'];
    $get_data=file_get_contents('php://input');
    $get_data=json_decode($get_data,true);
    $this->model('profile_model');
    $result=$this->model->save_change_info($get_data['name'],$get_data['address'],$get_data['email'],$get_data['nic'],$get_data['tele'],$userid);
    echo json_encode($result);

}

}