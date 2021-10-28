<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../../public/styles/view_rep_productList.css">
</head>

<body>
    <!-- <?php require 'view_headerType2.php';  ?> -->
    <h2>DAILY PRODUCT LIST</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>

                </tr>
            </thead>
            <?php
            if ($this->result->num_rows > 0) {
                while ($row = $this->result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row['product_name'] . "</td>
                    <td></td>
                   
                  </tr>";
                }
            }
            ?>

        </table>
    </div>
    <div class="input-fields"><input type="submit" value="Back" id="back" onclick="window.location.href='../salesRep/home';"></div>
    <div class="input-fields"><input type="submit" value="Confirm" id="confirm"></div>
    <script>
        var data_set = {
            route_id: '<?php echo $_GET['route_id']; ?>'
        }

        const get_product = () => {
            fetch('http://localhost/web-Experts/public/salesRep/get_product', {
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

        get_product();
    </script>
</body>

</html>