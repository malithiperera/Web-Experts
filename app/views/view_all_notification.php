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
        <a href="#" onclick="my_notification.load_notification(2)">
          <i class="fas fa-truck-loading lg-3x"></i>
          <span class="links_name">Deliveries</span>
        </a>
        <span class="tooltip">Deliveries</span>
      </li>
      <li>
        <a href="#" onclick="my_notification.load_notification('3%')">
          <i class="fas fa-cubes lg-3x"></i>
          <span class="links_name">Stocks</span>
        </a>
        <span class="tooltip">Stocks</span>
      </li>
      <li>
        <a href="#" onclick="my_notification.load_notification(4)">
          <i class="fas fa-baby lg-3x"></i>
          <span class="links_name">Customer Requests</span>
        </a>
        <span class="tooltip">Customer Requests</span>
      </li>

      <li>
        <a href="#" onclick="my_notification.load_notification(5)">
          <i class="fas fa-undo lg-3x"></i>
          <span class="links_name">Returns</span>
        </a>
        <span class="tooltip">Returns</span>
      </li>
      <li>
        <a href="#" onclick="my_notification.load_notification(6)">
        <i class="fas fa-not-equal lg-3x"></i>
          <span class="links_name">Stock Issues</span>
        </a>
        <span class="tooltip">Stock Issues</span>
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
          if (temp_type == 1) {
            my_notification.product_addition(data['product_id']);
          } else if(temp_type == 2){
            my_notification.confirm_delivery(data['delivery_id']);
          }
          else if (temp_type == 4) {
            my_notification.request_credit_period(data['req_id']);
          } else if (temp_type == 5) {
            my_notification.add_returns(data['return_id']);
          }
        });
      all_notifications.style.display = "none";
      select_one.style.display = "block";
    });
  </script>
</body>

</html>