<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/customer_report.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>Document</title>
    <style>
        /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
    margin:0;
    padding:0;
    font-family: "Poppins" , sans-serif;
    
}
        /* .table{
            width:100px;
            height: 100px;
            background-color: blue;
        } */
.section{
    margin-top: 30px;
    width: 100%;
    display: flex;
    /* background-color: ; */
    justify-content: center;
    /* height: 300px; */
}



.table-info{
    padding: 30px;
    
    width: 100%;
    /* border:3px solid; */

}

.table-info tr{
background-color: grey;
padding: 10px;
}
.table-info th{
    text-align: center;
    background-color: #188887;
    padding: 10px;
}
.table-info td{
    text-align: center;
    padding: 10px;
}

        #report-title{
            margin-top: 30px;
            text-align: center;
            font-size: 30px;
            text-transform: uppercase;
        }
        .card-section{
            width: 100%;
            /* height: 500px;
            background-color: red; */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .card_div{
            width: 250px;
            border-radius: 10px;
            height: 250px;
            /* background-color: red; */
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            /* border:3px solid grey; */
            box-shadow: 10px 10px 10px 10px rgba(0,0,0,0.1);

        }

        .card_con_div{
            width: 250px;
            height: 100px;
            background-color: grey;

        }
        .card_con_div2{
            width: 250px;
            height: 150px;
            background-color: #fff;

        }
#heading{
    color: black;
    text-transform: uppercase;
    text-align: center;
    margin-top: 20px;
    font-size: 20px;
}

#count{
    color: green;;
    text-align: center;
    margin-top: 20px;
    font-size: 35px;
    font-weight: 800;
}
        .icon_div{
            font-size: 50px;
            color: #fff;
            margin-top: 10px;
           
            text-align: center;
        }


        .no-data h3{
background-color: red;
        }
    </style>
</head>

<body>
<?php  $month= $this->added; 
$year=$this->added1;
$type=$this->added2;
  ?>
    <div class="container">
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
        function select_report(report_type, year, month){
        
        my_report.customer_summary(year, month);
        }

        select_report('customer_report', year, month);
    </script>
  
</body>
</html>