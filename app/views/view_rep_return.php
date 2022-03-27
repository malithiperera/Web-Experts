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
        <title>Returns</title>
        <link rel="stylesheet" href="../../public/styles/view_rep_return.css">
        <link rel="stylesheet" href="../../public/styles/view_rep_Home.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>

    <body>

        <!-- START SIDE BAR -->

  <div class="sidebar">

<div class="logo-details">

  <div class="logo_name">Himalee Dairy Products</div>
  <i class='bx bx-menu' id="btn"></i>
</div>

<ul class="nav-list">
<li>
        <a href="../salesRep/home">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
  <li>
    <a href="../salesRep/customer_registration">
      <i class='fas fa-user-plus fa-lg'></i>
      <span class="links_name">Customer Registration</span>
    </a>
    <span class="tooltip">Customer Registration</span>
  </li>
  <li>
    <a href="../salesRep/customer_home">
    <i class='bx bx-money'></i>
      <span class="links_name">Payments</span>
    </a>
    <span class="tooltip">Payments</span>
   </li>
  <!-- <li>
    <a href="#">
      <i class='bx bx-user open-button' onclick="openForm()"></i>
      <span class="links_name ">Customer Profile</span>
    </a> -->
    <!-- <span class="tooltip">Customer Profile</span> -->
    <!-- <div class="form-popup" id="myForm">
      <div class="form-container">

        <label for="cus_id"><b>Enter Customer ID</b></label>
        <input type="text" placeholder="Enter ID" id="searchCus_cusId" required>

        <button class="btn" onclick="searchRep()">Search</button>
        <button class="btn cancel" onclick="closeForm()">Close</button>
      </div>
    </div>
  </li> -->

  <li>
    <!-- <a href="../orders/create_bill"> -->
    <a href="../salesRep/offline_placeOrder">
      <i class='bx bxs-cart-add'></i>
      <span class="links_name">Place Order</span>
    </a>
    <span class="tooltip">Place Order</span>
  </li>

  <li>
    <a href="../salesRep/returns">
      <i class="fas fa-exchange-alt"></i>
      <span class="links_name">Returns</span>
    </a>
    <span class="tooltip">Returns</span>
  </li>

  <!-- <li>
    <a href="../salesRep/view_report">
      <i class='bx bx-line-chart'></i>
      <span class="links_name">Reports</span>
    </a>
    <span class="tooltip">Reports</span>
  </li> --> 

  <li>
    <a href="../salesRep/view_notifications">
      <i class='bx bx-bell'></i>
      <span class="links_name">Notifications</span>
    </a>
    <span class="tooltip">Notifications</span>
  </li>

  <li>
    <a href="../salesRep/achievements">

      <i class="fas fa-trophy"></i>
      <span class="links_name">Achievements</span>
    </a>
    <span class="tooltip">Achievements</span>
  </li>

  <li>
    <a href="../  customer/profile">
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
        <div class="name">ABC</div>
        <div class="job">Sales Rep</div>
      </div>
    </div>
    <i class="fas fa-store" id="log_out"></i>
  </li>

</ul>

</div>

<!-- END SIDE BAR -->

    <section class="home-section">
        <div class="header">
            <?php require 'view_headertype2.php'; ?>
        </div>
            <h2> RETURNS</h2>
          <div class="Customer">Enter Customer ID:<input type="text" id="cus_id"></div>

            <div class="table-wrapper">

            
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody class="content">

                    <tbody>
                </table>
            </div>
            <div class="submit"><input type="submit" value="Submit" id="submit" onclick="returns()"></div>

    <script>

      function get_products(){
        var content=document.querySelector('.content');
        fetch('http://localhost/web-Experts/public/salesRep/return_product') 
                .then(response => response.json())
                .then(data => {

                    for (i = 0; i < data.length; i++) {
                        content.innerHTML += `
                    
                            <tr>
                            <td>${data[i]['product_id']}</td>
                            <td>${data[i]['product_name']}</td>
                            <td><input type="text" id="input-field"></td>
                            <td><input type="text" id="input-field"></td>
                            </tr>

                            `;
                    }

                    // console.log(data);
                });
      }
      get_products()

    </script>
      

    <script>

      function returns(){
        var table_info=document.querySelector('.fl-table');
        var customer_id=document.querySelector('.cus_id');
        

        // console.log(table_info.rows.length);
        // console.log("hello orders")
        var table_data = new Array(table_info.rows.length - 1);
    
    if (table_info.rows.length != 2) {
        for (i = 1; i < table_info.rows.length - 1; i++) {
            let table_cell = table_info.rows.item(i).cells;
            table_data[i - 1] = new Array(table_cell.length);
            for (j = 0; j < table_cell.length; j++) {
                if(j==3 || j==2){
                    
                table_data[i - 1][j]=table_cell.item(j).children[0].value;
                }

                else{
                    table_data[i - 1][j] = table_cell.item(j).innerHTML;
                }
               
                console.log(table_data[i - 1][j])
               
            }

        }
        console.log(table_data);
        
        var customer = cus_id.value;
        var table= table_data;
        var rep = "<?php echo $_SESSION['userid']?>";

        var data_set={

          cus_id: customer,
          rep_id: rep,
          table: table_data

        };

        console.log(data_set);

        fetch('http://localhost/web-Experts/public/salesRep/fillReturns', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data_set)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
           
        });



    }



      }
      returns();

    </script>

    </body>

    </html>