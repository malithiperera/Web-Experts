<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>View Report</title>
    <link rel="stylesheet" href="../../public/styles/view_customer_viewreport.css">
</head>
<body>
    <div class="header">
    <?php
        require 'view_headertype2.php';
        ?>
    
    </div>
    <div class="container">

<div class="left-sub">
<h3>This div contains the report</h3>
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