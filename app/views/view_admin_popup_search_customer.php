<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .popup {
        position: fixed;
        top: 70px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .search_customer {
        width: 400px;
        height: 300px;
        background-color: white;
        border: 1px solid #184A78;
        border-radius: 10px;
    }

    .search_bar input {
        position: relative;
        top: 20px;
        left: 68px;
        width: 250px;
        height: 30px;
        border-radius: 10px;
        padding-left: 20px;

        color: #184A78;
    }

    .fa-search {
        position: relative;
        left: 35px;
        top: 23px;
        color: #184A78;
    }

    .search_customer p,
    .search_customer select,
    .search_customer select option {
        color: #184A78;
    }

    .search_customer select {
        width: 100px;
        height: 30px;
    }

    .search_by_route {
        position: relative;
        top: 80px;
        left: 50px;
    }

    .select_route {
        float: left;
        margin-right: 70px;
    }

    .search_by_route a {
        position: relative;
        border: 1px solid #184A78;
        border-radius: 18px;
        top: 30px;
        left: 120px;
        color: #184A78;
        text-decoration: none;
        padding: 8px;
    }

    .search_by_route a:hover {
        background-color: #184A78;
        color: white;
    }

    .add_new_cus a {
        position: relative;
        top: 150px;
        left: 130px;
        text-decoration: none;
        color: #184A78;
    }

    .card i {
        color: black;
    }

    #count {
        color: rgb(45, 211, 45);
        font-size: 25px;
        font-weight: 700;
        margin-top: -10px;

    }

    h3 {
        color: black;
        padding: 10px;
        margin-top: 10px;
        text-align: center;
        text-transform: uppercase;
    }
</style>

<body>
    <div class="search_customer">
        <div class="search_bar">
            <input type="text">
            <i class="fas fa-search fa-lg"></i>
        </div>
        <div class="search_by_route">

            <div class="select_route">
                <p>Select Route : </p>
                <select name="cars" id="cars">
                    <option>route 1</option>
                    <option>route 2</option>
                    <option>route 3</option>
                    <option>route 4</option>
                </select>
            </div>


            <div class="select_customer">
                <p>Select Customer : </p>
                <select name="cars" id="cars">
                    <option>customer 1</option>
                    <option>customer 2</option>
                    <option>customer 3</option>
                    <option>customer 4</option>
                </select>
            </div>

            <a href="../admin/customerProfile">GO...</a>
        </div>
        <div class="add_new_cus">
            <a href="../admin/add_new_cus">Add New Customer</a>
        </div>
    </div>
</body>

</html>