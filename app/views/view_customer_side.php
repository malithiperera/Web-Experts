
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Customer Home </title>
  <link rel="stylesheet" href="../../public/styles/view_customer_Home.css">
  
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <style>
    
    /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
.sidebar{
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 78px;
  background: #184A78;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
}
.sidebar .logo-details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li{
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}


.sidebar .bx-search{
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 22px;
  background: #1d1b31;
  color: #FFF;
}
.sidebar.open .bx-search:hover{
  background: #1d1b31;
  color: #FFF;
}
.sidebar .bx-search:hover{
  background: #FFF;
  color: #11101d;
}
.sidebar li a{
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #184A78;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color: #11101D;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}
.home-section{
  position: relative;
  background: #fff;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}

  
.cards{
  position: relative;
  display: flex;
  flex-wrap: wrap;
  top:50px;
  /* left: 50px; */
  z-index: 999;
  /* margin-left: 150px; */
  justify-content: center;
 
}
.card{
  width: 200px;
  height: 100px;
  /* background-color: #2277B2; */
  /* margin-left: 20px; */
  margin-right: 20px;
  margin-bottom : 40px;
  text-align:center;
  z-index: 999;
  cursor:pointer;
  border-radius:10px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
  
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 18px
}
/* section{
  padding:1rem 5%;
} */
.detail{
  display: flex;
 
  justify-content:space-evenly;
  flex-wrap: wrap-reverse;
 
}
.right{
  width: 300px;
  height: 600px;
  /* background-color: #fff; */
  padding: 10px;
  margin: 20px;
  display: flex;
 
  flex-direction: column;
  justify-content: space-evenly;
  /* box-shadow: 0 5px 10px rgba(0,0,0,0.1); */
  
}


.left{
  width: 650px;
  height: 600px;
  background-color: #fff;
  padding: 10px;
  margin: 20px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
  
}
h2{
text-align: center;
font-size: 20px;

}
.customer{
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
  height: 300px;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
  margin-bottom: 20px;
}
.rep{
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
  height: 300px;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.field{
  display: flex;
  justify-content: space-evenly;
  width: 270px;
  background-color: #fff;
  margin-top: 10px;
  /* box-shadow: 0 5px 10px rgba(0,0,0,0.1); */

}

.content{
  color: rgb(13, 160, 13);
}

@media (max-width: 1104px) {
/* .detail{
  flex-direction: row-reverse;
} */
  .right{
    display:flex;
    flex-direction: row;
  }
}
@media (max-width: 674px)
{
  .right{
    flex-wrap: wrap;
  }
}

@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}
table {
    width: 80%; 
    margin: auto;           /* move table to middle */
    position: relative;
    top: 50px;

}
thead th {
    text-align: left;           /* allign th in to left*/
    background-color: #2277B2;
    color: #fff;

}
table, th, td {
    border: 0px solid #000; 
    border-collapse: collapse;      /* remove the space between borders */

}
th, td {
    padding: 10px;

}

button {
    font-size: large;
    background-color: #2277B2;
    width: 100px;
    height: 40px;
    position: absolute;
    left:  10%;
    border-radius: 10px;
    background-color: #2277B2;
    border-color: #2277B2;
    color: #FFF;
    
}

tbody tr:nth-of-type(odd) {
  background-color: #f3f3f3;

}

tbody tr {
  border-bottom: 1px solid #dddd;
  
}
a {
  text-decoration: none;
  color: black;

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
        <a href="#">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="../customer/place_order_view">

          <i class='bx bxs-cart-add'></i>
          <span class="links_name">Place Order</span>
        </a>
        <span class="tooltip">Place Order</span>
      </li>

      <li>
        <a href="../customer/view_report">
          <i class='bx bx-line-chart'></i>
          <span class="links_name">Reports</span>
        </a>
        <span class="tooltip">Reports</span>
      </li>
      <li>
        <a href="../customer/our_products">
          <i class="fas fa-ice-cream"></i>
          <span class="links_name">Our Products</span>
        </a>
        <span class="tooltip">Our Products</span>
      </li>
      <li>
        <a href="../customer/view_notification">
          <i class='bx bx-bell'></i>
          <span class="links_name">Notification</span>
        </a>
        <span class="tooltip">Notification</span>
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
            <div class="name"></div>
            <div class="job">Customer</div>
          </div>
        </div>
        <i class="fas fa-store" id="log_out"></i>
      </li>
    </ul>
  </div>

</body>
<script>
  let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

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
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
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
</script>
</html>