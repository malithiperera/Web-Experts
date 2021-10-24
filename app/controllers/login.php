<?php

class login extends controller
{

    function __construct()
    {
        parent::__construct();
    }



    public function customer_home($userid)
    {
        
        list($firstArray, $secondArray)=$this->model->customer_home_detail_check($userid);
       
        $this->view->added=$firstArray; 
       
         


        
        $this->view->render('_1_view_customerHome');


    }



        // $this->view->render("view_customer_placeorder");
    

    public function index()
    {
        echo "404 ERROR";
    }

    public function home()
    {
        $this->view->render('view_newhome');
    }

    public function login()
    {
        $this->view->render('view_login');
    }

    public function loginSubmit()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $this->model('home_model');

        $users = $this->model->validate($username, $password);
        $count = mysqli_num_rows($users);

        if ($count == 1) {

            $row = $users->fetch_assoc();

            $viewname = "_1_view_" . $row['type'] . "Home";
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $row['user_id'];

            if ($row['type'] == 'customer') {

                $this->customer_home($_SESSION['userid']);
            }
            // echo $_SESSION['userid'];

            else {
                // $this->view->render('')
                header('Location: http://localhost/web-Experts/public/login/adminHome?viewname=' . $viewname);


                // header('Location: http://localhost/web-Experts/public/login/adminHome/'.$viewname);
            }
        } else {
            header('Location: http://localhost/web-Experts/public/login/login?succuss=no');
        }
    }

    public function adminHome()
    {
        $this->view->render($_GET['viewname']);
        // $this->view->render($viewname);
    }

    //forget password

    public function forgetPassword()
    {
        //view name to this>>>>>>>
        $this->view->render('view_sendmail');
    }


    public function errorPage()
    {
        $this->view->render('view_all_errorPage');
    }

    public function test()
    {
        $this->view->render('test2');
    }

    //this is the point
    public function test2()
    {

        // $data = [];
        // if($_SERVER['REQUEST_METHOD'] !== 'POST')
        // {
        //     $data['statusCode'] = 405;
        //     $data['success'] = false;
        //     $data['messages'] = 'Method not allowed';
        //     echo json_encode($data);
        //     exit;
        // }

        // if(!($body = json_decode(file_get_contents('php://input'))))
        // {
        //     $data['statusCode'] = 400;
        //     $data['success'] = false;
        //     $data['messages'] = 'Invalid request body';
        //     echo json_encode($data);
        //     exit;
        // }

        $body = json_decode(file_get_contents('php://input'));
        $product_name = $body->product;

        //call to model
        $this->model('home_model');
        $result_set = $this->model->search_items($product_name);


        $data = [];
        //    $data = $result_set->fetch_assoc();
        while ($row = $result_set->fetch_assoc()) {
            $data[] = $row;
        }
        //    $data['name'] = 'dienth';

        // $data['data'] = [
        //     'return_value' => $product_name

        // ];
        echo json_encode($data);
        exit;
    }
    public function test3()
    {
        $this->model('home_model');
        $this->view->result = $this->model->test3();
        $this->view->render('test3');
    }

    public function place_order()
    {
        $recieved_data_encoded = file_get_contents("php://input");
        $recieved_data = json_decode($recieved_data_encoded, true);

        $this->model('home_model');

        foreach ($recieved_data as $value) {
            $result = $this->model->place_order($value);
            echo $result;
        }
        // print $recieved_data;

        // $this->model('home_model');
        // $this->model->place_order($recieved_data);

    }

    public function resetMail()
    {
        $this->model('home_model');
        $email = $_POST['email'];

        $verificationCode = sha1($email);
        if (isset($_POST['submit'])) {

            $result = $this->model->resetMail($email, $verificationCode);

            $count = mysqli_num_rows($result);
            $row = $result->fetch_assoc();

            if ($count == 1) {


                //  echo $reseturl;
                $url = 'http://localhost/web-Experts/public/admin/createPassword?code=' . $verificationCode;
                $to = $email;
                $sender = "himaleedairyproducts@gmail.com";
                $subject = "Reset email address";
                $body = "<p>Dear," . $row["name"] . "</p>";
                $body .= "<p> takehere to reset your account</p>";
                $body .= "<a href=" . $url . ">Click Me</a>";
                $header = "From : {$sender}\r\nContent-Type:text/html;";

                $send_mail_result = mail($to, $subject, $body, $header);
                if ($send_mail_result) {
                    $_SESSION['error'] = "Reset Link send to your email..Please Check the email";
                    $this->view->render('view_sendmail', $_SESSION['error']);
                } else {
                    echo "error";
                }
            }
        }
    }

    public function createPassword()
    {
        $this->view->render('view_createpassword');
        $this->model('register_model');
        $url = $_GET['code'];

        $resultset = $this->model->forgetverification($url);
        $count = $resultset->num_rows;
        if ($count == 1) {

            $this->view->url = $url;
            $this->view->render('view_createpassword');
        }
    }

    public function logout()
    {

        session_start();
        session_unset();
        session_destroy();
        header("Location: http://localhost/web-Experts/public/login/login");
    }
}
