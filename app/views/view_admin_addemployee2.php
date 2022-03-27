<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
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
        .add_employee_choose_user_button{
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
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Level : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">NIC : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <button class="add_employee_submit_button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add_employee_salesRep_form">
                <div class="add_employee_inputs">
                    <div class="to_center">
                        <p>Register Sales Rep</p>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Name : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">NIC : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Target : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <button class="add_employee_submit_button">Submit</button>
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
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">NIC : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field">
                        </div>
                        <div class="add_employee_field">
                            <button class="add_employee_submit_button">Submit</button>
                        </div>
                    </div>
                </div>
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
    </div>
</body>

</html>