<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table class="requset_table">


        </table>

    </div>
</body>


<script>
    var requset_table = document.querySelector('.requset_table');
    var container = document.querySelector('.container');
    var flag = 0;

    function load_request() {
        fetch('http://localhost/web-Experts/public/issue/load_request'

            )
            .then(response => response.json())
            .then(data => {
                console.log(data);
                let i;
                for (i = 0; i < data.length; i++) {
                    requset_table.innerHTML += `<tr id="${data[i]['issue_id']}"> 
             <td id="${data[i]['issue_id']}">${data[i]['name']}</td>
             <td id="${data[i]['issue_id']}">${data[i]['date']}</td>
             <td id="${data[i]['issue_id']}">${data[i]['time']}</td>
             </tr>`



                }


            });

    }
    load_request();
    //get issue id and load the issue products 
    window.onclick = function(event) {
        var issue_id = event.target.id;

        if (flag == 0) {
          
            requset_table.innerHTML = "";

            fetch('http://localhost/web-Experts/public/issue/load_products', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },

                    body: JSON.stringify(issue_id)
                })
                .then(response => response.json())
                .then(data => {
                    let i;
                    for (i = 0; i < data.length; i++) {
                        requset_table.innerHTML += `<tr id="${data[i]['product_id']}"> 
                    <td >${data[i]['product_id']}</td>
             <td >${data[i]['product_name']}</td>
             <td ><input value="${data[i]['requested_qty']}"></td>
           
             </tr>`



                    }


                });
                flag=1;
        }
    }
</script>

</html>