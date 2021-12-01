<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table{
            width:100px;
            height: 100px;
            background-color: blue;
        }
    </style>
</head>

<body>
    <div class="container">

    </div>

    <script src="../../public/java script/view_all_report.js"></script>

    <script>
        let my_report = new report;
        function select_report(report_type, year, month){
        
        my_report.customer_summary(year, month);
        }

        select_report('customer_report', 2001, 10);
    </script>
</body>
</html>