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
        <tr>
           <td class="first_name">dienth</td>
           <td rowspan="3"><button onclick="edit(event)">view</button></td>
        </tr>
        <tr>
            <td class="mid_name">tharushan</td>
        </tr>
        <tr>
            <td class="last_name">silva</td>
        </tr>
        <!-- <?php
        for ($i = 0; $i < 10; $i++) {
            echo "
                <tr>
                <td>dineth</td>
                <td>100</td>
                <td><input type=\"text\" id=\"qty_$i\" onkeyup=\"setTot(this.value, $i);\"></td>
                <td><input type=\"text\" id=\"ttp_$i\"></td>
                <td><button onclick=\"edit(event)\">edit</button></td>
                </tr>
                ";
        }
        ?> -->

        <!-- <tr>
                <td>dineth</td>
                <td>100</td>
                <td><input type="text" id="in" onkeyup="setTot(this.value);"></td>
                <td><input type="text" id="('in'+2)"></td>
                </tr> -->

    </table>

    <div class="the_table">
        <div class="the_table1">
            <div class="the_table2"></div>
        </div>
    </div>

    <script>
        function setTot(value, i) {
            let id = document.getElementById(`ttp_${i}`);
            id.value = value * 3;
        }
    </script>

    <script>
        function edit(event) {
            console.log(event);
            console.log(event.path[3]);
            console.log(event.path[2]);
            console.log(event.path[2].cells[0]);
            // event.path[2].cells[0].style.backgroundColor = 'red';
        }

        var the_table = document.querySelector('.the_table');
        the_table.classList.add("my_class");
        console.log(the_table.classList);
    </script>

</body>

</html>