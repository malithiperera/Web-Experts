<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .removeuser {
            position: fixed;
            top: 50px;
            left: 0px;
            width: 100%;
            display: flex;
            justify-content: center;
            /* background-color: white; */

            height: 100vh;
            z-index: 10000;
        }

        .remove_user_message {
            width: 500px;
            height: 400px;
            background-color: white;
            border-radius: 20px;
            border: 1px solid #184A78;
        }

        .remove_user_header,
        .remove_user_position label,
        .remove_user_position input,
        .remove_user_userid label,
        .remove_user_userid input,
        .remove_user_purpose label,
        .remove_user_purpose input,
        .remove_user_remove button {
            color: #184A78;
            padding: 10px;
            margin: 10px;
            border-radius: 10px;
        }

        .remove_user_position input,
        .remove_user_userid input,
        .remove_user_purpose input {
            text-align: center;
        }

        #remove_button {
            margin-left: 200px;
            width: 200;
            height: 40px;
            padding: 10px;
            background-color: rgb(220, 53, 69);
            color: #fff;
            outline: none;
            font-size: 14px;
            border: none;
            padding-top: 6px;
            margin-top: 50px;
        }

        textarea {
            color: #184A78;
            padding-left: 10px;
        }

        .remove_user_purpose label {
            position: relative;
            top: -40px;
        }

        #remove_user_position_input {
            position: relative;
            left: -8px;
        }

        h2 {
            color: black;
            text-align: center;
        }

        #remove_button i {
            padding-right: 8px;
        }

        #select_position {
            height: 30px;
            border-radius: 20px;

        }

        #select_position,
        #select_position option {
            color: #184A78;
            text-align: center;
        }
        .sugestion_remove_employee{
            position: absolute;
            width: 170px;
            /* height: 100px; */
            background-color: white;
            margin-left: 125px;
            margin-top: -10px;
            font-size: 16px;
            color: #184A78;
        }
        .sugestion_remove_employee a{
            font-size: 14px;
            text-decoration: none;
            color: #184A78;
        }
    </style>
</head>

<body>

    <div class="remove_user_message">
        <div class="remove_user_header">
            <h2>Remove User</h2>
        </div>

        <div class="remove_user_position">
            <label for="">Position : </label>
            <select name="select_position" id="select_position">
                <option value="admin">Admin</option>
                <option value="rep">Sales Rep</option>
                <option value="customer">Customer</option>
                <option value="stockmanager">Stock Manager</option>
            </select>
        </div>

        <div class="remove_user_userid">
            <label for="">User Id : </label>
            <input type="text" name="" id="remove_user_userid_input" onkeyup = "select_user(this.value)">
            <div class="sugestion_remove_employee"></div>
        </div>

        <div class="remove_user_purpose">
            <label for="">Purpose : </label>
            <textarea id="remove_user_purpose_input" name="w3review" rows="4" cols="50"></textarea>
        </div>

        <div class="remove_user_remove">
            <button id="remove_button" onclick="remove_user()"><i class="fas fa-trash-alt"></i>Remove</button>
        </div>

    </div>

    <script>
        let remove_user_userid_input = document.getElementById('remove_user_userid_input');
        let remove_user_purpose_input = document.getElementById('remove_user_purpose_input');
        let select_position = document.getElementById('select_position');

        function remove_user() {
            user_id = remove_user_userid_input.value;
            position = select_position.value;
            purpose = remove_user_purpose_input.value;

            let dataset = {
                user_id: user_id,
                position: position,
                purpose: purpose
            }

            fetch('http://localhost/web-Experts/public/admin/remove_the_user', {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(dataset)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
        }


        //for give suggestions according to the user


        let suggestions = document.querySelector('.sugestion_remove_employee');

        function select_user(user) {
            let position = document.getElementById('select_position').value;
           

            let dataset = {user : user ,  position : position};
            // console.log(user);

            fetch('http://localhost/web-Experts/public/admin/remove_user_suggestions', {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(dataset),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    suggestions.innerHTML = '';
                    for(let i = 0 ; i < data.length ; i++){
                        suggestions.innerHTML += `<p><a href="#" onclick="select_user_remove_emp('${data[i]['user_id']}', '${data[i]['name']}')">${data[i]['user_id']} - ${data[i]['name']}</a></p>`;
                    }
                });
        }

        function select_user_remove_emp(user_id, name){
            let user_id_input = document.getElementById('remove_user_userid_input');

            user_id_input.value = user_id + " - " + name;
            suggestions.innerHTML = ``;
        }
    </script>

</body>

</html>