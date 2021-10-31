<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
        .search_salesrep{
            position:fixed;
            top:100px;
            width:100%;
            display: flex;
            justify-content: center;
        }
        .search_salesrep_container{
            width:400px;
            height:200px;
            background-color: white;
            border: 3px solid #184A78;
            border-radius: 20px;
            display: flex;
            justify-content: center;
        }
        .search_salesrep_subcontainer{
            display: flex;
            flex-direction: column;
        }
        .search_salesrep_search_bar{
            align-content: center;
            margin-top: 10px;
        }
        .search_salesrep_subcontainer p{
            margin-top: 20px;
            color: #184A78;
            align-self: center;
        }
        .search_salesrep_search_bar input{
            border-radius: 20px;
            padding-left: 10px;
            width:200px;
            height:30px;
            color: #184A78;
        } 
        .search_salesrep_confirm_button{
            align-self: center;
            margin-top: 50px;
        }
        .search_salesrep_confirm_button button{
            color: #184A78;
        }
    </style>
<body>
    <div class="search_salesrep_container">
        <div class="search_salesrep_subcontainer">
            <p>Search Sales Rep</p>
            <div class="search_salesrep_search_bar">
                
                <input type="text" placeholder="search sales rep">
            </div>
            <div class="search_salesrep_confirm_button">
                <button onclick="direct_to_salesrep()">GO...</button>
            </div>
        </div>
    </div>

    <script>
        const direct_to_salesrep = () =>{
            window.location.href = "../salesRep/achievements";
        }
    </script>
</body>
</html>