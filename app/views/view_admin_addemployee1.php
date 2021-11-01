<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/web-Experts/public/login/index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../../public/styles/view_admin_addemployee.css">

<style>
    .loading {
        position: fixed;
        top: 400px;
        width: 100%;
        display: flex;
        justify-content: center;
        visibility: hidden;
    }

    .loading_message p {
        color: black;
        font-size: 30px;
    }

    .main {
        /* opacity: 20%; */
    }
</style>


<body>
    <div class="header">
        <?php
        require 'view_headertype2.php';
        ?>
    </div>
    <div class="main">
        <div class="success " id="success">


        </div>
        <div class="choose">


            <div class="btn-group">
                <button id="admin">Admin</button>
                <button id="rep">Sales Rep</button>
                <button id="cus">Stock Manager</button>
            </div>
        </div>
        <div class="container">
            <span id=msg></span>
            <div class="div1" id="div1">
                <h3>Admin Registration</h3>
                <div>
                    <div class="content">

                        <label for="name"><b>Name</b></label><br>
                        <input type="text" placeholder="Name" name="name" id="admin_name" required>
                        <br>
                        <label for="name"><b>User Id&nbsp;&nbsp;&nbsp;</b></label><br>
                        <input type="text" placeholder="Name" name="userid" id="admin_userid" required>
                        <br>
                        <label for="name"><b>Level</b></label><br>
                        <select name="level" id="admin_type">
                            <option value="Junior">Junior</option>
                            <option value="Senior">Senior</option>
                        </select>
                        <br>
                        <label for="name"><b>NIC NO&nbsp;&nbsp; </b></label><br>
                        <input type="text" placeholder="nic" name="nic" id="admin_nic" required>
                        <br>
                        <label for="name"><b>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </label><br>
                        <input type="date" placeholder="dob" name="dob" id="admin_dob" required>
                        <br>
                        <label for="email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label><br>
                        <input type="text" placeholder="Enter Email" name="email" id="admin_email" required>
                        <br>
                        <label for="psw"><b>Address&nbsp;</b></label><br>
                        <input type="address" placeholder="address" name="add" id="admin_add" required>
                        <br>
                        <label for="psw-repeat"><b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;</b></label><br>
                        <input type="tel" placeholder="Telephone" name="tel" id="admin_tel" required>


                        <button type="submit" class="registerbtn" id="validate" name="submit" onsubmit="validate()" onclick="reg_user('admin')">Register</button>
                    </div>


                </div>

            </div>
            <div class="div2" id="div2">
                <h3>Sales Representative Registration</h3>
                <div>
                    <div class="content">

                        <label for="name"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Name" name="name" id="salesrep_namesalesrep_name" required>
                        <br>
                        <label for="name"><b>User Id&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Name" name="userid" id="salesrep_useridsalesrep_userid" required>
                        <br>
                        <label for="name"><b>NIC NO&nbsp;&nbsp; </b></label>
                        <input type="text" placeholder="nic" name="nic" id="salesrep_nicsalesrep_nic" required>
                        <br>
                        <label for="name"><b>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </label>
                        <input type="date" placeholder="dob" name="dob" id="salesrep_dobsalesrep_dob" required>
                        <br>
                        <label for="name"><b>Target&nbsp;&nbsp; </b></label>
                        <input type="text" placeholder="Traget" name="target" id="salesrep_targetsalesrep_target" required>
                        <br>
                        <label for="email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="salesrep_emailsalesrep_email" required>
                        <br>
                        <label for="psw"><b>Address&nbsp;</b></label>
                        <input type="address" placeholder="address" name="add" id="salesrep_addsalesrep_add" required>
                        <br>
                        <label for="psw-repeat"><b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="tel" placeholder="Telephone" name="tel" id="salesrep_telsalesrep_tel" required>



                        <button type="submit" name="submit" class="registerbtn" id="validate" onclick="reg_user('salesrep')">Register</button>
                    </div>


                </div>

            </div>
            <div class="div3" id="div3">
                <h3>Stock Manager Registration</h3>
                <div>
                    <div class="content">

                        <label for="name"><b>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Name" name="name" id="stockmanager_name" required>
                        <br>
                        <label for="name"><b>User Id&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Name" name="userid" id="stockmanager_userid" required>
                        <br>
                        <label for="name"><b>NIC NO&nbsp;&nbsp; </b></label>
                        <input type="text" placeholder="nic" name="nic" id="stockmanager_nic" required>
                        <br>

                        <label for="name"><b>DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </label>
                        <input type="date" placeholder="dob" name="dob" id="stockmanager_dob" required>
                        <br>
                        <label for="email"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="stockmanager_email" required>
                        <br>
                        <label for="psw"><b>Address&nbsp;</b></label>
                        <input type="address" placeholder="address" name="add" id="stockmanager_add" required>
                        <br>
                        <label for="psw-repeat"><b>Mobile&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <input type="tel" placeholder="Telephone" name="tel" id="stockmanager_tel" required>
                        <label for="name" id="hid1"><b>&nbsp;&nbsp; </b></label>
                        <input style="background-color:white;" type="text" name="target" id="stockmanager_hid2" required>
                        <br>

                        <button type="submit" name="submit" class="registerbtn" id="validate" onclick="reg_user('stockmanager')">Register</button>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <div class="message">

        <div class="pop-up-div">



        </div>
    </div>
    <div class="loading">
        <div class="loading_message">
            <p>Loading...</p>
        </div>
    </div>
    <?php

    $check = 0;

    if (isset($this->added)) {
        $check = $this->added;
    } ?>

    <script src="../../public/java script/view_admin_addemployee.js"></script>

    <script>
        // let pop_up_div = document.querySelector('.pop-up-div');
        // let container = document.querySelector('.container');
        // // let button_pop = document.querySelector('.button-pop');


        // console.log(check);
        // if (check == 1) {
        //     pop_up_div.innerHTML = `<?php require 'view_successfull_pop-up.php'; ?>`;
        //     pop_up_div.style.visibility = "visible";
        //     container.style.opacity = "20%";

        // } else if (check == 2) {
        //     pop_up_div.innerHTML = `<?php require 'view_error_popup.php'; ?>`;
        //     pop_up_div.style.visibility = "visible";
        //     container.style.opacity = "20%";
        // }

        // function hide_popup() {
        //     pop_up_div.style.visibility = "hidden";
        //     container.style.opacity = "100%";
        // }
    </script>


    <script>
        let pop_up_div = document.querySelector('.pop-up-div');
        let container = document.querySelector('.container');

        let main = document.querySelector('.main');
        let loading = document.querySelector('.loading');

        //admin
        admin_name = document.getElementById('admin_name');
        admin_userid = document.getElementById('admin_userid');
        admin_type = document.getElementById('admin_type');
        admin_nic = document.getElementById('admin_nic');
        admin_dob = document.getElementById('admin_dob');
        admin_email = document.getElementById('admin_email');
        admin_add = document.getElementById('admin_add');
        admin_tel = document.getElementById('admin_tel');

        //salesrep
        salesrep_namesalesrep_name = document.getElementById('salesrep_namesalesrep_name');
        salesrep_useridsalesrep_userid = document.getElementById('salesrep_useridsalesrep_userid');
        salesrep_nicsalesrep_nic = document.getElementById('salesrep_nicsalesrep_nic');
        salesrep_dobsalesrep_dob = document.getElementById('salesrep_dobsalesrep_dob');
        salesrep_targetsalesrep_target = document.getElementById('salesrep_targetsalesrep_target');
        salesrep_emailsalesrep_email = document.getElementById('salesrep_emailsalesrep_email');
        salesrep_addsalesrep_add = document.getElementById('salesrep_addsalesrep_add');
        salesrep_telsalesrep_tel = document.getElementById('salesrep_telsalesrep_tel');

        //stockmanager
        stockmanager_name = document.getElementById('stockmanager_name');
        stockmanager_userid = document.getElementById('stockmanager_userid');
        stockmanager_nic = document.getElementById('stockmanager_nic');
        stockmanager_dob = document.getElementById('stockmanager_dob');
        stockmanager_email = document.getElementById('stockmanager_email');
        stockmanager_add = document.getElementById('stockmanager_add');
        stockmanager_tel = document.getElementById('stockmanager_tel');

        const reg_user = (user) => {

            main.style.opacity = "20%";
            loading.style.visibility = "visible";

            admin_data_set = {
                position: 'admin',
                name: admin_name.value,
                user_id: admin_userid.value,
                type: admin_type.value,
                nic: admin_nic.value,
                dob: admin_dob.value,
                email: admin_email.value,
                add: admin_add.value,
                tel: admin_tel.value
            }


            salesrep_data_set = {
                position: 'salesrep',
                name: salesrep_namesalesrep_name.value,
                user_id: salesrep_useridsalesrep_userid.value,
                nic: salesrep_nicsalesrep_nic.value,
                dob: salesrep_dobsalesrep_dob.value,
                target: salesrep_targetsalesrep_target.value,
                email: salesrep_emailsalesrep_email.value,
                add: salesrep_addsalesrep_add.value,
                tel: salesrep_telsalesrep_tel.value
            }


            stockmanager_data_set = {
                position: 'stockmanager',
                name: stockmanager_name.value,
                user_id: stockmanager_userid.value,
                nic: stockmanager_nic.value,
                dob: stockmanager_dob.value,
                email: stockmanager_email.value,
                add: stockmanager_add.value,
                tel: stockmanager_tel.value
            }

            if (user == 'admin') {
                data_set = admin_data_set;
            } else if (user == 'salesrep') {
                data_set = salesrep_data_set;
            } else {
                data_set = stockmanager_data_set;
            }

            fetch('http://localhost/web-Experts/public/register/reg_user', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {

                    main.style.opacity = "100%";
                    loading.style.visibility = "hidden";

                    if (data[0] == true && data[1] == "succuss") {
                        pop_up_div.innerHTML = `<?php require 'view_successfull_pop-up.php'; ?>`;
                        pop_up_div.style.visibility = "visible";
                        container.style.opacity = "20%";

                    } else {
                        pop_up_div.innerHTML = `<?php require 'view_error_popup.php'; ?>`;
                        pop_up_div.style.visibility = "visible";
                        container.style.opacity = "20%";
                    }

                    console.log(data);
                });
        }

        function hide_popup() {
            pop_up_div.style.visibility = "hidden";
            container.style.opacity = "100%";
            //admin
            admin_name.value = "";
            admin_userid.value = "";
            admin_type.value = "";
            admin_nic.value = "";
            admin_dob.value = "";
            admin_email.value = "";
            admin_add.value = "";
            admin_tel.value = "";

            //salesrep
            salesrep_namesalesrep_name.value = "";
            salesrep_useridsalesrep_userid.value = "";
            salesrep_nicsalesrep_nic.value = "";
            salesrep_dobsalesrep_dob.value = "";
            salesrep_targetsalesrep_target.value = "";
            salesrep_emailsalesrep_email.value = "";
            salesrep_addsalesrep_add.value = "";
            salesrep_telsalesrep_tel.value = "";

            //stockmanager
            stockmanager_name.value = "";
            stockmanager_userid.value = "";
            stockmanager_nic.value = "";
            stockmanager_dob.value = "";
            stockmanager_email.value = "";
            stockmanager_add.value = "";
            stockmanager_tel.value = "";

        }
    </script>


</body>

</html>