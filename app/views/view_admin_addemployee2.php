<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      
      
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: "Poppins" , sans-serif;
    color: black;
}

        .add_employee_container {
            position: relative;
            top: 100px;
            z-index: 100;
            right: 450px;
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
            /* border: 4px solid #184A78; */
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            border-radius: 20px;
            display: flex;
            justify-content: center;
        }

        .add_employee_salesRep_form {
            position: absolute;
            width: 800px;
            top: 50px;
            visibility: hidden;
            /* border: 4px solid #184A78; */
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            border-radius: 20px;
            display: flex;
            justify-content: center;
        }

        .add_employee_stockManager_form {
            position: absolute;
            width: 800px;
            top: 50px;
            visibility: hidden;
            /* border: 4px solid #184A78; */
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
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
            font-weight: 600;
        }

        .add_employee_input_field {
            display: block;
            margin-left: 40px;
            margin-top: 15px;
            width: 400px;
            height: 40px;
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
            border-radius: 10px;
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

    .main-container{
        width: 100%;
        height: 500px;
        /* background-color: red; */
        display: flex;
        justify-content: center;
    }

    #user_avail{
        visibility: hidden;
    }

    #valid_birthday{
        visibility: hidden;
        color: red;
    }

    #email_avail{
        visibility: hidden;
        color: red;
    }

    #phone_number{
        visibility: hidden;
        color: red;
    }

    .null_msg{
        width: 100%;
        height: 600px;
        /* position: fixed; */
        /* background-color: red; */
        /* margin-top: -500px; */
        display: flex;
        justify-content: center;
        display: none;

    }

    .error{
        width: 400px;
        height: 300px;
        background-color: #fff;
        margin-top: 200px;
        border: 4px solid black;
    }
    </style>
</head>

<body>
    <div class="main-container">
        <!-- <div class="null_msg">
<div class="error">

