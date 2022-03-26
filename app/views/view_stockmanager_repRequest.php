<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../../public/styles/view_stockmanager_repRequest.css">
</head>
<style>
    .header-con{
        margin-top:-80px;
    }
</style>
<body>
    
<div class="container">
<h2>DAILY PRODUCT LIST</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>edit</th>

                </tr>
            </thead>
            <tbody class="content">

            </tbody>

        </table>
    </div>
    <div class="input-fields"><input type="submit" value="Back" id="back" onclick="window.location.href='../stockManager/backToSMHome';"></div>
    <div class="input-fields"><input type="submit" value="Confirm" id="confirm" onclick="issue_products_save()"></div>
</div>
    

    <script>
     

        var issue_id= "<?php echo $this->added;?>";
        var fl_table=document.querySelector('.fl-table');

        console.log(issue_id)
        function show_list(){
            console.log(issue_id)
            fetch('http://localhost/web-Experts/public/issue/view_issue_list', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(issue_id)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            for (let i = 0; i < data.length; i++) {

            fl_table.innerHTML+=`<tr><td>${data[i]['product_id']}</td><td>${data[i]['product_name']}</td>
            <td>${data[i]['requested_qty']}</td><td><input value="${data[i]['requested_qty']}"></td></tr>`;
            }
            });
      

        }
        show_list();


        function issue_products_save(){
            var table_data = new Array(fl_table.rows.length - 1);
            console.log(document.querySelector('.fl-table').rows.length)
            for (i = 1; i < fl_table.rows.length; i++) {
                let table_cell = fl_table.rows.item(i).cells;

                table_data[i - 1] = new Array(table_cell.length);

                for (j = 0; j < table_cell.length; j++) {
                if(j==3){
                    
                table_data[i - 1][j]=table_cell.item(j).children[0].value;
                }

                else{
                    table_data[i - 1][j] = table_cell.item(j).innerHTML;
                }
               
                console.log(table_data[i - 1][j])
               
            }

            }
            console.log(table_data);

            fetch('http://localhost/web-Experts/public/issue/issue_rep', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(table_data)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
           
            });
    
        }
    </script>
</body>

</html>