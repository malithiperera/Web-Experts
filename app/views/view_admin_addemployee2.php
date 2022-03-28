<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .add_employee_container {
            position: relative;
        }

        .add_employee_choose_user {
            position: absolute;
            left: 40px;
            width: 800px;
            height: 40px;

            display: flex;
            justify-content: space-evenly;
        }

        .add_employee_choose_user_button {
            width: 200px;
            border: none;
            border-radius: 20px;
            background-color: #abcdef;

        }

        .add_employee_choose_user_button {
            font-size: 18px;
        }

        .add_employee_forms {
            position: absolute;
            left: 40px;
        }

        .add_employee_admin_form {
            position: absolute;
            width: 800px;
            top: 50px;
            visibility: visible;
            border: 4px solid #184A78;
            border-radius: 20px;
            display: flex;
            justify-content: center;
        }

        .add_employee_salesRep_form {
            position: absolute;
            width: 800px;
            top: 50px;
            visibility: hidden;
            border: 4px solid #184A78;
            border-radius: 20px;
            display: flex;
            justify-content: center;
        }

        .add_employee_stockManager_form {
            position: absolute;
            width: 800px;
            top: 50px;
            visibility: hidden;
            border: 4px solid #184A78;
            border-radius: 20px;
            display: flex;
            justify-content: center;
        }

        .add_employee_inputs {
            display: flex;
            flex-direction: column;
        }

        .add_employee_field {
            margin-top: 10px;
        }

        .add_employee_label {
            display: block;
            margin-left: 20px;
            margin-top: 15px;
        }

        .add_employee_input_field {
            display: block;
            margin-left: 40px;
            margin-top: 15px;
            width: 400px;
            height: 30px;
        }

        .select_option {
            width: 100px;
        }

        .add_employee_submit_button {
            margin-top: 20px;
            margin-left: 180px;
            margin-bottom: 20px;
            width: 90px;
            height: 40px;
            border-radius: 20px;
            background-color: #abcdef;
            border: none;
        }

        .to_center p {
            margin-left: 150px;
            font-size: 24px;
        }
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
    </style>
</head>

