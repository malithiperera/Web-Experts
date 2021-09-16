<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>View Report</title>
    <link rel="stylesheet" href="../../public/styles/view_customer_viewreport.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sales', 'product'],
          ['Himalee Ice cream',     110],
          ['Yoghurt',      80],
          ['Special Curd',  90],
          ['Fresh Milk', 170],
          ['Yelly Yoghurt',    90]
        ]);

        var options = {
          title: 'Sales Summary',
          'backgroundColor': 'transparent'

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>




</head>
<body>
    <div class="header">
    <?php
        require 'view_headertype2.php';
        ?>
    
    </div>
    <div class="container">

<div class="left-sub">
<div id="piechart"></div>
</div>

<div class="right-sub">
    <h2>Summary reports</h2>
<form action="">
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




</form>

<button>View Report</button>
</div>


    </div>
    <div class="footer">
        <?php
        require 'view_footer.php';
        ?>
    </div>
</body>
</html>