<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../../public/styles/view_stockmanager_repRequest.css">
</head>

<body>

    <h2>DAILY PRODUCT LIST</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th></th>

                </tr>
            </thead>
            <tbody class="content">

            </tbody>

        </table>
    </div>
    <div class="input-fields"><input type="submit" value="Back" id="back" onclick="window.location.href='../stockManager/backToSMHome';"></div>
    <div class="input-fields"><input type="submit" value="Confirm" id="confirm"></div>

    <script>
        var content = document.querySelector('.content')

        const fillRepRequestTable = () => {
            fetch('http://localhost/web-Experts/public/stockManager/fillRepRequestTable_con', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },

                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    for (let index = 0; index < data.length; index++) {
                        content.innerHTML += `
                            <td>${data [index] ['product_id'] + " - " + data [index] ['product_name']}</td>
                            <td>${data [index] ['qty']}</td>
                            <td class="action_col">
                                <button class="btn_edit">Edit</button>
                                <button class="btn_update">Update</button>

                            </td>
                        `

                    }
                    console.log(data)

                })
        }
        fillRepRequestTable()
    </script>
</body>

</html>