<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="../../public/styles/report.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
</head>
<body >
    <div class="header">
        <?php
        require 'view_headertype2.php';
        ?>

    </div>
    <div class="container">
    <div class="print">
    <button id="print">Print</button>
    </div>
    
    <div class="report">
               <div class="report_type"><label for="">Report Type</label>
               <select name="types" id="types">
                <option value="">Sales Report</option>
                <option value="">customer payment report</option>
                <option value="">overall business summary report</option>
                <option value="">stock summary report</option>
                <option value="">overall returns report</option>
                <option value="">sales target report</option>
                </select>

               
    
</div>

    </div>
    <div class="graph">
    <canvas id="myChart"></canvas>
    </div>
    <div class="table">

    <div class="table-wrapper">
      <table class="fl-table">
        <thead>
          <tr>
            <th>Route</th>
            <th>Shop</th>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
          <tr>
            <td>Route</td>
            <td>Shop</td>
          </tr>
        </thead>
        <tbody class="orders">
      
     
        <tbody>
      </table>
    </div>

    </div>
    <button id="back">back</button>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: '# of Sales',
                    data: [5, 16, 8, 22, 10, 20],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>