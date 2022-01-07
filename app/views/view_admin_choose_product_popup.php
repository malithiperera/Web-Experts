<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        .choose_product {
            position: fixed;
            top: 100px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .choose_product_container {
            width: 500px;
            height: 250px;
            background-color: white;
            border: 2px solid #184A78;
            border-radius: 20px;
            display: flex;
            justify-content: center;
        }
        .choose_product_subcontainer1{
            display: flex;
            flex-direction: column;
        }
        .choose_product_subcontainer1{
            width: 400px;
            height: 50px;
            /* background-color: red; */
            text-align: center;
            margin-top: 20px;
        }
        .choose_product_subcontainer2{
            width: 400px;
            height: 50px;
            /* background-color: blue; */
        }
        #search_product{
            margin-top: 10px;
            width: 376px;
            border: 1px;
            height: 25px;
        }
        .choose_product_search_icon{
            position: fixed;
            top:100px;
        }
        .choose_product_subcontainer3{
            width: 400px;
            height: 50px;
            /* background-color: green; */
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
       
    </style>
</head>

<body>
    <div class="choose_product_container">
        <div class="choose_product_main_subcontainer">
            <div class="choose_product_subcontainer1">
                <p style="color: #184A78; font-size:20px; font-weight:bold;">Choose Product</p>
            </div>
            <div class="choose_product_subcontainer2">
                <p style="color: #184A78;">Search product by product name or product id</p>
                <input type="text" name="search_product" id="search_product">
                <i class="fas fa-search choose_product_search_icon"></i>
            </div>
            <div class="choose_product_subcontainer3">
                <button id="choose_product_back_button" style="color: #184A78;">Back</button>
            </div>
        </div>


    </div>
</body>

</html>