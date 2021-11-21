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
        <a href="#">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="../orders/create_bill">

          <i class="fas fa-truck"></i>
          <span class="links_name">Confirmations</span>
        </a>
        <span class="tooltip">Confirmations</span>
      </li>
      <li>
        <a href="../customer/my_order">
          <i class="fas fa-file-invoice"></i>
          <span class="links_name">Bills</span>
        </a>
        <span class="tooltip">Bills</span>
      </li>
      <li>
        <a href="../customer/view_report">
          <i class="fas fa-percentage"></i>
          <span class="links_name">Discounts</span>
        </a>
        <span class="tooltip">Discounts</span>
      </li>
      <li>
        <a href="../customer/our_products">
          <i class="fas fa-envelope-open-text"></i>
          <span class="links_name">Others</span>
        </a>
        <span class="tooltip">Others</span>
      </li>

      <li>
        <a href="../customer/profile">
          <i class="far fa-user-circle"></i>
          <span class="links_name">Profile</span>
        </a>
        <span class="tooltip">Profile</span>
      </li>
      <li>
        <a href="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="links_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
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
    <h1>NOTIFICATIONS</h1>
    <div class="container">

      <div class="subcontainer2">



      </div>

      <div class="view_more">
        <a href="#">view more</a>
      </div>
    </div>

  </section>


  <script src="../../public/java script/view_customer_Home.js"></script>

  <script>
    var to_whom = '<?php echo $_SESSION['type']; ?>';
    var user_id = '<?php echo $_SESSION['userid']; ?>';

    subcontainer2 = document.querySelector('.subcontainer2');

    const dataset = {
      to_whom: to_whom,
      user_id: user_id
    }

    // console.log(dataset);

    const load_notification = () => {
      fetch('http://localhost/web-Experts/public/notification/load_notification', {
          method: 'POST',

          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(dataset)
        })
        .then(response => response.json())
        .then(data => {

          for (i = 0; i < data.length; i++) {
            subcontainer2.innerHTML += `
            
            <div class='notification' id='${data[i]['notification_id']}'>

                <div class='from' id='${data[i]['notification_id']}'>
                  ${data[i]['to_whom']}
                </div>
                <div class='header_notification' id='${data[i]['notification_id']}'>
                  ${data[i]['subject']}
                </div>
                <div class='message_notification' id='${data[i]['notification_id']}'>
                  ${data[i]['message']}
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

    load_notification();

    subcontainer2.addEventListener("click", (event) =>{
      window.location.href = 'http://localhost/web-Experts/public/notification/see_notification/'+event.target.id;
    });
  </script>

</body>

</html>