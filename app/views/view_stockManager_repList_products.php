<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Home </title>
    <link rel="stylesheet" href="../../public/styles/view_rep_Home.css">
    <link rel="stylesheet" href="../../public/styles/view_customer_ourproduct.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/styles/sketch.css">
    <link rel="stylesheet" href="../../public/styles/view_stockmanager_repRequest.css">

</head>
<style>
    .pop-up-suc {
        width: 100%;
        /* background-color: red; */
        height: 900px;
        margin-top: -900px;
        display: flex;
        justify-content: center;
        visibility: hidden;
        /* z-index: -1; */
    }
    
    .suceesful_pop{

        width: 40%;
        /* background-color: #fff; */
        height: 400px;
        margin-top: -300px;
        border-radius: 10px;
        /* border: 2px solid black; */
        display: flex;
        justify-content: center;
    }
</style>

<body>

    <div class="sidebar">
        <div class="logo-details">

            <div class="logo_name">Himalee Dairy Product</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">

            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="../stockManager/notification">

                    <a href="../stockManager/moveToNotificationPage">

                        <i class='bx bx-chat'></i>
                        <span class="links_name">Notification</span>
                    </a>
                    <span class="tooltip">Notification</span>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-line"></i>
                    <span class="links_name">View Reports</span>
                </a>
                <span class="tooltip">View Reports</span>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <li>
                <a href="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>

            <li class="profile">
                <div class="profile-details">

                    <div class="name_job">
                        <div class="name">M.Bandara</div>
                        <div class="job">Stock Manager</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="header">
            <?php require 'view_headertype2.php'; ?>
        </div>

        <div class="container-1">
            <h2>DAILY PRODUCT LIST</h2>
            <br>
            <div class="table-wrapper">
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>edit</th>

                        </tr>
                    </thead>
                    <tbody class="content">

                    </tbody>

                </table>
            </div>
            <br>

            <div class="input-fields"><input type="submit" value="Confirm" id="confirm" onclick="issue_products_save()"></div>
        </div>

        <div class="pop-up-suc">
            <div class="suceesful_pop">
<?php require "view_successfull_pop-up.php"; ?>

            </div>

</div>


    </section>
   





    <script>
        var issue_id = "<?php echo $this->added; ?>";
        var fl_table = document.querySelector('.fl-table');

        console.log(issue_id)

        function show_list() {
            console.log(issue_id)
            fetch('http://localhost/web-Experts/public/issue/view_issue_list', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(issue_id)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    for (let i = 0; i < data.length; i++) {

                        fl_table.innerHTML += `<tr><td>${data[i]['product_id']}</td><td>${data[i]['product_name']}</td>
         <td>${data[i]['requested_qty']}</td><td><input value="${data[i]['requested_qty']}"></td></tr>`;
                    }
                });


        }
        show_list();


        function issue_products_save() {
            var table_data = new Array(fl_table.rows.length - 1);
            console.log(document.querySelector('.fl-table').rows.length)
            for (i = 1; i < fl_table.rows.length; i++) {
                let table_cell = fl_table.rows.item(i).cells;

                table_data[i - 1] = new Array(table_cell.length);

                for (j = 0; j < table_cell.length; j++) {
                    if (j == 3) {

                        table_data[i - 1][j] = table_cell.item(j).children[0].value;
                    } else {
                        table_data[i - 1][j] = table_cell.item(j).innerHTML;
                    }

                    console.log(table_data[i - 1][j])

                }

            }
            console.log(table_data);

            fetch('http://localhost/web-Experts/public/issue/issue_rep', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(table_data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data == true) {
                        var pop_up=document.querySelector('.pop-up-suc');
            pop_up.style.visibility="visible";


                    }

                });

        }

        function hide_popup(){
            var pop_up=document.querySelector('.pop-up-suc');
            pop_up.style.visibility="hidden";
            

        }
    </script>

    <script src="../../public/java script/side_bar.js"></script>
</body>

</html>