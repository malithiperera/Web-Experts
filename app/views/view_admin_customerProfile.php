<?php session_start();

if (!isset($_SESSION['username'])) {
    header("Location:http://localhost/web-Experts/public/login/index");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            color: white;
        }


        .fa-building {
            position: absolute;
            top: 20px;
            right: 10px;
        }

        .footerIcon p {
            margin-top: 20px;
            margin-left: 10px;
            visibility: hidden;
        }

        .containers {
            margin-top: 60px;
            position: relative;
            left: 40px;
            width: calc(100% - 80px);
            display: flex;
            flex-direction: column;
            /* opacity:50%; */
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            text-align: center;
            margin-top: 30px;
        }

        .card {
            flex: 2 0 150px;
            width: 200px;
            height: 100px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            margin-top: 30px;
            margin-right: 10px;
            margin-left: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .card>p {
            color: black;
            margin-top: 10px;
        }

        .tables {
            width: 100%;
            display: flex;
            justify-content: center;
            color: black;
            flex-wrap: nowrap;
        }


        .sub_tabels {
            margin-top: 40px;
        }

        .tables p {
            color: #184A78;
            margin-bottom: 30px;
        }

        .table1 {
            margin-bottom: 30px;
            display: flex;
            justify-content: center;

        }

        .table1 td {
            width: 120px;
        }

        table {
            border: none;
            outline: none;
        }

        table thead th {
            color: #184A78;
            padding: 10px;

        }

        table th {
            color: #000000;
            background: #4FC3A1;
        }

        tr th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        td {
            padding: 5px;
            background-color: #fff;
            text-align: center;


        }

        table tr tr:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        tr:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        tr td {
            color: #184A78;
            padding: 10px;

        }

        tr:nth-child(3) {
            background-color: green;
            color: white;
        }

        .popup_send_warning,
        .popup_update_status {
            position: fixed;
            top: 100px;
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 1000;
            visibility: hidden;
        }

        .popup_update_status {
            visibility: hidden;
        }

        .send_warning_message,
        .update_status_form {
            width: 400px;
            height: 350px;
            background-color: white;
            border: 4px solid #184A78;
            border-radius: 10px;
        }

        .update_status_form {
            height: 400px;
        }

        .send_warning_message label,
        .update_status_form label {
            color: #184A78;
            display: block;
            margin: 20px;
        }

        .send_warning_message input,
        .update_status_form input,
        .send_warning_message textarea,
        .update_status_form textarea {
            color: #184A78;
        }

        .update_status_form input {
            padding: 5px;
            margin-left: 10px;
        }

        .message_input {
            margin-left: 10px;
        }

        .submit {
            margin-top: 30px;
            padding: 5px;
            border-radius: 20px;
            margin-left: 160px;
        }

        .card i {
            color: black;
        }

        #top {
            color: green;
            font-weight: 700;
            font-size: 20px;
        }

        h2 {
            color: black;
            text-align: center;
            padding: 10px;
        }

        .update_status_form .submit {
            margin-left: 160px;
        }

        label {
            color: black;
            padding: 20px;
            font-size: 25px;

        }

        input {
            color: black;
            padding: 10px;
            text-align: center;
        }

        #cred {
            background-color: rgb(84, 206, 98);
            padding: 7px;
            width: 150px;
            border-radius: 10px;
            margin-left: 10px;
            cursor: pointer;
            outline: none;
            border: none;
        }

        tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        #cred i {
            padding: 10px;
        }

        .detail {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        span {
            color: #184A78;
        }

        #credit {
            font-weight: 700;
            font-size: 20px;
        }

        .div0 label {
            color: #184A78;
            font-weight: 900;
        }

        .tables {
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;

            margin-top: 30px;
        }

        .tables table {
            width: 100%;
            padding-right: 100px;
            padding-left: 100px;

        }

        .cheque th {
            padding: 10px;
        }

        #depo {
            background-color: rgb(84, 206, 98);
            padding: 10px;
            text-transform: capitalize;
            border-radius: 10px;
            width: 70px;
            outline: none;
            border: none;
            cursor: pointer;
            font-weight: 700;
        }

        .div0 {
            margin-bottom: 20px;
        }

        #rej {
            background-color: red;
            padding: 10px;
            text-transform: capitalize;
            border-radius: 10px;
            background-color: rgb(246, 45, 81);
            width: 70px;
            outline: none;
            border: none;
            cursor: pointer;
            font-weight: 700;
        }

        h3 {
            color: black;
            padding: 20px;
            text-align: center;
            text-transform: capitalize;
        }

        .div0 i {
            color: black;
            margin-right: 5px;
        }

        .div1 {
            display: flex;
        }

        .warn {
            padding: 15px;
            width: 200px;
            height: 50px;
            background-color: rgb(255, 193, 7);
            color: #fff;
            margin-left: 220px;
            margin-top: 5px;
            border: none;
            outline: none;
            text-align: center;
            font-size: 15px;
            border-radius: 10px;
            cursor: pointer;

        }

        .Hold {
            padding: 15px;
            width: 200px;
            height: 50px;
            background-color: rgb(220, 53, 69);
            color: #fff;
            margin-left: 20px;
            margin-top: 5px;
            border: none;
            outline: none;
            text-align: center;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;


        }

        .report {
            padding: 15px;
            width: 200px;
            height: 50px;
            font-size: 15px;
            background-color: rgb(0, 123, 255);
            color: #fff;
            margin-left: 20px;
            margin-top: 5px;
            cursor: pointer;
            border: none;
            outline: none;
            text-align: center;
            border-radius: 10px;
        }

        .div1 button i {
            padding-right: 5px;
        }

        .change_credit_time {
            margin-left: 200px;
            margin-top: 5px;
            width: 300px;
            /* height: 200px; */
            background-color: white;
            border: 1px solid black;
            color: black;
            text-align: center;
            padding: 10px;
            display: none;
        }

        .change_credit_time p,
        button,
        input {
            color: black;
        }

        .buttonss {
            display: block;
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .buttonss button {
            margin-right: 10px;
            border-radius: 20px;
            padding: 1px 5px;
            color: white;
            background-color: #184A78;
        }

        #current_credit_period {
            /* margin-left:20px; */
            margin-top: 10px;
        }

        #new_credit_time_p {
            /* margin-left:40px; */
            margin-top: 10px;
        }

        #new_credit_time_input {
            /* margin-left:110px; */
            height: 20px;
            margin-top: 10px;
            width: 50px;
        }

        .center {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100vh;
            /* background-color: blue; */
            display: flex;
            justify-content: center;
        }

        .send_message_div {
            position: absolute;
            top: 100px;
            width: 400px;
            height: 300px;
            background-color: white;
            border: 4px solid #184A78;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            visibility: hidden;
        }

        .subject_of_message {
            color: #184A78;
            margin-top: 30px;
            align-self: center;
        }

        .input_of_subject {
            width: 250px;
            height: 40px;
            /* background-color: blue; */
            align-self: center;
        }

        .message_of_message {
            color: #184A78;
            align-self: center;
        }

        .input_of_message {
            width: 250px;
            height: 100px;
            /* background-color: blue; */
            align-self: center;
        }

        .hold_customer_div {
            position: absolute;
            top: 160px;
            width: 400px;
            height: 250px;
            background-color: white;
            border: 4px solid #184A78;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            visibility: hidden;
        }

        .reason_hold_cus {
            color: #184A78;
            align-self: center;
            margin-top: 25px;
        }

        .message_hold_cus {
            align-self: center;
            width: 300px;
            height: 100px;
        }

        .confirm_hold_cus {}

        .close_hold_cus {}
    </style>
