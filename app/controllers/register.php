<?php

class register extends controller
{

    function __construct()
    {
        parent::__construct();
    }



    public function send_mail($name, $email, $verificationCode)
    {


        $url = 'http://localhost/web-Experts/public/register/verified_account?code=' . $verificationCode;
        $to = $email;
        $sender = "himaleedairyproducts@gmail.com";
        $subject = "verify email address";
        $body = "<p>Dear," . $name . "</p>";
        $body .= "<p>Welcome to Himalee takehere to verify your account</p>";
        $body .= "<a href=" . $url . ">Click Me</a>";
        $header = "From : {$sender}\r\nContent-Type:text/html;";

        $send_mail_result = mail($to, $subject, $body, $header);
        if ($send_mail_result) {
            return "succuss";
        } else {
            return "error";
        }
    }

    // public function employee_register()
    // {


    //     $user_id = $_POST['userid'];
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $verificationCode = sha1($email);
    //     $type = $_GET['user'];
    //     $active = "pending";
    //     $nic = $_POST['nic'];
    //     $address = $_POST['add'];
    //     $dob = $_POST['dob'];
    //     $tele = $_POST['tel'];
    //     $target = "";
    //     $level = "";



    //     if ($type == 'admin') {

    //         $level = $_POST['level'];
    //     }
    //     if ($type == 'rep') {

    //         $target = $_POST['target'];
    //     }


    //     if (isset($_POST['submit'])) {
    //         $this->model('register_model');
    //         $this->view->added = $this->model->register_user($user_id, $name, $email, $verificationCode, $type, $active, $nic, $address, $dob, $tele, $target, $level);
    //         if ($this->view->added == 1) {
    //             $this->send_mail($name, $email, $verificationCode);
    //             header('Location: http://localhost/web-Experts/public/register/addEmployee?succuss=' . true);
    //         } else {
    //             // $this->view->added = 2;
    //             // echo $this->view->added;
    //             header('Location: http://localhost/web-Experts/public/register/addEmployee');
    //         }
    //     }
    // }

    // public function addEmployee()
    // {
    //     if ($_GET['succuss'] == true) {
    //         // session_start();

    //         $this->view->added = 1;
    //         $this->view->render('view_admin_addemployee');
    //     } else {
    //         $this->view->added = 2;
    //         $this->view->render('view_admin_addemployee');
    //     }
    // }

    //notice verified
    public function verified_account()
    {
        $this->model('register_model');
        $url = $_GET['code'];
        $resultset = $this->model->email_verification($url);

        $rowcount = $resultset->num_rows;
        if ($rowcount == 1) {
            $this->view->success = 1;
            $this->view->data_set = $resultset->fetch_assoc();
            $this->view->render('view_createpassword');

        } else {
            $this->view->success = 0;
            $this->view->render('view_createpassword');
        }
    }

    //to create new password
    public function createPassword()
    {
        $this->view->render('view_createpassword');
    }



    public function confirmPassword()
    {
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if (isset($_POST['submit'])) {
            if ($newPassword == $confirmPassword) {

                $this->model('register_model');
                $global_url = $_GET['code'];
                $check = $this->model->activeUser($global_url, $newPassword);
                if ($check == 1) {
                    header('Location: http://localhost/web-Experts/public/login/login');
                } else {
                    echo "something error";
                }
            }
        }
    }

    public function register_customer()
    {
        $user_id = $_POST['userid'];
        $namefirst = $_POST['FirstName'];
        $namelast = $_POST['LastName'];
        $email = $_POST['email'];
        $verificationCode = sha1($email);
        $type = 'customer';
        $active = "pending";
        $nic = $_POST['nic'];
        $address = $_POST['address'];
        $shop = $_POST['shopName'];
        $route = $_POST['route'];
        $dob = $_POST['date'];
        $tele = $_POST['tel'];


        $name = $namefirst . " " . $namelast;

        if (isset($_POST['submit'])) {

            $this->model('register_model');
            $this->view->added = $this->model->register_user($user_id, $name, $email, $verificationCode, $type, $active, $nic, $address, $dob, $tele, '', '', $shop, $route);
            if ($this->view->added == 1) {
                $this->send_mail($name, $email, $verificationCode);
                session_start();
                $_SESSION['msg'] = "Employee Added successfully";
                header('Location: http://localhost/web-Experts/public/salesrep/customer_registration?succuss=' . true);
            } else {
                echo $this->view->added;
            }
        }
    }



    //beigin new employee adding process
    public function reg_user()
    {
        $get_data = file_get_contents('php://input');
        $get_data = json_decode($get_data, true);

        $this->model('register_model');

        $data = [];

        if ($get_data['position'] == 'admin') {
            $result = $this->model->reg_admin(
                $get_data['user_id'],
                $get_data['name'],
                $get_data['email'],
                "",
                sha1($get_data['email']),
                "pending",
                "admin",
                $get_data['nic'],
                $get_data['add'],
                $get_data['dob'],
                $get_data['tel'],
                "0",
                "0",
                $get_data['type']
            );

            $data = [$result];
            $mail = $this->send_mail($get_data['name'], $get_data['email'], sha1($get_data['email']));
            array_push($data, $mail);
        } elseif ($get_data['position'] == 'salesrep') {
            $result = $this->model->reg_salesrep(
                $get_data['user_id'],
                $get_data['name'],
                $get_data['email'],
                "",
                sha1($get_data['email']),
                "pending",
                "rep",
                $get_data['nic'],
                $get_data['add'],
                $get_data['dob'],
                $get_data['tel'],
                "0",
                "0",
                $get_data['target']
            );

            $data = [$result];
            $mail = $this->send_mail($get_data['name'], $get_data['email'], sha1($get_data['email']));
            array_push($data, $mail);

        } else {
            $result = $this->model->reg_stockmanager($get_data['user_id'],
            $get_data['name'],
            $get_data['email'],
            "",
            sha1($get_data['email']),
            "pending",
            "stockmanager",
            $get_data['nic'],
            $get_data['add'],
            $get_data['dob'],
            $get_data['tel'],
            "0",
            "0");

            $data = [$result];
            $mail = $this->send_mail($get_data['name'], $get_data['email'], sha1($get_data['email']));
            array_push($data, $mail);
            
            
        }




        echo json_encode($data);
        exit;
    }
}
