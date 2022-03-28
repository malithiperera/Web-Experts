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
  <link rel="stylesheet" href="../../public/styles/view_rep_cheque.css">
  <title>ChequePayment</title>


  <style>
/* Popup container - can be anything you want */
/* .popup {
  position: relative;
  display: inline-block;
  /* cursor: pointer; */
  /* -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
} */

/* The actual popup */
/* .popup .popuptext {
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
} */



/* Toggle this class - hide and show the popup */
/* .popup .show {
  visibility: visible;
  
} */

/* Add animation (fade in the popup) */
/* @-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}  */

#vali{
  visibility:hidden;
  color: red;
  font-size: small;
  font-weight: 500;
}

#BankVal{
  visibility:hidden;
  color: red;
  font-size: small;
  font-weight: 500;
}

#ChequeVal{
  visibility:hidden;
  color: red;
  font-size: small;
  font-weight: 500;
}

.pop_up{
  width: 100%;
  height: 700px;
  /* background-color: red; */
  display: flex;
  justify-content: center;
  /* margin-top: 100px; */
}
.pop_up_msg{
  width: 400px;
  height: 400px;
  background-color: #fff;
  border-radius: 10px;
  border: 3px solid black;
  margin-top: 100px;
  visibility: hidden;
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
      <div class="title1">Cheque Payment</div>

      <form class="new" method="post" action="#">
      <div class="input-fields"><label for="order">Order</label><div class="radio">
            <select id="orders" onchange="selectOrder()">
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
      <div class="input-fields"><label for="total">Total Amount</label> <input type="text" name="total" id="total"
          class="inputf">
      </div>
      <div class="input-fields" onchange="BankValidate()"><label for="bank">Bank</label><input type="text" name="bank" id="bank" class="inputf">
      <span class="valBank" id="BankVal">Letters are only allowed</span>
      </div>
      <div class="input-fields" onchange="ChequeValidate()"><label for="ChequeNo">Cheque No</label><input type="text" name="ChequeNo" id="ChequeNo"
          class="inputf">
      <span class="valCheque" id="ChequeVal">Numbers only allowed</span>    
      </div>
      <div class="input-fields" onchange="DateValidate()"><label for="date">Deposit Date</label><input type="date" name="date" id="date"
          class="inputf">
          <br>
          <span class="valDate" id="vali">Enter a valid date</span>
      </div>
      <div class="popup" ><input type="submit" value="Confirm" id="confirm" onclick="ConfirmBank();">
      <!-- <span class="popuptext" id="myPopup">Payment Successfull!</span> -->
    </div>

      </form>
    </div>
    <div class="r1"><input type="submit" value="Back" id="back" onclick="window.location.href='../salesRep/customer_home';"></div>
    
  </div>
  <div class="pop_up">
  <div class="pop_up_msg">

  </div>
</div>

  <script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>


<script>
  var flag=0;
  var ban=0;
  var che=0;
  var dat=0;
  
function DateValidate(){
  var inputDate = document.getElementById("date").value;
  var valiD =document.getElementById("vali").innerHTML;

  
  var today = new Date();
  var date = today.getFullYear()+'-0'+(today.getMonth()+1)+'-'+today.getDate();

  
  // console.log(inputDate);
  // console.log(date);
  console.log(valiD);
 
  
  if(inputDate >= date) {
    var valiD =document.getElementById("vali").style.visibility="hidden";
    dat=1;
    console.log("true");
    // console.log(flag);
  }else{
    var valiD =document.getElementById("vali").style.visibility="visible";
    console.log("false");
    flag=1;
    // console.log(flag);
  }
}


function ConfirmDate(){
  
   console.log(flag);

   if(flag==0){
     var order_id = document.getElementById("orders").value;
     var total = document.getElementById("total").value;
     var bank = document.getElementById("bank").value;
     var cheque_no = document.getElementById("ChequeNo").value;
     var date = document.getElementById("date").value;
    //  console.log(order_id);
   }
  //  console.log("hello");
  var data_set={

    OrderId: order_id,
    Total: total,
    Bank: bank,
    ChequeNo: cheque_no,
    Date:date

};
console.log(data_set);

fetch('http://localhost/web-Experts/public/salesRep/add_chequePayment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data_set)
        })
        .then(response => response.json())
        .then(data => {
            
            console.log(data);
            if(data==0){

              document.querySelector('..pop_up_msg').style.visibility="visible";
            }

           
        });
}


function BankValidate(){
  var inputBank = document.getElementById("bank").value;
  var letters = /^[a-zA-Z\s]*$/; 
  // console.log(inputBank);
  if(inputBank.match(letters))
      {
      // alert('Your name have accepted : you can try another');
      var valiD =document.getElementById("BankVal").style.visibility="hidden";
      ban=1;
      return true;
      
      }
      else
      {
      // alert('Please input alphabet characters only');
      var valiD =document.getElementById("BankVal").style.visibility="visible";
      // console.log("sdf");
      return false;
      // 
      }
}

function ChequeValidate(){
  var inputBank = document.getElementById("ChequeNo").value;
  var letters = /^[0-9\s]*$/; 
  // console.log(inputBank);
  if(inputBank.match(letters))
      {
      // alert('Your name have accepted : you can try another');
      var valiD =document.getElementById("ChequeVal").style.visibility="hidden";
      che=1;
      return true;
      
      }
      else
      {
      // alert('Please input alphabet characters only');
      var valiD =document.getElementById("ChequeVal").style.visibility="visible";
      // console.log("sdf");
      return false;
      // 
      }
}

function ConfirmBank(){
  if(ban==1 && che==1 && dat==1){
    ConfirmDate();
  }else{
    // console.log("sumudu");
    alert("enter valid details");
  }
}

</script>


  <script>
  
  function selectOrder(){
    var x = document.getElementById("orders").value;
    // document.getElementById("total").value=x;
    let dataSet={order_id:x};
  const getData=async dataSet=>{
    let res=await fetch('http://localhost/web-Experts/public/salesRep/amount',
    {
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body:JSON.stringify(dataSet)
    }
    ); 
    if(res.status !== 200) // http status code 200 means success
                throw new Error("Fetching process failed");
            let data = await res.json();
            return data;

  }
  getData(dataSet).then(data=>{
    data.forEach(myFunction);
    function myFunction(item){
    document.getElementById("total").value=item['amount'];
    // console.log(item['amount']);
    }
  })  
}</script>

</body>

</html>