<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container" id="container" >
        <p>dienth</p>
    </div>

    <?php
    
    $test = 1;
    if($test == 1){
        echo '<script>
            window.onload = function(){
                setTimeout(() => {
                  document.getElementById("container").innerHTML = "Tharushan";
                }, 300);
             }
        </script>';
    }

    
    
    ?>
    
    <!-- <script>
        window.onload = function(){
            setTimeout(() => {
                document.getElementById('container').innerHTML = "Tharushan";
            }, 300);
        }
    </script> -->
</body>
</html>