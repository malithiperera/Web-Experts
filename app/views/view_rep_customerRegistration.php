<?php
session_start();
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
    <!-- <link rel="stylesheet" href="CusReg.css"> -->
    <link rel="stylesheet" href="../../public/styles/view_customer_registration.css">
    
    
    <title>CustomerRegistration</title>


</head>

<body>
    <div class="header">
        <?php
        require 'view_headertype2.php';
        ?>

    </div>
    
    <div class="container">
    
        <div class="sub-container">
        
            <form action="../register/register_customer" method="post">
                <div class="title1">Customer Registration</div>
                <div class="input-fields">
                    <div class="name">
                        <div class="n1"><label for="FirstName">First Name</label><input type="text" name="FirstName"
                                id="FirstName" class="f">
                        </div>
                        <div class="n2"><label for="LastName">Last Name</label><input type="text" name="LastName"
                                id="LastName" class="l">
                        </div>
                    </div>
                </div>
                <div class="input-fields"><label for="email">Email</label><input type="email" name="email" id="email"
                        class="inputf">
                </div>
                <div class="input-fields"><label for="email">User Id</label><input type="text" name="userid" id="email"
                        class="inputf">
                </div>
                <div class="input-fields"><label for="date">Date of Birth</label><input type="date" name="date"
                        id="date" class="inputf">
                </div>
                <div class="input-fields"><label for="address">Address</label><input type="text" name="address"
                        id="address" class="inputf">
                </div>
                <div class="input-fields"><label for="shopName">Shop Name</label><input type="text" name="shopName"
                        id="shopName" class="inputf">
                </div>
                <div class="input-fields"><label for="shopName">NIC</label><input type="text" name="nic"
                        id="nic" class="inputf">
                </div>
                <div class="input-fields"><label for="shopName">Tel</label><input type="text" name="tel"
                        id="tel" class="inputf">
                </div>
                <div class="input-fields"><label for="route">Route</label>
                <select id="route" name="route" onchange="selectOrder()">
                <?php
                        if($this->result->num_rows>0){
                                while($row=$this->result->fetch_assoc()){
                                echo  "<option value='".$row['route_id']."'>".$row['route_name']."</option>";
                                };
                         }
                 ?>
                 </select>
                </div>


                <div class="popup" onclick="myFunction()"><input type="submit" value="Confirm" id="confirm" name="submit" onsubmit="validate()">
                
        </div>
        </div>
        </form>
        
</div>
    </div>
  
    <div><input type="submit" value="Back" id="back" onclick="window.location.href='../salesRep/home';"></div>
    <?php

  $check = 0;

  if (isset($this->added)) {
    $check = $this->added;
  } ?>

  <script src="../../public/java script/view_admin_addemployee.js"></script>


  <script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

  <script>
    let pop_up_div = document.querySelector('.pop-up-div');
    let container = document.querySelector('.container');
    // let button_pop = document.querySelector('.button-pop');

    var check = '<?php echo $check; ?>';
    console.log(check);
    if (check == 1) {
      pop_up_div.innerHTML = `<?php require 'view_successfull_pop-up.php'; ?>`;
      pop_up_div.style.visibility = "visible";
      container.style.opacity = "20%";

    } else if (check == 2) {
      pop_up_div.innerHTML = `<?php require 'view_error_popup.php'; ?>`;
      pop_up_div.style.visibility = "visible";
      container.style.opacity = "20%";
    }

    function hide_popup() {
      pop_up_div.style.visibility = "hidden";
      container.style.opacity = "100%";
    }

    check = 0;
  </script>
    
</body>

</html>