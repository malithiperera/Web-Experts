<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=.view, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Document</title>
    <style>
        .select_report {
        position: fixed;
        top: 70px;
        width: 100%;
        display: flex;
        justify-content: center;
    }
        .report-select select {
            width: 250px;
            height: 30px;
            outline: black 2px solid;
            color: black;

        }

        .report-select input {
            width: 250px;
            margin-bottom: 20px;
            background-color: transparent;
            outline: black 2px solid;
            color: black;

        }

        .view-report-container {
            width: 500px;
            height: 600px;
            /* temperary commented */
            /* margin-left: 600px; */
            background-color: #fff;
            border: 3px solid #184A78;
            border-radius: 10px;
        }

        h3 {
            margin-top: 40px;
            margin-bottom: 30px;
            text-align: center;
        }

        .report-select {
            display: flex;
            flex-direction: column;
            margin-left: 120px;
            justify-content: space-evenly;
        }

        #report-button {
            margin-top: 20px;
            width: 250px;
            outline: none;
            border: none;
            height: 40px;
            cursor: pointer;
            border-radius: 5px;
            background-color: rgb(84, 206, 98)
        }

        i {
            padding-right: 10px;
        }

        #frame {
            margin-bottom: 20px;
        }

        #type {
            margin-bottom: 20px;
        }


        .select{
            visibility: hidden;
        }
        .view-button{
            margin-top: -30px;
        }
        #duration1{
            visibility: hidden;
        }

        #submit-but{
            background-color: #184A78;
            outline: none;
            border: none;
            padding: 10px;
            color: #fff;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

       .view-report-container option{
            color: black;
        }
        #close{
            border-radius: 10px;
            margin-right: 0px;
            margin-left: 430px;
            width: 50px;
            height: 40px;
            background-color: #184A78;


        }
        .view-report-container label{
            color: black;
        }
    </style>
</head>

<body>
    <div class="view-report-container">
        <!-- <div class="close">
            <button id="close" onclick="close_pop_up()">close</button>
        </div> -->
        <h3>Select Your Report Type</h3>
        <form action="../reports/reports" method="POST">
            <div class="report-select">
                <div class="type1">
                    <label for="type">Report Type:</label>
                    <br>
                    <select id="type" name="type">
                     
                    </select>
                    <select id="cat" name="cat" onchange="myFunction()" id="cat">
                        <option value="year">Yearly</option>
                        <option value="month">Monthly</option>
                        <option value="duration">Duration</option>
               
                    </select>
                </div>
                <div class="select1">
                    <label for="">Select Year</label>
                    <br>
                    <select id="ddlYears" name="year"></select>
                    
                </div>
                <div class="select-1">
                <label for="">Select Month</label>
                <br>
                    <select id="ddlMonth" name="month">
                        <option value="0">month</option>
                        <option value="1">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>


                    </select>
                    </div>

                <div id="duration1" class="duration1">
                    <div>
                    <label for="start">Start date:</label>
                    <br>

<input type="date" id="start" name="startdate" >
                    </div>
                
                    
              
                   <div>
                   <label for="start">End date:</label>
                   <br>

<input type="date" id="start" name="enddate">

                   </div>
                
                </div>
                <div class="view-button">
                        <input type="submit" value="submit" id="submit-but">
                      
                    </div>
                   
    </div>

    <script>
        window.onload = function() {
            //Reference the DropDownList.
            var ddlYears = document.getElementById("ddlYears");
            var ddlMonth = document.getElementById("ddlMonth");

            //Determine the Current Year.
            var currentYear = (new Date()).getFullYear();

            //Loop and add the Year values to DropDownList.
            for (var i = currentYear; i >= 2010; i--) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYears.appendChild(option);
            }

            
        };
        
      

        function myFunction() {
  var x = document.getElementById("cat").value;
  var select=document.querySelector('.select');
  var select1=document.querySelector('.select1');
  var month=document.getElementById('ddlMonth');
  var years=document.getElementById('ddlYears');
  var duration1=document.getElementById('duration1');

  if(x=='month'){
      console.log(x);
      select.style.visibility = "visible";
      duration1.style.visibility="hidden";
      select1.style.visibility="visible";
      console.log(month.value);
  }
else if(x=='duration'){
    select.style.visibility = "hidden";
   duration1.style.visibility="visible";
   select1.style.visibility="hidden";
   duration1.style.marginTop="-80px";
   

}
  else{
    select.style.visibility = "hidden"
    select1.style.visibility = "visible"
    duration1.style.visibility="hidden";
    console.log(month.value);
    month.value=0;
    console.log(month.value);
   
     }
}


function fill_types(){
  
    fetch('http://localhost/web-Experts/public/reports/get_types')
        .then(response => response.json())
        .then(data => {
          console.log(data);
          for (var i = 0; i <=data.length; i++) {
                var option1 = document.createElement("OPTION");
                option1.innerHTML = data[i]['report_name'];
                option1.value = data[i]['report_name'];
                type.appendChild(option1);
            }
         

        });

}

fill_types();



function submitform(){

    var type=document.getElementById('cat').value;
    console.log(type);


    fetch('http://localhost/web-Experts/public/reports/get_types')
}


//close pop up
function close_pop_up(){

    var view_report_container=document.querySelector('.view-report-container');
    view_report_container.style.visibility="hidden";


}
    </script>


</body>

</html>