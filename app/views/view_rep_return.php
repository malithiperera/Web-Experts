< !DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Returns</title>
        <link rel="stylesheet" href="../../public/styles/view_rep_return.css">
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

        < !-- <?php require 'view_headerType2.php';?>-->
            <div class="table-wrapper">
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product1</td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                        </tr>
                        <tr>
                            <td>Product2</td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                        </tr>
                        <tr>
                            <td>Product3</td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                        </tr>
                        <tr>
                            <td>Product4</td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                        </tr>
                        <tr>
                            <td>Product5</td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                        </tr>
                        <tr>
                            <td>Product6</td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                        </tr>
                        <tr>
                            <td>Product7</td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                        </tr>
                        <tr>
                            <td>Product8</td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                        </tr>
                        <tr>
                            <td>Product9</td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                        </tr>
                        <tr>
                            <td>Product10</td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                        </tr>
                        <tr>
                            <td>Product11</td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                        </tr>
                        <tr>
                            <td>Product12</td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                        </tr>
                        <tr>
                            <td>Product13</td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                            <td><input type="text" name="total" id="total" class="inputf"></td>
                        </tr>
                        <tr>
                            <td>Product14</td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                            <td><input type="text" name="total" id="total" class="inputf1"></td>
                        </tr>
                    <tbody>
                </table>
            </div>
            <div class="submit"><input type="submit" value="Submit" id="submit"></div>
    </body>

    </html>