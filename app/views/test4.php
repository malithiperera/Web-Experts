<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 200px;
            height: 200px;
            background-color: red;
        }
    </style>
</head>

<body>
    <div class="container">

    </div>

    <script>
        // const get_data = () => {

        //     var data_set = {
        //         username : "Tharushan",
        //         address : Array("jhjk", "jhbjh")
        //     }

        //     fetch("http://localhost/web-Experts/public/login/test4_get_data", {
        //             method: 'POST',  
        //             headers: {
        //                 'Content-Type': 'application/json'
                        
        //             },
        //             body: JSON.stringify(data_set)
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             document.querySelector('.container').innerHTML = data['username'];
        //             console.log(data);
        //         });
        // }

        // get_data();

        const setValue = () => {
            document.querySelector('.container').innerHTML = "Dineth";
        }

        

        const getValue = () =>{
            console.log(document.querySelector('.container').innerHTML);
        }
        setValue();
        getValue();
        
    </script>
</body>

</html>