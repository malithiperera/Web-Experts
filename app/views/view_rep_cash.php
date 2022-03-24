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

  <style>
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  /* cursor: pointer; */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 300px;
  height:250px;
  background-color: green;
  color: white;
  text-align: center;
  border-radius: 6px;
  padding: 20px 50px ;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
  font-size: 35px;
}

/* Popup arrow */
/* .popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
} */

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  /* -webkit-animation: fadeIn 5s;
  animation: fadeIn 5s; */
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>

</head>

<body>

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

        <div class="popup"  onclick="myFunction()"><input type="submit" value="Confirm" id="confirm">
        <span class="popuptext" id="myPopup">Payment Successfull!</span>
      </div>

      </form>

    </div>
    
  </div>
  <div class="r1"><input type="submit" value="Back" id="back" onclick="window.location.href='../salesRep/customer_home';"></div>


  <!-- <script>

document.getElementById("confirm").addEventListener("click", function() 
{
  alert("Payment Succesfull!");
}
); -->

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

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