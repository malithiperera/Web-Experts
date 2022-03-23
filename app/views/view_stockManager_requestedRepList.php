<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../public/styles/view_stockManager_viewStocks.css"> -->
    <!-- <link rel="stylesheet" href="../../public/styles/view_stockManager_requestedRepList.css"> -->
    <title>Document</title>
    <style>
        .container {
            background-color: blue;
            display: flex;
            flex-direction: column;
        }

        .details {
            height: 100px;
            width: 100%;
            /* background-color: green; */
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }

        .route {}

        .date {}

        .search_bar_div {
            height: 100px;
            width: 100%;
            /* background-color: brown; */
        }

        .search_bar {
            height: 80px;
            width: 200px;
            border-radius: 10px;
            background-color: white;
        }

        .list {
            height: 100px;
            width: 500px;
            background-color: red;
        }

        .rep_request {
            display: flex;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="details">
            <div class="route">
                <p>Route : </p>
            </div>
            <div class="date">
                <p>Date : </p>
            </div>
        </div>
        <div class="search_bar_div">
            <div class="search_bar">

            </div>
        </div>
        <div class="list">

        </div>
    </div>

    <script>
        let list = document.querySelector('.list');


        // console.log ("test")
        const getRepList = () => {
            fetch('http://localhost/web-Experts/public/stockManager/getRepList_cont', {})
                .then(response => response.json())
                .then(data => {

                    for (let i = 0; i < data.length; i++) {
                        list.innerHTML +=  `< div class = "rep_request" >`
                        // <div class = "rep_name" > ${data[i]['name']} < /div> 
                        // <div class = "rep_no" > ${data[i]['name']} < /div> 
                        // <div class = "request_time" > ${data[i]['name']} < /div> 
                        // <div class = "view" > < button class = "view_button" > View < /button></div >
                        // </div>`


               
                    }


                    console.log(data)

                })

        }


        let type = <?php echo "Malithi"; ?>
        console.log("Malithi");
        getRepList()
    </script>
</body>

</html>