</head>

<body>



    <div class="popup_send_warning">
        <div class="send_warning_message">
            <form action="#" method="post"></form>
            <label for="" class="cus_id">Customer Id : 0001</label>
            <label for="" class="cus_name">Customer Name : Kamal</label>
            <label for="" class="message_label">Message : </label>
            <textarea name="message" rows="5" cols="50" placeholder="Type Message Here..." class="message_input"></textarea>
            <input type="submit" name="submit" class="submit">
        </div>
    </div>

    <div class="popup_update_status">
        <div class="update_status_form">
            <form action="#" method="post">

                <label for="">Current Status : </label>
                <input type="text" name="current_status" value="Active" readonly>

                <label for="">New Status : </label>
                <input type="text" name="new_status" placeholder="New Status">

                <label for="">Reason : </label>
                <textarea name="message" rows="5" cols="50" placeholder="Type reason Here..." class="message_input"></textarea>

                <input type="submit" name="submit" class="submit">
            </form>
        </div>
    </div>


    </div>

    <div class="containers">
        <div class="detail">
            <!--begining header details -->
            <div class="div0">
                <label for=""><i class="fas fa-id-card-alt"></i><span id="cus_id"> HC001</span>
                </label>
                <label for=""><i class="fas fa-store"></i><span id="shop_name">Pubudu Store</span> </label>
                <label for=""><i class="fas fa-phone-alt"></i><span id="tele">0764567898</span> </label>
                <label for=""><i class="fas fa-map-pin"></i><span id="address">Kairawa Road,Anuradhapura</span> </label>

            </div>
            <div class="div1">
                <div class="credit"><label for="">Credit Period</label>

                    <input type="text" value="2 weeks" id="credit" class="credit_input" readonly>
                    <button id="cred"><i class="fas fa-pen"></i>Change</button>

                    <!-- popup message to credit time change -->
                    <div class="change_credit_time">

                    </div>
                </div>


            </div>
            <!-- ending of header details -->
            <div class="cards">

                <div class="card">
                    <p><i class="fas fa-route"></i><br>ROUTE</p>
                    <p id="top" class="route_card">R1</p>
                </div>

                <div class="card">
                    <p><i class="fas fa-money-bill-alt"></i><br>OVERDUE PAYMENTS</p>
                    <p id="top" class="overdue_payments_card">10</p>
                </div>

                <div class="card">
                    <p><i class="fas fa-money-bill-alt"></i><br>PENDING PAYMENTS</p>
                    <p id="top" class="pending_payments_card">10</p>
                </div>

                <div class="card">
                    <p><i class="fas fa-money-check-alt"></i><br>RETURNED CHEQUES</p>
                    <p id="top" class="return_cheques_card">10</p>
                </div>

                <div class="card">
                    <p><i class="fas fa-globe"></i><br>STATUS</p>
                    <p id="top" class="status_card">active</p>
                </div>

                <div class="card">
                    <p><i class="fas fa-hourglass-start"></i><br>CREDIT PERIOD</p>
                    <p id="top" class="credit_period_card">2 weeks</p>
                </div>
            </div>
            <!-- ending of card details -->

            <div class="tables">
                <div class="cheque">
                    <h3> Pending Cheques</h3>
                    <table>

                        <thead>
                            <th>cheque Id</th>
                            <th>Bank</th>
                            <th>Amount</th>
                            <th>Deposite date</th>
                            <!-- <th colspan="2">Change staus</th> -->
                        </thead>

                        <tbody id="pending_cheques"></tbody>


                        <!-- <tr>
                            <td>001</td>
                            <td>Bank Of ceylon</td>
                            <td>12 000</td>
                            <td>30.12.2021</td>
                            <td><button id="depo">Deposit</button></td>
                            <td><button id="rej">reject</button></td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Bank Of ceylon</td>
                            <td>12 000</td>
                            <td>30.12.2021</td>
                            <td><button id="depo">Deposit</button></td>
                            <td><button id="rej">reject</button></td>
                        </tr> -->

                    </table>



                </div>


                <div class="orders">
                    <h3>Pending Orders</h3>
                    <table id="t1">
                        <thead>
                            <th>ORDER NO</th>
                            <th>AMOUNT</th>
                            <th>DATE</th>
                        </thead>
                       <tbody id="tbody_pending_orders"></tbody>
                    </table>

                </div>

                <div class="payments">
                    <h3>Pending Payments</h3>
                    <table>
                        <thead>
                            <th>ORDER NO</th>
                            <th>AMOUNT</th>
                            <th>DELIVERY NO</th>
                            <th>DATE</th>
                        </thead>
                        <?php

                        for ($i = 0; $i < 4; $i++) {
                            echo '<tr>
                            <td>001</td>
                            <td>1000</td>
                            <td>001</td>
                            <td>30.12.2021</td>
                            </tr>';
                        }

                        ?>

                    </table>


                </div>


            </div>
        </div>
    </div>
    <!-- div for center the popup messages -->
    <div class="center">
        <!-- <div class="send_message_div"></div> -->
    </div>

    <script>
        let sidebar1 = document.querySelector('.sidebar');
        let header = document.querySelector('.header');
        let containers = document.querySelector('.containers');

        center = document.querySelector('.center');

        //view reports

        //send message

        let send_message_div = document.createElement('DIV');
        send_message_div.classList.add("send_message_div");
        center.appendChild(send_message_div);

        let subject_of_message = document.createElement('p');
        subject_of_message.classList.add("subject_of_message");
        send_message_div.appendChild(subject_of_message);
        subject_of_message.innerHTML = `Subject : `;

        let input_of_subject = document.createElement('INPUT');
        input_of_subject.classList.add("input_of_subject");
        send_message_div.appendChild(input_of_subject);


        let message_of_message = document.createElement('P');
        message_of_message.classList.add("message_of_message");
        send_message_div.appendChild(message_of_message);
        message_of_message.innerHTML = `Message : `;

        let input_of_message = document.createElement('INPUT');
        input_of_message.classList.add("input_of_message");
        send_message_div.appendChild(input_of_message);

        let buttonss = document.createElement('DIV');
        buttonss.classList.add("buttonss");
        send_message_div.appendChild(buttonss);

        let send_button = document.createElement('BUTTON');
        send_button.classList.add("send_button");
        buttonss.appendChild(send_button);
        send_button.innerHTML = `Send`;

        let close_button = document.createElement('BUTTON');
        close_button.classList.add("close_button");
        buttonss.appendChild(close_button);
        close_button.innerHTML = `Close`;
        close_button.setAttribute("onclick", "close_the_msg()")

        function close_the_msg() {
            send_message_div.style.visibility = "hidden";
            sidebar1.style.opacity = "100%";
            header.style.opacity = "100%";
            containers.style.opacity = "100%";
        }

        function open_the_message() {
            send_message_div.style.visibility = "visible";
            sidebar1.style.opacity = "30%";
            header.style.opacity = "30%";
            containers.style.opacity = "30%";
        }



        //hold customers
        let hold_customer_div = document.createElement('DIV');
        hold_customer_div.classList.add("hold_customer_div");
        center.appendChild(hold_customer_div);

        let reason_hold_cus = document.createElement('p');
        reason_hold_cus.classList.add('reason_hold_cus');
        hold_customer_div.appendChild(reason_hold_cus);
        reason_hold_cus.innerHTML = `Reason Of Hold : `;

        let message_hold_cus = document.createElement('INPUT');
        message_hold_cus.classList.add('message_hold_cus');
        hold_customer_div.appendChild(message_hold_cus);

        let buttons_hold_cus = document.createElement('DIV');
        buttons_hold_cus.classList.add("buttonss");
        hold_customer_div.appendChild(buttons_hold_cus);

        let confirm_hold_cus = document.createElement('BUTTON');
        confirm_hold_cus.classList.add("confirm_hold_cus");
        buttons_hold_cus.appendChild(confirm_hold_cus);
        confirm_hold_cus.innerHTML = `Confirm`;

        let close_hold_cus = document.createElement('BUTTON');
        close_hold_cus.classList.add("close_hold_cus");
        buttons_hold_cus.appendChild(close_hold_cus);
        close_hold_cus.innerHTML = `Close`;
        close_hold_cus.setAttribute("onclick", "close_func_hold_cus()");

        function close_func_hold_cus() {
            hold_customer_div.style.visibility = "hidden";
            sidebar1.style.opacity = "100%";
            header.style.opacity = "100%";
            container.style.opacity = "100%";
        }

        function open_func_hold_cus() {
            hold_customer_div.style.visibility = "visible";
            sidebar1.style.opacity = "30%";
            header.style.opacity = "30%";
            container.style.opacity = "30%";
        }
    </script>

    <script>
        //get html elements to js
        //headre elements
        customer_id = document.getElementById('cus_id');
        shop_name = document.getElementById('shop_name');
        tele = document.getElementById('tele');
        address = document.getElementById('address');

        //credit period
        credit_period = document.getElementById('credit');
        credit_input = document.querySelector('.credit_input');

        //button to change credit period pop up
        popup_change_credit_period = document.getElementById('cred');

        //access cards from js
        route = document.querySelector('.route_card');
        overdue_payments = document.querySelector('.overdue_payments_card');
        pending_payments = document.querySelector('.pending_payments_card');
        return_cheques = document.querySelector('.return_cheques_card');
        status = document.querySelector('.status_card');
        credit_period = document.querySelector('.credit_period_card');

        //in change credit period popup
        let current_credit_period = document.createElement('P');
        current_credit_period.id = "current_credit_period";

        let new_credit_time_p = document.createElement('P');
        new_credit_time_p.id = "new_credit_time_p";

        let new_credit_time_input = document.createElement('INPUT');
        new_credit_time_input.id = "new_credit_time_input";

        let buttons = document.createElement('P');
        buttons.classList.add("buttonss");

        let change = document.createElement("BUTTON");
        change.setAttribute("onclick", "change_credit_period()");
        change.id = "change_btn";

        let cancel = document.createElement('BUTTON');
        cancel.setAttribute("onclick", "cancel_window()");
        cancel.id = "change_btn";

        //html elements that want to change credit time
        change_credit_time = document.querySelector('.change_credit_time');

        // assign cus id to js variable
        let cus_id = '<?php echo $this->cus_id; ?>';

        //load change credit time popup
        const load_change_credit_time_popup = () => {

            change_credit_time.innerHTML = ``;

            current_credit_period.innerHTML = `Current Credit Period : `;
            change_credit_time.appendChild(current_credit_period);

            new_credit_time_p.innerHTML = `New Credit Period(weeks) `;
            change_credit_time.appendChild(new_credit_time_p);

            change_credit_time.appendChild(new_credit_time_input);

            change_credit_time.appendChild(buttons);

            change.innerHTML = `change`;
            cancel.innerHTML = `cancel`;

            buttons.appendChild(change);
            buttons.appendChild(cancel);
        }

        load_change_credit_time_popup();

        //    load page function
        const load_page = (cus_id) => {
            fetch('http://localhost/web-Experts/public/admin/load_cus_view', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },

                    body: JSON.stringify(cus_id)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    //fill header elements in the view
                    customer_id.innerHTML = `${data['cus_id']}`;
                    shop_name.innerHTML = `${data['shop_name']}`;
                    tele.innerHTML = `${data['tel']}`;
                    address.innerHTML = `${data['address']}`;

                    //fill credit period
                    credit_input.value = `${data['credit_time']} weeks`;

                    //fill cards
                    route.innerHTML = `${data['route_name']}`;
                    overdue_payments
                    pending_payments
                    return_cheques
                    status.innerHTML = `${data['active']}`;
                    credit_period.innerHTML = `${data['credit_time']} weeks`;

                    //fill change credit period popup
                    current_credit_period.innerHTML += `${data['credit_time']} weeks`;
                });
        }

        // run load page function
        load_page(cus_id);

        //to pop up the change credit period div
        popup_change_credit_period.addEventListener("click", () => {
            change_credit_time.style.display = "block";
            load_change_credit_time_popup();

        });

        //created yes no buttons on confirm credit period
        let yes = document.createElement("BUTTON");
        let no = document.createElement("BUTTON");


        //confirmation msg to change credit time
        const confirm_change = () => {

            let new_time = new_credit_time_input.value;

            change_credit_time.innerHTML = `Are you sure to change credit time to ${new_time} weeks?`;
            let buttons_confirm = document.createElement('DIV');
            buttons_confirm.classList.add("buttonss");

            change_credit_time.appendChild(buttons_confirm);
            buttons_confirm.appendChild(yes);
            buttons_confirm.appendChild(no);

            yes.innerHTML = `YES`;
            no.innerHTML = `NO`;
        }

        //change credit period
        const change_credit_period = () => {
            console.log('pressed the change button : ' + new_credit_time_input.value);
            confirm_change();

        }

        //cancel the window
        const cancel_window = () => {
            console.log('pressed the cancel button');

            change_credit_time.style.display = "none";
        }

        yes.addEventListener("click", () => {
            console.log("confirmed");

            let data_set = {
                cus_id: cus_id,
                new_time: new_credit_time_input.value
            }
            fetch('http://localhost/web-Experts/public/admin/change_credit_time', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    //to refresh with new credit time
                    if (data[1] == true) {
                        load_page(cus_id);
                    }
                });

            change_credit_time.style.display = "none";
        });

        no.addEventListener('click', () => {
            console.log('not confirmed');

            change_credit_time.style.display = "none";
        });
    </script>

    <script>

        pending_orders = document.getElementById('tbody_pending_orders');
        pending_cheques = document.getElementById('pending_cheques');
        //load tables
        function load_tables() {
            let cus_id = "<?php echo $_GET['cus_id'] ?>";
            console.log(cus_id);
            fetch('http://localhost/web-Experts/public/admin/load_customer_tables', {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(cus_id),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    for(let i = 0 ; i < data[0].length ; i++){
                        pending_orders.innerHTML += `<tr><td>${data[0][i]['order_id']}</td><td>${data[0][i]['amount']}</td><td>${data[0][i]['date']}</td></tr>`;

                    }

                    for(let j = 0 ; j < data[1].length ; j++){
                        pending_cheques.innerHTML += `<tr><td>${data[1][j]['payment_id']}</td><td>${data[1][j]['bank']}</td><td>${data[1][j]['amount']}</td><td>${data[1][j]['date']}</td></tr>`;
                    }
                });
        }

        load_tables();
    </script>


</body>

</html>