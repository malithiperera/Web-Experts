<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../public/styles/view_stockManager_viewStocks.css"> -->
    <link rel="stylesheet" href="../../public/styles/view_stockManager_requestedRepList.css">
    <link rel="stylesheet" href="../../public/styles/view_stockmanager_repRequest.css">
    <title>Document</title>
    <style>
        .container {
            /* background-color: blue; */
            display: flex;
            flex-direction: column;
            width: 100%;
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
          width: 100%;
            border-radius: 10px;
            /* background-color: white; */
        }

        .list {
            height: auto;
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 200px;

            /* background-color: red; */
        }

        .rep_request {
            display: flex;

        }

        .view_list_rep{
            /* display: flex; */
            justify-content: center;
            width: 100%;
            margin-left: 50px;
        }
        .view_list_rep tr{
            padding: 20px;
        }
        .view_list_rep td{
            padding: 10px;
        }

        #date_id{
            /* margin-top: 90px; */
            font-size: 24px;
        }
        #view_but{
            text-decoration: none;
            width: 300px;
            height: 20px;
            padding: 5px;
            margin: 20px;
            background-color: green;
            color: #fff;
        }

        #filter_table_input{
            text-align: center;
            margin-top: 40px;
            width: 80%;
            margin-left: 200px;
            height: 40px;
            background-color: lavender;
            border: 1px solid black;
        }
    </style>
</head>
<?php
    $currentDate = new DateTime();
    // echo $currentDate->format('Y-m-d H:i:s');
?>
<body>

    <div class="container">
       
        <div class="details">
       
            <!-- <div class="route">
                <p>Route : </p>
            </div> -->

            <div class="date">
                <p id="date_id">Date : <?php echo $currentDate->format('Y-m-d')?></p>
              
            </div>
        </div>
        
        <div class="search_bar_div">
            <div class="search_bar">
            <input type="text" name="" id="filter_table_input" value="" onkeyup="filter_table()" placeholder="Enter sales rep name">
            </div>
        </div>
        <div class="list">
            <table id="view_list_rep" class="fl-table">
                <thead>
                    <tr></tr>
                    <th>Request id</th>
                    <th>Rep id</th>
                    <th>Rep name</th>
                    <th>Rep name</th>

                </tr>

                    
                </thead>


            </table>

        </div>
    </div>

    <script>
        let list = document.getElementById('view_list_rep');


        // console.log ("test")
        const getRepList = () => {
            fetch('http://localhost/web-Experts/public/stockManager/getRepList_cont', {})
                .then(response => response.json())
                .then(data => {

                    for (let i = 0; i < data.length; i++) {
                        

                        list.innerHTML+=`<tr><td>${data[i]['issue_id']}</td><td>${data[i]['rep_id']}</td><td>${data[i]['name']}</td><td><a href="../issue/issue_list?reqid=${data[i]['issue_id']}" id="view_but">view</a></td></tr>`


               
                    }


                    console.log(data)

                })

        }


        getRepList()


        // function show_list($issue_id){
        //     console.log($issue_id)
        //     fetch('http://localhost/web-Experts/public/issue/view_issue_list', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify($issue_id)
        // })
        // .then(response => response.json())
        // .then(data => {
        //     console.log(data);
           
        //     });
      

        // }

        function filter_table(){
            console.log("Heloooo")

            let input=document.getElementById('filter_table_input');
            let filter=input.value.toUpperCase();
            let table=document.getElementById('view_list_rep');
            let tr=table.getElementsByTagName("tr");
            for(let i=0;i<tr.length;i++){
                td=tr[i].getElementsByTagName("td")[2]
                if(td){
                let txtvalue=td.innerHTML;
                if(txtvalue.toUpperCase().indexOf(filter)>-1){
                    tr[i].style.display="";
                    console.log(txtvalue.toUpperCase().indexOf(filter));
                }
                else{
                    tr[i].style.display="none";
                }

            }
           
            }
        }
    </script>
</body>

</html>