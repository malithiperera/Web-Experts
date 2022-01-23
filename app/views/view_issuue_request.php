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
                flag = 0;
                console.log(data);
                let i;
                requset_table.innerHTML = ``;
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

    requset_table.addEventListener("click", (event) => {
        console.log(event.target.id);
        let issue_id = event.target.id;
        if(flag == 0){
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
                requset_table.innerHTML += `<button onclick="issue_list(${issue_id})" id="issue_list_button">issue</button>`

            });

            flag = 1;
        }
    });

    const issue_list = (issue_id) => {

        let issue_list = new Array(requset_table.rows.length);

        for(let i = 0 ; i < requset_table.rows.length ; i++){
            let table_row = requset_table.rows.item(i);
            issue_list[i] = new Array(table_row.cells.length);
            for(let j = 0 ; j < table_row.cells.length ;j++){

                    if(j == 2){
                    issue_list[i][j] = table_row.cells.item(j).children[0].value;
                    }
                    else{
                    issue_list[i][j] = table_row.cells.item(j).innerHTML;
                    }
                
            }
            
           
        }

        let data_list = {
            issue_list : issue_list,
            issue_id : issue_id
        }

        fetch('http://localhost/web-Experts/public/issue/issue_products',{
                method: 'POST',

                headers: {
                    'Content-Type': 'application/json'
                },

                body: JSON.stringify(data_list)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            });

        load_request();

    }


    
</script>

</html>