<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/web-Experts/public/login/index");
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="../../public/styles/view_rep_Home.css">
    <link rel="stylesheet" href="../../public/styles/view_customer_ourproduct.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- button -->
    <link rel="stylesheet" href="../../public/styles/view_button.css">
    <!-- sketch -->
    <link rel="stylesheet" href="../../public/styles/sketch.css">
    <link rel="stylesheet" href="../../public/styles/view_customer_req.css">
    <style>
        
.container{
    z-index: 5000;
}

.pop-up-success{
    margin-top: 100px;
}
      
#submit_request{
    width: 120px;
    margin-left: 50px;
}


    </style>
</head>

<body>

    <div class="sidebar">
        <div class="logo-details">

            <div class="logo_name">Himalee Dairy Product</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
         
            <li>
                <a href="../customer/home">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="../customer/place_order_view">

                    <i class='bx bxs-cart-add'></i>
                    <span class="links_name">Place Order</span>
                </a>
                <span class="tooltip">Place Order</span>
            </li>

            <li>
                <a href="#" onclick="pop_up_report()">
                    <i class='bx bx-line-chart'></i>
                    <span class="links_name">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>
            <li>
                <a href="../customer/our_products">
                    <i class="fas fa-ice-cream"></i>
                    <span class="links_name">Our Products</span>
                </a>
                <span class="tooltip">Our Products</span>
            </li>
            <li>
                <a href="../customer/view_notification">
                    <i class='bx bx-bell'></i>
                    <span class="links_name">Notification</span>
                </a>
                <span class="tooltip">Notification</span>
            </li>
            <li>
                <a href="../customer/profile">
                    <i class="far fa-user-circle"></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <li>
                <a href="../login/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_job">
                        <div class="name"></div>
                        <div class="job">Customer</div>
                    </div>
                </div>
                <i class="fas fa-store" id="log_out"></i>
            </li>
        </ul>
    </div>

    <section class="home-section">
    <div class="header">
      <?php  require 'view_headertype2.php'; ?>
    </div>
    

      
        <div class="container">
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
      <option value="4"> 2 Month</option>
      
      
    </select>

    <label for="">Reason and other notes</label>
    <textarea id="reason" name="subject" placeholder="Write something.." style="height:200px"></textarea>
  <div class="button-req">
    <div class="req_but">
    <button type="submit"  id="submit_request"><a href="#" onclick="submit_form()">Request</a></button>
    </div>
 <br>
   <div class="cancel-bu">
   <button type="submit" id="cancel_req"><a href="../customer/back_cus_home">cancel</a></button>

   </div> 
  </div>
  
  </form>
    </div>
            
    <div class="pop-up-success">
  <?php require 'view_successfull_pop-up.php';?>

</div>

            
        </div>

    
    </section>






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

                
                });




        }

       


        function hide_popup()
{
  pop_up_success.style.visibility='hidden';



}  

        





            


        
            

        
        

        

        

    </script>

    <script src="../../public/java script/side_bar.js"></script>
</body>

</html>