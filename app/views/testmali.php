<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text" name="" id="mali" onkeyup="test()">
    <div class="suggetList" id="suggetList">

    </div>
</body>
<script>

var valu=document.getElementById('mali');
var list=document.getElementById('suggetList');
function test(){
    var x=valu.value;
fetch('http://localhost/web-Experts/public/profile/test',{
method:'POST',
headers: {
            'Content-Type': 'application/json'

          },
          body:JSON.stringify(x)

})
.then(response=>response.json( ))
.then(data=>{
    list.innerHTML='';
    console.log(data)
    for(let i=0;i<data.length;i++){
        list.innerHTML+=data[i]['product_name'];
    }
    
})
}
</script>
</html>