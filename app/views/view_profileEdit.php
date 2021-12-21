<?php session_start();

if (!isset($_SESSION['username'])) {
  header("Location:http://localhost/web-Experts/public/login/index");
}

?>


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
   .prof-img img{
	width: 100%;
	height: 100%;
	border-radius: 50%;
}



input{
	font-size: 1.2rem !important;
}








.pro-data{
    display: flex;
    flex-direction: column;
}

.pro-data input{
    background-color:rgb(212, 209, 209);
    color:black;
    padding: 10px;
    width: 300px;
    margin: 10px;
}
.data-bio input{
    width: 400px;
}

.pro-container{
    display: flex;
    justify-content: center;
    width: 100%;
    margin-top: 100px;
}

.pro-sub{
  width: 900px;
  height: 600px;
  background-color: grey;
  justify-content: space-around;
  border-radius: 10px;
  padding: 40px;
  display: flex;
  z-index: 1;
}

.pro-sub .long{
  width: 1000px;
}
.prof-img{
	margin: 0 1rem 1rem 1rem;
	width: 15rem;
	height: 15rem;
	padding: .3rem ;
	background-size: cover;
	border-radius: 50%;
	box-shadow: 0 0 1.5rem rgba(0,0,0,0.5);
}

.edit-button{
	position: relative;
	top: -3rem;
	left: 10rem;
	background-color: var(--icon);

	width: 3rem;
	height: 3rem;
	line-height: 3rem;
	display: flex;
	justify-content: space-around !important;
	align-content:center !important; 
	border-radius: 50%;
	box-shadow: 0 0 1.5rem rgba(0,0,0,0.5);
}

.edit-button i{
	width: 100%;

	font-size: 1.4rem !important;
}

.bio-data footer{
	border-left: .5px solid gray;
	margin: 0 -1rem ;
}

input[type="file"]{
	display: none;
}
.pencil{
	cursor: pointer;
}
.pop-up-password{
    visibility: hidden;
}

#save-change{
    width: 200px;
    padding: 10px;
    background-color: #184A78;
    border:none;
    outline: none;
    color: #fff;
    margin: 20px;
    border-radius: 10px;
}
#change-pass-but{
    width: 400px;
    padding: 10px;
    margin-top: 10px;
    margin-left: 5px;
    background-color: rgb(212, 209, 209);
    border: 3px solid green;
   
    outline: none;
    color: green;
    /* margin: 20px; */
    border-radius: 10px;

}

#save-pass , #close-pass{
  width: 150px;
  height: 40px;
  background-color: #184A78;
  color: #fff;
  margin-left: 20px;
}
@media (max-width:742px){
/*	main{
		grid-template-columns: 12rem calc(100vw - 12rem);
	}*/
	.prof-img{
		width: 10rem;
		height: 10rem;
	}
	.edit-button{
		top: -3rem;
		left: 8rem;
		width: 2.2rem;
		height: 2.2rem;
		line-height: 2.2rem;
	}
	.side-container{
		width: 12rem;
	}
}
#address .back{
  background-color: #fff;
}



*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    height: 100vh;
    width: 100%;
}

h1{
    font-family: sans-serif;
    text-align: center;
    font-size: 30px;
    color: #222;
}

.profile-pic-div{
    height: 200px;
    width: 200px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    border-radius: 50%;
    overflow: hidden;
    border: 1px solid grey;
}

#photo{
    height: 100%;
    width: 100%;
}

#file{
    display: none;
}

#uploadBtn{
    height: 40px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    color: wheat;
    line-height: 30px;
    font-family: sans-serif;
    font-size: 15px;
    cursor: pointer;
    display: none;
}
  </style>

</head>

<body>
  <div class="sidebar">
    <div class="logo-details">

      <div class="logo_name">H</div>
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
        <a href="../customer/place_order_view">

          <i class='bx bxs-cart-add'></i>
          <span class="links_name">Place Order</span>
        </a>
        <span class="tooltip">Place Order</span>
      </li>

      <li>
        <a href="#" onclick="pop_up_report()">
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

  <section class="home-section">
    <div class="header">
      <?php  require 'view_headertype2.php'; ?>
    </div>
    
<!-- <div class="profile-pic-div">
  <img src="image.jpg" id="photo">
  <input type="file" id="file">
  <label for="file" id="uploadBtn">Choose Photo</label>
