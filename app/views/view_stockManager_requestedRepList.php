<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../public/styles/view_stockManager_viewStocks.css"> -->
    <!-- <link rel="stylesheet" href="../../public/styles/view_stockManager_requestedRepList.css"> -->
    <title>Document</title>
</head>

<body>
    <table class="repNames">
        <div class="listTable">
            <tr>
                <th>Name</th>
                <th>Route</th>
            </tr>
            <!-- <tr>
                <td>rep_1</td>
                <td>route_1</td>
            </tr>
            <tr>
                <td>rep_2</td>
                <td>route_2</td>
            </tr>
            <tr>
                <td>rep_3</td>
                <td>route_3</td>
            </tr>
            <tr>
                <td>rep_4</td>
                <td>route_4</td>
            </tr>
            <tr>
                <td>rep_5</td>
                <td>route_5</td>
            </tr> -->
        </div>

    </table>

    <script>
        var repList = document.querySelector(".repNames")
        // console.log ("test")
        const getRepList = () => {
            fetch('http://localhost/web-Experts/public/stockManager/getRepList_cont', {})
                .then(response => response.json())
                .then(data => {
                    repList.innerHTML += `
                        <tr>
                            <td>${data ['rep_id']}</td>
                            <td>${data ['date']}</td>
                        </tr>
                    `
                    console.log(data ['rep_id'])

                })
        }
        getRepList()
    </script>
</body>

</html>