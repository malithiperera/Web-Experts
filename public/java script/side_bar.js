let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");
let nav_id=document.getElementById('nav_id');
let topic=document.getElementById('topic');
let username=document.getElementById('username');
closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  // nav_id.style.background="green";
 ;
  menuBtnChange();//calling the function(optional)

});

searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  sidebar.classList.toggle("open");
  
  menuBtnChange(); //calling the function(optional)
});

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