</div> -->
  <div class="pro-container">
    <div class="pro-sub">
    <div class="row">
        <div class="prof-img">
          <img src="../../public/images/password.jpg" id="photo-pic">
          <div class="edit-button">
        <label for="reset" class="pencil">
              <i class="fas fa-user-edit"></i>
              <input id="reset" type="file" accept="Image/">
            </label>

          </div>
        </div>
      
      </div>

      <div class="pro-data">
          <div class="data-bio"><input type="text " value="Malithi Perera" id="name" readonly></div>
          <div class="data-bio"><input type="text " value="malithiperera@gmail.com" id="email" readonly><a href="#" onclick="edit_info(email)"><i class="fas fa-pen"></i></a></div>
          <div class="data-bio"> <input type="text " value="07891029" id="tele" readonly><a href="#" id="edit-tele" onclick="edit_info(tele)"><i class="fas fa-pen"></i></a></div>
          <div class="data-bio"><input type="text " value="Kandy" id="address" readonly><a href="#" onclick="edit_info(address)"><i class="fas fa-pen"></i></a></div>
          <div class="data-bio"><input type="text " value="98789091892v" id="nic" readonly><a href="#" onclick="edit_info(nic)"><i class="fas fa-pen"></i></a></div>

          <div class="change-pass">
              <button id="change-pass-but" onclick="change_password()">Change password</button>
          </div>
          <div class="save-changes">
          <button id="save-change">save changes</button>
      </div>


          <div class="pop-up-password" id="pop_up_password">
              <div class="current-pass">
                  <input type="password" placeholder="Enter current password">
              </div>
              <div class="new-pass">
                  <input type="password" placeholder="Enetr new password">
              </div>
              <div class="confirm-pass">
                  <input type="password" placeholder="Confirm password" onkeyup="pass_update()" id="new-con-pass">
              </div>
              <div class="submit">
                  <button id="save-pass">save</button>
                  <button id="close-pass" onclick="close_pass()">Close</button>
              </div>
          </div>
      </div>
      </div>
      </div>  
    </section>
   

  </section>


<script>

         let name= document.getElementById('name');
         let email= document.getElementById('email');
         let tele= document.getElementById('tele');
         let nic=document.getElementById('nic');
         let address=document.getElementById('address');
         let pro= document.querySelector('.pro-sub');
         let con_pass=document.getElementById('new-con-pass');
  let status=0;
    function change_password()
    {
      
   document.getElementById('pop_up_password').style.visibility="visible";
   pro.style.height="800px";

    }

    function close_pass()
    {
        document.getElementById('pop_up_password').style.visibility="hidden";
        pro.style.height="600px";
    }


    function edit_info(type){
      console.log(type);
     var color='rgb(212, 209, 209)';
      name.setAttribute('readonly','true');
      email.setAttribute('readonly','true');
      tele.setAttribute('readonly','true');
      nic.setAttribute('readonly','true');
      address.setAttribute('readonly','true');
      name.style.background=color;
      email.style.background=color;
      tele.style.background=color;
      nic.style.background=color;
      address.style.background=color;
      
type.removeAttribute('readonly');
type.style.background="white";
// email.setAttribute('readonly');
// nic.setAttribute('readonly');
// address.setAttribute('readonly');

    }

    function edit_add()
    {
      
      document.getElementById('address').style.background="white";
      document.getElementById('address').removeAttribute('readonly');
     document.getElementById('tele').setAttribute('readonly');
email.setAttribute('readonly');
nic.setAttribute('readonly');
address.setAttribute('tele')

    }
</script>

<script>
function get_data_profile()
{
  fetch('http://localhost/web-Experts/public/profile/edit_profile')
        .then(response => response.json())
        .then(data => {
         
          console.log(data);
          document.getElementById('name').value=data[0]['name'];
          document.getElementById('email').value=data[0]['email'];
          document.getElementById('tele').value=data[0]['tel'];
          document.getElementById('nic').value=data[0]['nic'];
          document.getElementById('address').value=data[0]['address'];
          document.getElementById('photo-pic').src='../../public/images/uploads/'+data[0]['profile_pic'];
        });


}

get_data_profile();
function pass_update(){
  con_pass.style.border="3px solid red";

}

window.onclick=function(event)
{
   x=document.getElementById('reset').value;
   console.log(x);
}

</script>


  <script src="../../public/java script/side_bar.js"></script>
</body>

</html>