<body>
    <div class="add_employee_container">
        <div class="add_employee_choose_user">
            <button class="add_employee_choose_user_button" id="add_employee_admin_button" onclick="choose_user('admin')">Admin</button>
            <button class="add_employee_choose_user_button" id="add_employee_salesRep_button" onclick="choose_user('salesRep')">Sales Rep</button>
            <button class="add_employee_choose_user_button" id="add_employee_stockManager_button" onclick="choose_user('stockManager')">Stock Manager</button>
        </div>
        <div class="add_employee_forms">
            <div class="add_employee_admin_form">
                <div class="to_center">
                    <p>Register Admin</p>
                    <div class="add_employee_inputs">
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Name : </label>
                            <input type="text" class="add_employee_input_field" id="admin_name" placeholder="Name">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field" id="admin_user_id" placeholder="User Id">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Level : </label>
                            <select name="" class="add_employee_input_field" id="admin_level">
                                <option value="senior" class="select_option">Senior</option>
                                <option value="junior" class="select_option">Junior</option>
                            </select>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">NIC : </label>
                            <input type="text" class="add_employee_input_field" placeholder="NIC No" id="admin_nic">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field" id="admin_dob">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field" placeholder="Email" id="admin_email">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Address" id="admin_address">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Mobile" id="admin_mobile">
                        </div>
                        <div class="add_employee_field">
                            <button class="add_employee_submit_button" id="admin_submit_button" onclick="reg_user('admin')">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add_employee_salesRep_form">
                <div class="to_center">
                    <p>Register Sales Rep</p>
                    <div class="add_employee_inputs">
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Name : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Name" id="rep_name">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field" placeholder="User Id" id="rep_user_id">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">NIC : </label>
                            <input type="text" class="add_employee_input_field" placeholder="NIC No" id="rep_nic">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field" id="rep_dob">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Target(Rs.) : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Target" id="rep_target">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field" placeholder="Email" id="rep_email">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Address" id="rep_address">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Mobile" id="rep_mobile">
                        </div>
                        <div class="add_employee_field">
                            <button class="add_employee_submit_button" id="rep_submit_button" onclick="reg_user('salesRep')">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add_employee_stockManager_form">
                <div class="to_center">
                    <p>Register Stock Manager</p>
                    <div class="add_employee_inputs">
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Name : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Name" id="stockManager_name">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field" placeholder="User Id" id="stockManager_user_id">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">NIC : </label>
                            <input type="text" class="add_employee_input_field" placeholder="NIC" id="stockManager_nic">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field" placeholder="DOB" id="stockManager_dob">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field" placeholder="Email" id="stockManager_email">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Address" id="stockManager_address">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Mobile" id="stockManager_mobile">
                        </div>
                        <div class="add_employee_field">
                            <button class="add_employee_submit_button" id="stockManager_submit_button" onclick="reg_user('stockManager')">Submit</button>
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

        <script>
            let admin_form = document.querySelector('.add_employee_admin_form');
            let salesRep_form = document.querySelector('.add_employee_salesRep_form');
            let stockManager_form = document.querySelector('.add_employee_stockManager_form');

            function choose_user(user) {
                if (user == "admin") {
                    admin_form.style.visibility = "visible";
                    salesRep_form.style.visibility = "hidden";
                    stockManager_form.style.visibility = "hidden";
                } else if (user == "salesRep") {
                    admin_form.style.visibility = "hidden";
                    salesRep_form.style.visibility = "visible";
                    stockManager_form.style.visibility = "hidden";
                } else {
                    admin_form.style.visibility = "hidden";
                    salesRep_form.style.visibility = "hidden";
                    stockManager_form.style.visibility = "visible";
                }
            }
        </script>

        <script>
            //admin
            let admin_name = document.getElementById('admin_name');
            let admin_user_id = document.getElementById('admin_user_id');
            let admin_level = document.getElementById('admin_level');
            let admin_nic = document.getElementById('admin_nic');
            let admin_dob = document.getElementById('admin_dob');
            let admin_email = document.getElementById('admin_email');
            let admin_address = document.getElementById('admin_address');
            let admin_mobile = document.getElementById('admin_mobile');

            //sales rep
            let rep_name = document.getElementById('rep_name');
            let rep_user_id = document.getElementById('rep_user_id');
            let rep_nic = document.getElementById('rep_nic');
            let rep_dob = document.getElementById('rep_dob');
            let rep_target = document.getElementById('rep_target');
            let rep_email = document.getElementById('rep_email');
            let rep_address = document.getElementById('rep_address');
            let rep_mobile = document.getElementById('rep_mobile');

            //stock manager
            let stockManager_name = document.getElementById('stockManager_name');
            let stockManager_user_id = document.getElementById('stockManager_user_id');
            let stockManager_nic = document.getElementById('stockManager_nic');
            let stockManager_dob = document.getElementById('stockManager_dob');
            let stockManager_email = document.getElementById('stockManager_email');
            let stockManager_address = document.getElementById('stockManager_address');
            let stockManager_mobile = document.getElementById('stockManager_mobile');

            //register user function
            function reg_user(user) {

                // console.log(user);
                let admin_dataset;
                let rep_dataset;
                let sm_dataset;

                if (user == "admin") {

                    let ad_name = admin_name.value;
                    let ad_user_id = admin_user_id.value;
                    let ad_level = admin_level.value;
                    let ad_nic = admin_nic.value;
                    let ad_dob = admin_dob.value;
                    let ad_email = admin_email.value;
                    let ad_address = admin_address.value;
                    let ad_mobile = admin_mobile.value;

                    admin_dataset = {
                        user: "admin",
                        ad_name: ad_name,
                        ad_user_id: ad_user_id,
                        ad_level: ad_level,
                        ad_nic: ad_nic,
                        ad_dob: ad_dob,
                        ad_email: ad_email,
                        ad_address: ad_address,
                        ad_mobile: ad_mobile
                    };

                    // console.log(admin_dataset);

                } else if (user == "salesRep") {

                    let re_name = rep_name.value;
                    let re_user_id = rep_user_id.value;
                    let re_nic = rep_nic.value;
                    let re_dob = rep_dob.value;
                    let re_target = rep_target.value;
                    let re_email = rep_email.value;
                    let re_address = rep_address.value;
                    let re_mobile = rep_mobile.value;

                    rep_dataset = {
                        user: "rep",
                        re_name: re_name,
                        re_user_id: re_user_id,
                        re_nic: re_nic,
                        re_dob: re_dob,
                        re_target: re_target,
                        re_email: re_email,
                        re_address: re_address,
                        re_mobile: re_mobile
                    };

                    // console.log(rep_dataset);

                } else {
                    let sm_name = stockManager_name.value;
                    let sm_user_id = stockManager_user_id.value;
                    let sm_nic = stockManager_nic.value;
                    let sm_dob = stockManager_dob.value;
                    let sm_email = stockManager_email.value;
                    let sm_address = stockManager_address.value;
                    let sm_mobile = stockManager_mobile.value;

                    sm_dataset = {
                        user: "stockManager",
                        sm_name: sm_name,
                        sm_user_id: sm_user_id,
                        sm_nic: sm_nic,
                        sm_dob: sm_dob,
                        sm_email: sm_email,
                        sm_address: sm_address,
                        sm_mobile: sm_mobile
                    };

                    // console.log(sm_dataset);
                }


                let final_data_set;

                if (user == "admin") {
                    final_data_set = admin_dataset;
                } else if (user == "salesRep") {
                    final_data_set = rep_dataset;
                } else {
                    final_data_set = sm_dataset;
                }


                fetch('http://localhost/web-Experts/public/register/reg_user', {
                        method: 'POST', // or 'PUT'
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(final_data_set),
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    });
            }
        </script>
    </div>
</body>

</html>