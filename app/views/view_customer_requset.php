<?php session_start();

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

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
.pop-up-success{
  width: 100%;
  height: 600px;
  display: flex;
  justify-content: center;
  /* background-color: red; */
  position: fixed;
  top: 60px;
  visibility: hidden;
}
.request-container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


.form-container{
    width: 60%;
}
        input[type=text], select,textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  color: #184A78;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 20px;
  font-weight: 600;
}

button{
  width: 20%;
  
  background-color: #184A78;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}

a{
  text-decoration: none;
  color:#fff;
  font-size: 20px;
}
input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  /* background-color: #f2f2f2; */
  padding: 20px;
}
h2{
    text-align: center;
}
label{
font-size: 20px;
font-weight: 700;
}
    </style>
</head>
<body>

    <div class="request-container">
    <h2>Request Form</h2>

    <div class="form-container">
    <form action="#">
    <label for="fname">Customer Id</label>
    <input type="text" id="id" name="firstname" value="" readonly>

    <label for="lname">Name</label>
    <input type="text" id="name" name="lastname" value="<?php echo $_SESSION['name'] ;?>" readonly>

    <label for="lname">Shop Name</label>
    <input type="text" id="sname" name="lastname" placeholder="Your name.." readonly>
    <label for="lname">default Credit Period</label>
    <input type="text" id="credit" name="lastname" value="" readonly>

    <label for="country">Request Credit Perod</label>
    <select id="new_pri" name="new_pri">
      <option value="3">3 Weeks</option>
      <option value="4"> 1 Month</option>
      <option value="4"> 1 Month</option>
      
      
    </select>

    <label for="">Reason and other notes</label>
    <textarea id="reason" name="subject" placeholder="Write something.." style="height:200px"></textarea>
  
    <button type="submit" ><a href="#" onclick="submit_form()">Request</a></button>
    <button type="submit"><a href="../customer/back_cus_home">cancel</a></button>
  </form>
    </div>




<div class="pop-up-success">
  <?php require 'view_successfull_pop-up.php';?>

</div>



    </div>



    <script>
      let id=document.getElementById('id');
let credit=document.getElementById('credit');
let sname=document.getElementById('sname');
let msg=document.getElementById('msg');
let pop_up_success=document.querySelector('.pop-up-success');

        function fill_form(){

            fetch('http://localhost/web-Experts/public/customer/creit_request')
        .then(response => response.json())
        .then(data => {
          console.log(data);
          console.log(data['cus_id']);
          id.value=data['cus_id'];
          credit.value=data['credit_time']+' '+'weeks';
          sname.value=data['shop_name'];


          

        });





        }

        fill_form();

        function submit_form(){
          var new_priod=document.getElementById('new_pri');
          var reason=document.getElementById('reason');
          var id=document.getElementById('id');

          var data_set={
            new_period:new_priod.value,
            reason:reason.value,
            id:id.value

          };

          fetch('http://localhost/web-Experts/public/customer/customer_request', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data_set)
                })


                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if(data==1){

                       msg.innerHTML="Request send successfully";
                      pop_up_success.style.visibility='visible';
                      

                    } else{
                      msg.innerHTML="Error With Sending Request";
                      pop_up_success.style.visibility='visible';
                    }

                    // confirmation_message();
                    // order_id.innerHTML = `${data[7]}`;
                    // order_date.innerHTML = `${data[2]}`;
                    // order_amount.innerHTML = `${data[0]}`;
                    // done.addEventListener("click", () => {
                    //     confirm_message.style.visibility = "hidden";
                    // });
                });




        }

        function  fill_data()
        {



          fetch('http://localhost/web-Experts/public/customer/place_order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data_set)
                })


                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    confirmation_message();
                    order_id.innerHTML = `${data[7]}`;
                    order_date.innerHTML = `${data[2]}`;
                    order_amount.innerHTML = `${data[0]}`;
                    done.addEventListener("click", () => {
                        confirm_message.style.visibility = "hidden";
                    });
                });
        }


        function hide_popup()
{
  pop_up_success.style.visibility='hidden';
}    </script>
</body>
</html>