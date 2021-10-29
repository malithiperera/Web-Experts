<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            /* color: #184A78; */
        }

       

        .content {
            position: absolute;
            top: 100px;
            z-index: 2000;
            background-color: white;
            border: 3px solid #184A78;
            border-radius: 20px;
            padding-right: 50px;
            height: 600px;
        }

        .table {
            position: relative;
            width: 100%;
            z-index: 2000;
        }

        table {
            margin-left: 50px;
            z-index: 2000;
        }

        tr {
            background-color: white;
        }

        thead th {
            padding-left: 100px;
            padding-right: 100px;
            text-align: center;
            background-color: white;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        tr td {
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
            color: #184A78;
        }

        tr td a {
            text-decoration: none;
            color: #184A78;
        }

        tr td a:hover {
            text-decoration: underline;
        }

        table th {
            color: #000000;
            background: #4FC3A1;
        }

        table th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .buttons {
            position: relative;
            width: 100%;
            margin-left: 50px;
            margin-top: 30px;
            margin-bottom: 70px;
        }
        .buttons p{
            color: #184A78;
        }
        button {
            width: 100px;
            height: 30px;
            background-color: white;
            border-radius: 20px;

        }

        .new_added_row {
            position: relative;
            left: 50px;
            top: -50px;
        }

        .new_added_row input {
            padding: 10px;
            color: #184A78;
        }
    </style>
</head>

<body>


    <div class="content">

        <div class="buttons">
            <p>Add new Route</p>

            <!-- <button id="edit">EDIT</button> -->
        </div>

        <form class="new_added_row">
            <!-- <input type="text" name="route_id" placeholder="Route Id" id="route_id" required> -->
            <input type="text" name="route_id" placeholder="route_id" id="route_id">
            <input type="text" name="destination" placeholder="Destination" id="destination" required>
            <input type="text" name="route_name" placeholder="Route Name" id="route_name" required>
            <input type="submit" name="submit">
        </form>

        <div class="table">

            <table>
                <thead>
                    <th>ROUTE ID</th>
                    <th>DESTINATION</th>
                    <th>ROAD</th>
                </thead>
                <tbody>

                </tbody>


            </table>
        </div>

    </div>

    <script>

        //get routes
        const get_routes = () =>{
            fetch('http://localhost/web-Experts/public/admin/get_routes')
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
        }

        get_routes();

    </script>


</body>

</html>