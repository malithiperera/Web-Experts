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
         <?php
            for($i = 0 ; $i < 10 ; $i++){
                echo "
                <tr>
                <td>dineth</td>
                <td>100</td>
                <td><input type=\"text\" id=\"in\" onkeyup=\"setTot(this.value, {$i});\"></td>
                <td><input type=\"text\" id=\"('in'{$i})\"></td>
                </tr>
                ";
            }
        ?>

                <!-- <tr>
                <td>dineth</td>
                <td>100</td>
                <td><input type="text" id="in" onkeyup="setTot(this.value);"></td>
                <td><input type="text" id="('in'+2)"></td>
                </tr> -->
        
    </table>

    <script>

        id2 = document.getElementById("in2");

        function setTot(value, i){
            var x = value*2;
            var b = "('in'i)";

            document.getElementById(b).value = typeof b;
        }
    </script>

</body>
</html>