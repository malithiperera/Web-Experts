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
  <link rel="stylesheet" href="../../public/styles/view_rep_cash.css">
  <title>CashPayment</title>
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
        <a href="../salesRep/customer_registration">
          <i class='fas fa-user-plus fa-lg'></i>
          <span class="links_name">Customer Registration</span>
        </a>
        <span class="tooltip">Customer Registration</span>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-user open-button' onclick="openForm()"></i>
          <span class="links_name ">Customer Profile</span>
        </a>
        <!-- <span class="tooltip">Customer Profile</span> -->
        <div class="form-popup" id="myForm">
          <div class="form-container">

            <label for="cus_id"><b>Enter Customer ID</b></label>
            <input type="text" placeholder="Enter ID" id="searchCus_cusId" required>

            <button class="btn" onclick="searchRep()">Search</button>
            <button class="btn cancel" onclick="closeForm()">Close</button>
          </div>
        </div>
      </li>

      <li>
        <!-- <a href="../orders/create_bill"> -->
        <a href="../customer/place_order_view">
          <i class='bx bxs-cart-add'></i>
          <span class="links_name">Place Order</span>
        </a>
        <span class="tooltip">Place Order</span>
      </li>

      <!-- <li>
        <a href="../salesRep/product_list">
          <i class="fas fa-clipboard-list"></i>
          <span class="links_name">Product List</span>
        </a>
        <span class="tooltip">Product List</span>
      </li> -->

      <li>
        <a href="../salesRep/view_report">
          <i class='bx bx-line-chart'></i>
          <span class="links_name">Reports</span>
        </a>
        <span class="tooltip">Reports</span>
      </li>
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
        <a href="../salesRep/profile">
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

<div class="header">
        <?php
        require 'view_headertype2.php';
        ?>

    </div>

  <div class="container">
    <div class="sub-container">
      <div class="title1">Cash Payment</div>

      <form class="new" method="post" action="add_cashPayment">
        <div class="input-fields"><label for="order">Order ID</label>
          <div class="radio">
            <select id="orders" name="orderId" onchange="selectOrder()">
              <?php
        if($this->result->num_rows>0){
          while($row=$this->result->fetch_assoc()){
            echo  "<option value='".$row['order_id']."'>".$row['order_id']."</option>";
          };
        }
      ?>
            </select>
          </div>
        </div>
        <div class="input-fields"><label for="total">Total Amount</label><input type="text" name="total" id="total"
            class="inputf">

        </div>
        <div class="input-fields"><label for="date">Date</label><input type="date" name="date" id="date" class="inputf">
        </div>
        <div class="input-fields"><input type="submit" value="Confirm" id="confirm"></div>
      </form>
    </div>
    
  </div>
  <div class="r1"><input type="submit" value="Back" id="back" onclick="window.location.href='../salesRep/customer_home';"></div>


  <script>
document.getElementById("confirm").addEventListener("click", function() {
  alert("Payment Succesfull!");
});
</script>

  <script>
    function selectOrder() {
      var x = document.getElementById("orders").value;
      // document.getElementById("total").value=x;
      let dataSet = {
        order_id: x
      };
      const getData = async dataSet => {
        let res = await fetch('http://localhost/web-Experts/public/salesRep/amount', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(dataSet)
        });
        if (res.status !== 200) // http status code 200 means success
          throw new Error("Fetching process failed");
        let data = await res.json();
        return data;

      }
      getData(dataSet).then(data => {
        data.forEach(myFunction);

        function myFunction(item) {
          document.getElementById("total").value = item['amount'];
          // console.log(item['amount']);
        }
      })
    }
  </script>

</body>

</html>