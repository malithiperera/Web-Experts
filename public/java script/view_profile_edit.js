let name= document.getElementById('name');
let email= document.getElementById('email');
let tele= document.getElementById('tele');
let nic=document.getElementById('nic');
let address=document.getElementById('address');
let pro= document.querySelector('.pro-sub');
let con_pass=document.getElementById('new-con-pass');
let save_change=document.getElementById('save-change');
let pop_up_pass=document.getElementById('pop_up_password');







function change_password()
{

document.getElementById('pop_up_password').style.visibility="visible";
pro.style.height="800px";
save_change.style.visibility="hidden";
pop_up_pass.style.marginTop="-30px";

}
function password_updates()
{
var pass_old=document.getElementById('new-pass').value;
var new_p=document.getElementById('new-con-pass');
var new_pass=document.getElementById('new-con-pass').value;
var tool=document.getElementById('tool-tip');
if(pass_old!=new_pass)
{

new_p.style.border="thick solid red";

tool.innerHTML="Password does not match";

}
else{
new_p.style.border="thick solid green";

tool.innerHTML="Password Matched";

}
}
function close_pass()
{
document.getElementById('pop_up_password').style.visibility="hidden";
pro.style.height="600px";
save_change.style.visibility="visible";
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


window.onclick=function(event)
{
x=document.getElementById('reset').value;
console.log(x);
}


var tool=document.getElementById('tool-tip');

function save_pass()
{
var pass=document.getElementById('old_pass').value;
var pass_old=document.getElementById('new-pass').value;
var new_pass=document.getElementById('new-con-pass').value;
var tool=document.getElementById('tool-tip');


if(pass_old!=new_pass)
{

tool.innerHTML="Password does not match";


}

else{

var data_set={
old_password:pass,

new_pass:pass_old,
new_con_pass:new_pass
}

console.log(data_set)
fetch('http://localhost/web-experts/public/profile/changepassword',{
method: 'POST',

headers: {
'Content-Type': 'application/json'

},

body: JSON.stringify(data_set)




})
.then(response => response.json())
.then(data => {
console.log(data);
if(!data){
console.log("error");
tool.innerHTML="Current password does not match";

}
else{
tool.innerHTML=" password Updated";
close_pass();
}

});
}
}

function save_changes(){
var data_set={
name:name.value,
email:email.value,
tele:tele.value,
nic:nic.value,
address:address.value
}
fetch('http://localhost/web-experts/public/profile/save_changes',{
method: 'POST',

headers: {
'Content-Type': 'application/json'

},

body: JSON.stringify(data_set)




})
.then(response => response.json())
.then(data => {
console.log(data);
if(data){
document.querySelector('.pro-container').style.opacity="0.5";
document.querySelector('.pop-up-profile').style.visibility="visible";
document.getElementById('msg').innerHTML="Profile updated successfully";

}

});
}
function hide_popup(){
document.querySelector('.pop-up-profile').style.visibility="hidden";
document.querySelector('.pro-container').style.opacity="1";
location.reload();
}
