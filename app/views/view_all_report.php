<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="../../public/styles/customer_report.css">
    <link rel="stylesheet" href="../../public/styles/report_print.css"  type="text/css" media="print">

    <title>Document</title>
    
</head>

<body>
    <?php $month = $this->added;
    $year = $this->added1;
    $type = $this->added2;
    ?>
    <div class="container">
        <button onclick="window.print()" id="print">Print the report</button>
        <h2 id="report-title"></h2>
        <div class="card-section">

        </div>


    </div>

    <script src="../../public/java script/view_all_report.js"></script>

    <script>
        <?php
        echo "var month ='$month';";
        echo "var year ='$year';";
        echo "var type ='$type';";
        ?>


        let my_report = new report;

        function select_report(report_type, year, month) {

            my_report[type](year, month);
            //my_report.sales_summary(year,month);
            // my_report.return_report(year,month);
        }

        select_report('customer_report', year, month);
    </script>

</body>

</html>