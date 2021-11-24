<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Report</title>
</head>

<body>
    <div class="cus-rep-con">
        <div class="sub-cus-rep-con">
            <h2>Customer Summary Report</h2>
            <div class="select">
                <label for="">Select Year</label>
                <select id="ddlYears"></select>
                <label for="">Select Month</label>
                <select id="ddlMonth">
                    <option>month</option>
                    <option value="01">January</option>
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
                <div class="view-but">
                    <button id="view-but-rep">View Report</button>
                </div>


            </div>

            <div class="report-body">











            </div>


        </div>
    </div>
</body>
<script type="text/javascript">
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




    function getyearReport(){
        



    }
</script>

</html>