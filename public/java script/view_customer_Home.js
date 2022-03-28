let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");
let nav_id=document.getElementById('nav_id');
let topic=document.getElementById('topic');
let username=document.getElementById('username');
closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});

// searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
//   sidebar.classList.toggle("open");
//   menuBtnChange(); //calling the function(optional)
// });

// following are the code to change sidebar button(optional)
function menuBtnChange() {
  if(sidebar.classList.contains("open")){
    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    nav_id.style.marginLeft="-10px";
    topic.style.visibility="hidden";
    username.style.marginRight="250px"
  }else {
    closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
    //replacing the iocns class
   
   nav_id.style.marginRight="20px";
   topic.style.visibility="visible";
   username.style.marginRight="100px"
  }
 }

function pop_func()
{
  
  let blur = document.querySelector(".home-section");
 
// blur.classList.toggle('active');

let pop_up=document.querySelector(".pop-up");

pop_up.style.visibility="visible";
blur.style.opacity="0.3";

window.onclick = function(event) {
  if (event.target == pop_up) {
      pop_up.style.visibility = "hidden";
      // sidebar.style.opacity = "100%";
      blur.style.opacity = "100%";
  }
}
}


  // Called when user completed the payment. It can be a successful payment or failure
  payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        update_database(orderId);
        //Note: validate the payment and show success or failure page to the customer
    };

    // Called when user closes the payment without completing
    payhere.onDismissed = function onDismissed() {
        //Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Called when error happens when initializing payment such as invalid parameters
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1218797",    // Replace your Merchant ID
        "return_url": undefined,     // Important
        "cancel_url": undefined,     // Important
        "notify_url": "http://sample.com/notify",
        
        "items": "order",
       
        "currency": "LKR",
        "first_name": "Saman",
        "last_name": "Perera",
        "email": "samanp@gmail.com",
        "phone": "0771234567",
        "address": "No.1, Galle Road",
        "city": "Colombo",
        "country": "Sri Lanka",
        "delivery_address": "No. 46, Galle road, Kalutara South",
        "delivery_city": "Kalutara",
        "delivery_country": "Sri Lanka",
        "custom_1": "",
        "custom_2": "",
       
    };

function update_database(orderId){
console.log('jii')
  fetch('http://localhost/web-Experts/public/payment/online_payments',{
    method:'POST',
    headers: {
      'Content-Type': 'application/json'

    },

    body: JSON.stringify(orderId)

  }

  )

  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data){
      location.reload();
    }

  });



}





