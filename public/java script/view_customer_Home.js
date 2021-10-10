let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
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
blur.style.opacity="0.5";

window.onclick = function(event) {
  if (event.target == pop_up) {
      pop_up.style.visibility = "hidden";
      // sidebar.style.opacity = "100%";
      blur.style.opacity = "100%";
  }
}
}

