<?php session_start();

if (!isset($_SESSION['username'])) {
  header("Location:http://localhost/web-Experts/public/login/index");
}

?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Returns</title>
        <link rel="stylesheet" href="../../public/styles/view_rep_return.css">
    </head>

    <body>
            <h2> RETURNS</h2>
          <div class="Customer">Enter Customer ID:<input type="text" id="cus_id"></div>

            <div class="table-wrapper">

            
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody class="content">

                    <tbody>
                </table>
            </div>
            <div class="submit"><input type="submit" value="Submit" id="submit" onclick="returns()"></div>

    <script>

      function get_products(){
        var content=document.querySelector('.content');
        fetch('http://localhost/web-Experts/public/salesRep/return_product') 
                .then(response => response.json())
                .then(data => {

                    for (i = 0; i < data.length; i++) {
                        content.innerHTML += `
                    
                            <tr>
                            <td>${data[i]['product_id']}</td>
                            <td>${data[i]['product_name']}</td>
                            <td><input type="text" id="input-field"></td>
                            <td><input type="text" id="input-field"></td>
                            </tr>

                            `;
                    }

                    // console.log(data);
                });
      }
      get_products()

    </script>
      

    <script>

      function returns(){
        var table_info=document.querySelector('.fl-table');
        var customer_id=document.querySelector('.cus_id');
        

        // console.log(table_info.rows.length);
        // console.log("hello orders")
        var table_data = new Array(table_info.rows.length - 1);
    
    if (table_info.rows.length != 2) {
        for (i = 1; i < table_info.rows.length - 1; i++) {
            let table_cell = table_info.rows.item(i).cells;
            table_data[i - 1] = new Array(table_cell.length);
            for (j = 0; j < table_cell.length; j++) {
                if(j==3 || j==2){
                    
                table_data[i - 1][j]=table_cell.item(j).children[0].value;
                }

                else{
                    table_data[i - 1][j] = table_cell.item(j).innerHTML;
                }
               
                console.log(table_data[i - 1][j])
               
            }

        }
        console.log(table_data);
        
        var customer = cus_id.value;
        var table= table_data;
        var rep = "<?php echo $_SESSION['userid']?>";

        var data_set={

          cus_id: customer,
          rep_id: rep,
          table: table_data

        };

        console.log(data_set);

        fetch('http://localhost/web-Experts/public/salesRep/fillReturns', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data_set)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
           
        });



    }



      }
      returns();

    </script>

    </body>

    </html>