<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <th>name</th>
            <th>unit price</th>
            <th>qty</th>
            <th>total price</th>
        </thead>

        <tbody class="content">
           
        </tbody>


    </table>


    <script>
        var content = document.querySelector('.content');

        function fill_table() {

            for (i = 0; i < 10; i++) {
                content.innerHTML += `<tr>
                                      <td>
                                        <table>
                                            <tr><td>dienth</td></tr>
                                            <tr><td>thrushan</td></tr>
                                            <tr><td>silva</td></tr>
                                        </table>
                                      </td>
                                      <td><button onclick="edit(event)">view</button></td>
                                      </tr>`;
            }
        }

        fill_table();

        function edit(event) {
            // var table_content = event.path[2].cells[0].getElementsByTagName("table");

            // console.log(table_content[0].children[0].rows[0]);
            console.log(event.path[2].cells[0]);
        }
    </script>

</body>

</html>