<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:http://localhost/web-Experts/public/login/index");
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Home </title>
  <link rel="stylesheet" href="../../public/styles/view_all_notification.css">

  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="../../public/styles/print.css" type="text/css" media="print" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <style>
    #unread_label {
      margin-left: 10px;
    }
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    td {
      text-align: center;
    
    }
   .sub-head{
     font-weight: 800;
   }

   .table-u{
     width: 900px;
     height: 800;
     background-color: red;
   }

   #but_confirm{
     width: 20%;
     height: 50px;
     background-color: green;
     outline: none;
     border: none;
     border-radius: 10px;
     color: #fff;
   }
   .print{
     width: 20%;
     /* height: 30px; */
     background-color: darkblue;
     color: #fff;
     font-size: 20px;
     padding: 10px;
   }

   .pop-up{
     width: 85%;
     display: flex;
     justify-content: center;
     height: 800px;
     background-color: transparent;
     top: 10px;
     position: fixed;
     z-index: 1000;
     visibility: hidden;
   }

   .success{
     width: 600px;
     background-color: #fff;
     height: 300px;
     margin-top: 300px;
     display: flex;
     justify-content: center;
     flex-direction: column;
     padding: 40px;
     border-radius: 5px;
     border:2px solid darkblue;
   }
   .success button{
     width: 100px;
     align-items: center;
     background-color: darkblue;
     color: #fff;
     padding: 10px;
     border-radius: 5px;
     border:none;
     outline: none;
   }
   .success h3{
     text-align: center;
   }
   .button-div{
     width: 100%;
     display: flex;
     justify-content: center;
     margin: 10px;
   }
   #deli_id{
     text-align: center;
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
        <a href="#" onclick="my_notification.load_notification('%')">
          <i class="far fa-envelope lg-3x"></i>
          <span class="links_name">All</span>
        </a>
        <span class="tooltip">All</span>
      </li>
      <li>
        <a href="#" onclick="my_notification.load_notification(1)">
          <i class="fas fa-cart-plus lg-3x"></i>
          <span class="links_name">New Products</span>
        </a>
        <span class="tooltip">New Products</span>
      </li>
      <li>
        <a href="#" onclick="my_notification.load_notification(17)">
        <i class="fas fa-tags"></i>
          <span class="links_name">New Prices</span>
        </a>
        <span class="tooltip">New Prices</span>
      </li>

      <li>
        <a href="#" onclick="my_notification.load_notification(10)">
          <i class="fas fa-truck-loading lg-3x"></i>
          <span class="links_name">Deliveries</span>
        </a>
        <span class="tooltip">Deliveries</span>
      </li>
      <li>
        <a href="#" onclick="my_notification.load_notification(18)">
        <i class="fas fa-percentage"></i>
          <span class="links_name">Discounts</span>
        </a>
        <span class="tooltip">Discounts</span>
      </li>

      <li>
        <a href="#" onclick="my_notification.load_notification(5)">
        <i class="fas fa-money-check-alt"></i>
          <span class="links_name">Cheque Returns</span>
        </a>
        <span class="tooltip">Cheque Returns</span>
      </li>
      <li>
        <a href="#" onclick="my_notification.load_notification(6)">
        <i class="fas fa-not-equal lg-3x"></i>
          <span class="links_name">Credit Periods</span>
        </a>
        <span class="tooltip">Credit Periods</span>
      </li>

      <li class="profile">
        <div class="profile-details">
          <img src="profile.jpg" alt="profileImg">
          <div class="name_job">
            <div class="name"><?php echo $_SESSION['username']; ?></div>
            <div class="job">Customer</div>
          </div>
        </div>
        <i class="fas fa-store" id="log_out"></i>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <div class="all_notifications">
      <button onclick="back()">back button here</button>
      <h1>NOTIFICATIONS</h1>
      <div class="filter">
        <label for="unread" id="unread_label">Unread</label>
        <input type="checkbox" id="unread">

      </div>
      <div class="container">

        <div class="subcontainer2">



        </div>

        <div class="view_more">
          <a href="#">view more</a>
        </div>
      </div>
    </div>

    <div class="select_one" style="display: none;">
      <?php require_once 'view_all_notification_view.php'; ?>
    </div>

    <div class="pop-up">
<div class="success">
  <h3>Order Confirm successfully</h3>
  <h3>Your Deliver ID</h3>
  <h4 id="deli_id"></h4>
  <div class="button-div">
  <button id="button_ok" onclick="close_window()">Okay</button>
  </div>
 
</div>
    </div>

  </section>







  <script src="../../public/java script/side_bar.js"></script>
  <script src="../../public/java script/view_all_notification.js"></script>
  <script defer>
    this.all_notifications = document.querySelector('.all_notifications');
    this.select_one = document.querySelector('.select_one');
    this.subcontainer2 = document.querySelector('.subcontainer2');

    let user_id = '<?php echo $_SESSION['userid'] ?>';
    let type = '<?php echo $_SESSION['type'] ?>';

    let my_notification = new notification(user_id, type);
    my_notification.load_notification('%');

    //when click a notification , then render the message
    subcontainer2.addEventListener("click", (event) => {

      let temp_type;
      my_notification.load_page(event.target.id)
        .then(data => {
          console.log(data);
          temp_type = data['notification_type'];
          if (temp_type == 17) {
            my_notification.discount_addition(data['product_id']);
            console.log('discount');
          } else if(temp_type == 18){
            my_notification.price_change(data['product_id']);
          }
          else if (temp_type == 82) {
            my_notification.cheque_status(data['payment_id'],82);
         
          } else if (temp_type == 81) {
            my_notification.cheque_status(data['payment_id'],81);
            
          }
          else if(temp_type == 10){
            my_notification.confirm_delivery_cus(data['order_id']);
          }
          else if(temp_type == 13){
            my_notification.credit_request_cus(data['to_whom'],13,data['req_id']);
          }
          else if(temp_type==14){
            my_notification.credit_request_cus(data['to_whom'],14,data['req_id']);
          }
          else if(temp_type==1){
            my_notification. product_addition(data['product_id']);
          }
          else if(temp_type==3){
            my_notification. create_bill(data['order_id'],data['delivery_id']);
          }
        });
      all_notifications.style.display = "none";
      select_one.style.display = "block";
    });

var del_id=document.getElementById('deli_id');
var pop_up=document.querySelector('.pop-up');


    window.onclick = function(event) {

if(event.target.className=='but_confirm'){
  var orderID=document.querySelector('.but_confirm').value;
  console.log(orderID);
  fetch('http://localhost/web-Experts/public/notification/inform_delivery', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(orderID)
        })
        .then(response => response.json())
        .then(data => {
          
 console.log(data);
 pop_up.style.visibility="visible";
 del_id.innerHTML=data;
        
           
        });


}
    }

    function close_window(){
      pop_up.style.visibility="hidden";
    }
  </script>

  <script>
    function back(){
      window.history.back();
    }
  </script>
</body>

</html>