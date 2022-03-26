<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .search_salesrep {
        position: fixed;
        top: 100px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .search_salesrep {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        display: flex;
        justify-content: center;
        /* background-color:blue; */

        height: 100vh;
        z-index: 10000;
    }

    .search_salesrep_container {
        position: relative;
        width: 400px;
        height: 200px;
        background-color: white;
        border: 3px solid #184A78;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        margin-top: 120px;
    }

    .search_salesrep_subcontainer {
        display: flex;
        flex-direction: column;
    }

    .search_salesrep_search_bar {
        align-content: center;
        margin-top: 10px;
        z-index: 1000;
    }

    .search_salesrep_subcontainer p {
        margin-top: 20px;
        color: #184A78;
        align-self: center;
    }

    .search_salesrep_search_bar input {
        border-radius: 20px;
        padding-left: 10px;
        width: 200px;
        height: 30px;
        color: #184A78;
    }

    .search_salesrep_confirm_button {
        align-self: center;
        margin-top: 50px;
        z-index: 100;
    }

    .search_salesrep_confirm_button button {
        color: #184A78;
        z-index: 100;
    }

    #close-pop_up {
        width: 100px;
        background-color: #184A78;
        color: #fff;
        height: 30px;
    }

    #con_button {
        position: absolute;
        top: 150px;
        left: 150px;
        width: 100px;
        background-color: #184A78;
        color: #fff;
        height: 30px;
        z-index: 100;
        /* z-index: 0; */
    }
    .suggestion{
        width: 200px;
        /* height: 100px; */
        background-color: white;
        z-index: 1000;
        color: #184A78;
        font-size: 12px;
        z-index: 100000;
    }
    .suggestion p a{
        color: #184A78;
        text-decoration: none;
    }
</style>

<body>
    <div class="search_salesrep_container">
        <div class="search_salesrep_subcontainer">
            <p>Search Sales Rep</p>
            <div class="search_salesrep_search_bar">

                <input type="text" id = "search_rep_input" placeholder="search sales rep" onkeyup="search_rep(this.value)">
                <div class="suggestion"></div>
            </div>
            <div class="search_salesrep_confirm_button">
                <button onclick="direct_to_salesrep()" id="con_button">Go...</button>

            </div>

        </div>
    </div>

    <script>

        let suggestion = document.querySelector('.suggestion');
        var rep_to_redirect;
        

        function search_rep(rep) {
           // console.log(rep);
            fetch('http://localhost/web-Experts/public/admin/search_rep', {
                    method: 'POST', 
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(rep),
                })
                .then(response => response.json())
                .then(data => {
                    
                    console.log(data);
                    for(let i = 0 ; i < data.length ; i++){
                        suggestion.innerHTML += `<p><a href="#" onclick = select_rep('${data[i]['user_id']}','${data[i]['name']}')>${data[i]['user_id']} - ${data[i]['name']}</a></p>`;
                    }
                });
        }

        function select_rep(user_id, name){
            search_rep_input = document.getElementById('search_rep_input');

            search_rep_input.value = user_id+" "+name ;
            suggestion.innerHTML = ``;
            rep_to_redirect = user_id;
        }

        const direct_to_salesrep = () => {
            search_rep_input.innerHTML = ``;
            window.location.href = "../salesRep/achievements?user_id="+rep_to_redirect;
        }
    </script>
</body>

</html>