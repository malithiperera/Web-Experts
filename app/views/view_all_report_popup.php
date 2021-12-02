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
        select {
            width: 250px;
            height: 30px;
            outline: black 2px solid;

        }

        input {
            width: 250px;
            margin-bottom: 20px;
            background-color: transparent;
            outline: black 2px solid;
            color: black;

        }

        .view-report-container {
            width: 500px;
            height: 500px;
            margin-left: 600px;
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
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="view-report-container">
        <h3>Select Your Report Type</h3>
        <form action="../reports/reports" method="GET">
            <div class="report-select">
                <div class="type1">
                    <label for="type">Report Type:</label>
                    <br>
                    <select id="type" name="type">
                        <!-- <option value="salesreport">Customer Summary</option> -->
                        <!-- <option value="ProductSalereport">Product Sale report</option>
              <option value="ReturnReport">Return Report</option>
              <option value="Productreport">Product report</option> -->
                    </select>
                    <select id="cat" name="cat" onchange="myFunction()">
                        <option value="year">Yearly</option>
                        <option value="month">Monthly</option>
                        <!-- <option value="ProductSalereport">Product Sale report</option>
              <option value="ReturnReport">Return Report</option>
              <option value="Productreport">Product report</option> -->
                    </select>
                </div>
                <div class="select1">
                    <label for="">Select Year</label>
                    <br>
                    <select id="ddlYears" name="year"></select>
                    
                </div>
                <div class="select">
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
                <div class="view-button">
                        <input type="submit" value="submit">
                    </div>
        </form>
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

  if(x=='month'){
      console.log(x);
      select.style.visibility = "visible";
      console.log(month.value);
  }

  else{
    select.style.visibility = "hidden"
    console.log(month.value);
    month.value=0;
    console.log(month.value);
   
    
;  }
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
    </script>


</body>

</html>