<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=.view, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Document</title>
    <style>
        select{
            width: 200px;
            height: 30px;
        }
        input{
            width: 200px;
        }
        .view-report-container{
            width: 400px;
            height: 300px;
            background-color: #fff;
            border: 3px solid #184A78;
            border-radius: 10px;
        }
        h3{
            text-align: center;
        }
        .report-select{
            display: flex;
            flex-direction: column;
            margin-left: 100px;
            justify-content: space-evenly;
        }
        #report-button{
            margin-top: 20px;
            width: 200px;
            outline: none;
            border: none;
            height: 40px;
            cursor: pointer;
            border-radius: 5px;
            background-color: rgb(84,206,98)
        }
        i{
            padding-right: 10px;
        }
         
      
    </style>
</head>

<body>
    <div class="view-report-container">
        <h3>Select Your Report Type</h3>
        <form action="">
            <div class="report-select">
            <div class="type">
            <label for="type">Report Type:</label>
            <br>
            <select id="type" name="type">
              <option value="salesreport">Sales Report</option>
              <option value="ProductSalereport">Product Sale report</option>
              <option value="ReturnReport">Return Report</option>
              <option value="Productreport">Product report</option>
            </select>
            </div>
            <div class="frame">
            <label for="frame">Frame:</label>
            <br>
            <select id="frame" name="frame" value="Reports">
              <option value="biweeky">Biweekly</option>
              <option value="monthly">Monthly</option>
              <option value="yearly">Yearly</option>
              </select>
              </div>
              <div class="duration">
            <label for="date">Duration:</label>
            <br>
            <input type="date" id="date">
            </div>
            
            
            <div class="view-button">
                <button id="report-button"><i class="fas fa-eye"></i>View report</button>
            </div>
        </div>
            </form>
    </div>
</body>
</html>