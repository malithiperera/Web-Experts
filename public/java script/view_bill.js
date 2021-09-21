document.getElementById("amount").addEventListener("focus", myFunction);

function myfunc(value) {
  var x;
  x=value*2;
  document.getElementById("tot").value=x;
}