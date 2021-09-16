const btn1=document.getElementById("admin");
const btn2=document.getElementById("rep");
const btn3=document.getElementById("cus");
const div1=document.getElementById("div1");
const div2=document.getElementById("div2");
const div3=document.getElementById("div3");

btn1.onclick=function(){
div1.style.visibility="visible";
div2.style.visibility="hidden";
div3.style.visibility="hidden";

}
btn2.onclick=function(){
div1.style.visibility="hidden";
div2.style.visibility="visible";
div3.style.visibility="hidden";
// if(div1.style.disply=="block" ||div3.style.disply=="block" )
// {
//     div1.style.display="block";
// }
}
btn3.onclick=function(){
div1.style.visibility="hidden";;
div3.style.visibility="visible";
div2.style.visibility="hidden";;
}