</div>
        </div> -->
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
                            <input type="text" class="add_employee_input_field" id="admin_name" placeholder="Name" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field check_user_id" id="admin_user_id" placeholder="User Id" onkeyup="check_avail_userid()" require>
                            <span id="user_avail">User id is not available</span>
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
                            <input type="text" class="add_employee_input_field" placeholder="NIC No" id="admin_nic" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field validate_birthday" id="admin_dob"  onkeyup="check_avail_userid()" require>
                            <span id="valid_birthday">Enter a valid birthday</span>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field mail_check" placeholder="Email" id="admin_email" onkeyup="check_email()" require>
                            <span id="email_avail">email is already exists</span>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Address" id="admin_address" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field phone_num" placeholder="Mobile" id="admin_mobile" onkeyup="phone_number()" require>
                            <span id="phone_number">Phone number length is invalid</span>
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
                            <input type="text" class="add_employee_input_field" placeholder="Name" id="rep_name" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field check_user_id" placeholder="User Id" id="rep_user_id"  onkeyup="check_avail_userid()" require>
                            <span id="user_avail">User id is not available</span>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">NIC : </label>
                            <input type="text" class="add_employee_input_field" placeholder="NIC No" id="rep_nic" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field validate_birthday" id="rep_dob" onchange="birthday_validate()" require>
                            <span id="valid_birthday">Enter a valid birthday</span>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Target(Rs.) : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Target" id="rep_target">
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field  mail_check" placeholder="Email" id="rep_email" onkeyup="check_email()" require>
                            <span id="email_avail">email is already exists</span>
                            
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Address" id="rep_address" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field phone_num" placeholder="Mobile" id="rep_mobile" onkeyup="phone_number()" require>
                            <span id="phone_number">Phone number length is invalid</span>
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
                            <input type="text" class="add_employee_input_field" placeholder="Name" id="stockManager_name" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">User Id : </label>
                            <input type="text" class="add_employee_input_field check_user_id" placeholder="User Id" id="stockManager_user_id"  onkeyup="check_avail_userid()" require>
                            <span id="user_avail">User id is not available</span>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">NIC : </label>
                            <input type="text" class="add_employee_input_field" placeholder="NIC" id="stockManager_nic" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">DOB : </label>
                            <input type="date" class="add_employee_input_field validate_birthday" placeholder="DOB" id="stockManager_dob" onkeyup="check_avail_userid()" require>
                            <span id="valid_birthday">Enter a valid birthday</span>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Email : </label>
                            <input type="email" class="add_employee_input_field  mail_check" placeholder="Email" id="stockManager_email" onkeyup="check_email()" require>
                            <span id="email_avail">email is already exists</span>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Address : </label>
                            <input type="text" class="add_employee_input_field" placeholder="Address" id="stockManager_address" require>
                        </div>
                        <div class="add_employee_field">
                            <label for="" class="add_employee_label">Mobile : </label>
                            <input type="text" class="add_employee_input_field phone_num" placeholder="Mobile" id="stockManager_mobile" onkeyup="phone_number()" require>
                            <span id="phone_number">Phone number length is invalid</span>
                        </div>
                        <div class="add_employee_field">
                            <button class="add_employee_submit_button" id="stockManager_submit_button" onclick="reg_user('stockManager')">Submit</button>
                        </div>
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

                    if(ad_name=="" || ad_user_id==""|| ad_level=="" || ad_nic=="" || ad_email==""||ad_address==""||ad_mobile){

alert("Inputs vields cannot be null")
                        
                    }

                    else{
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
                    }
                  

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


            function check_email(){
            var email_check=document.querySelector('.mail_check');
            var email_avail=document.getElementById('email_avail');

            fetch("http://localhost/web-Experts/public/register/check_email", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(email_check.value),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);
if(data!=0){
email_check.style.border = "thick solid red";
email_avail.style.visibility="visible";
email_avail.style.color="red";

}
      else{
        email_check.style.border = "thick solid green";
        email_avail.innerHTML="email is available";
        email_avail.style.color="green";
      }    
         
        });

        }


        //check userid
        function user_id_check(){

            fetch("http://localhost/web-Experts/public/register/check_email", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);
if(data!=0){
email_check.style.border = "thick solid red";
email_avail.style.visibility="visible";
email_avail.style.color="red";
email_check.style.visibility="visible"

}
      else{
          
        email_check.style.border = "thick solid green";
        email_avail.innerHTML="email is available";
        email_avail.style.color="green";
      }    
         
        });

        }

        function check_avail_userid(){
            var check_user_id=document.querySelector('.check_user_id');
            user_avail=document.getElementById('user_avail');
            fetch("http://localhost/web-Experts/public/register/check_userid", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(check_user_id.value),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);

          if(data!=0){
              check_user_id.style.border = "thick solid red";
user_avail.style.visibility="visible";
user_avail.style.color="red";

}
      else{
        check_user_id.style.border = "thick solid green";
        user_avail.innerHTML="user id is available";
        user_avail.style.color="green";
      }    

         
        });
        }

        function birthday_validate(){
            var valid_birthday=document.getElementById('valid_birthday');
            

            //valid year
            const d = new Date();
            let year = d.getFullYear();
  let valid_year=year-18;
  console.log(valid_year)

  //birthday year
            var validate_birthday=document.querySelector('.validate_birthday');
            var birthday_date=validate_birthday.value;
            var real_date=parseInt(birthday_date.slice(0,4));
            console.log(real_date);
            if(valid_year>real_date){
                console.log("Hello")
                valid_birthday.innerHTML="Your birthday is valid";
                valid_birthday.style.color="green"
            }
            else{
                console.log("Errrrrrr")
                valid_birthday.style.visibility="visible";
                
            }


           
        }

function phone_number(){

var phone_length=document.querySelector('.phone_num').value.length
console.log(phone_length)
if(phone_length!=10){
  document.getElementById('phone_number').style.visibility="visible"
  document.getElementById('phone_number').innerHTML="Phone number length is Invalid"
  document.getElementById('phone_number').style.color="red"
}

else{
    document.getElementById('phone_number').innerHTML=""
    document.getElementById('phone_number').innerHTML="Phone number length is valid"
    document.getElementById('phone_number').style.color="green"
}

}
        </script>
    </div>
</body>

</html>