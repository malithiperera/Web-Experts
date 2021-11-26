<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:http://localhost/web-Experts/public/login/index");
}
?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Home </title>
  <link rel="stylesheet" href="../../public/styles/view_all_notification.css">

  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <style>
    #unread_label{
      margin-left:10px;
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
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="#" onclick="load_notification('%')">
          <i class='bx bx-home'></i>
          <span class="links_name">All</span>
        </a>
        <span class="tooltip">All</span>
      </li>
      <li>
        <a href="#" onclick="load_notification(1)">
          <i class='bx bx-home'></i>
          <span class="links_name">New Products</span>
        </a>
        <span class="tooltip">New Products</span>
      </li>
      <li>
        <a href="#" onclick="load_notification(2)">

          <i class="fas fa-truck"></i>
          <span class="links_name">Orders</span>
        </a>
        <span class="tooltip">Orders</span>
      </li>
      <li>
        <a href="#" onclick="load_notification('3%')">
          <i class="fas fa-file-invoice"></i>
          <span class="links_name">Deliveries</span>
        </a>
        <span class="tooltip">Deliveries</span>
      </li>
      <li>
        <a href="#" onclick="load_notification('4%')">
          <i class="fas fa-percentage"></i>
          <span class="links_name">Stocks</span>
        </a>
        <span class="tooltip">Stocks</span>
      </li>
      <li>
        <a href="#" onclick="load_notification(5)">
          <i class="fas fa-envelope-open-text"></i>
          <span class="links_name">Customer Requests</span>
        </a>
        <span class="tooltip">Customer Requests</span>
      </li>

      <li>
        <a href="#" onclick="load_notification('6%')">
          <i class="far fa-user-circle"></i>
          <span class="links_name">Returns</span>
        </a>
        <span class="tooltip">Returns</span>
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


  </section>


  <script src="../../public/java script/view_customer_Home.js"></script>

  <script>
    var to_whom = '<?php echo $_SESSION['type']; ?>';
    var user_id = '<?php echo $_SESSION['userid']; ?>';

    home_section = document.querySelector('.home-section');
    all_notifications = document.querySelector('.all_notifications');
    select_one = document.querySelector('.select_one');
    notification_subcontainer = document.querySelector('.notification_subcontainer');

    subcontainer2 = document.querySelector('.subcontainer2');

    
    // console.log(dataset);

    const load_notification = (type) => {

      const dataset = {
      to_whom: to_whom,
      user_id: user_id,
      notification_type : type
    }

      subcontainer2.innerHTML = ``;
      all_notifications.style.display = "block";
      select_one.style.display = "none";

      fetch('http://localhost/web-Experts/public/notification/load_notification', {
          method: 'POST',

          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(dataset)
        })
        .then(response => response.json())
        .then(data => {

          let subject = 'subject';
          let message = 'message';

          //choose subject and message according to the notification type

          for (i = 0; i < data.length; i++) {
            subcontainer2.innerHTML += `
            
            <div class='notification' id='${data[i]['notification_id']}'>

                <div class='from' id='${data[i]['notification_id']}'>
                  ${data[i]['to_whom']}
                </div>
                <div class='header_notification' id='${data[i]['notification_id']}'>
                  ${subject}
                </div>
                <div class='message_notification' id='${data[i]['notification_id']}'>
                  ${message}
                </div>
                <div class='delete' id='${data[i]['notification_id']}'>

                  <div class='trash'>
                    <a> <i class='fas fa-trash'></i></a>
                  </div>
                  
                </div>
            </div>

            `;
          }
          console.log(data);
        });
    }

    load_notification('%');
    

    subcontainer2.addEventListener("click", (event) => {
      
      let temp_type;
      load_page(event.target.id)
      
      .then(data => {
        console.log(data);
        temp_type = data['notification_type'];
        if(temp_type == 1){
          console.log('product_addition, product id = '+data['product_id']);
          // notification_subcontainer.innerHTML = `${data['product_id']}`;
          product_addition(data['product_id']);
        }
      });
      all_notifications.style.display = "none";
      select_one.style.display = "block";
    });
  </script>

</body>

</html>