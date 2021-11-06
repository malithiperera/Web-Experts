<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <p>Report Type 1</p>

    <div class="table1"></div>
    <div class="table2"></div>

    <div class="graph1"></div>
    <div class="graph2"></div>

    <div id="barchart_values" style="width: 900px; height: 300px;"></div>

    <script>
        data_set = {

        }

        graph1 = document.querySelector('.graph1');

        const fill_data = () => {
            fetch('http://localhost/Web-Experts/public/login/test_report', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'

                    },

                    body: JSON.stringify(data_set)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                     graph1.innerHTML = parseInt(data[0][0][0]['order_id']);

                     var test = parseInt(data[0][0][0]['order_id']);
                    

                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([

                            
                            ["Element", "Density", {
                                role: "style"
                            }],
                            
                            ["Copper", test, "#b87333"],
                            ["Silver", 10.49, "silver"],
                            ["Gold", 19.30, "gold"],
                            ["Platinum", 21.45, "color: #e5e4e2"]
                        ]);

                        var view = new google.visualization.DataView(data);
                        view.setColumns([0, 1,
                            {
                                calc: "stringify",
                                sourceColumn: 1,
                                type: "string",
                                role: "annotation"
                            },
                            2
                        ]);

                        var options = {
                            title: "Density of Precious Metals, in g/cm^3",
                            width: 600,
                            height: 400,
                            bar: {
                                groupWidth: "95%"
                            },
                            legend: {
                                position: "none"
                            },
                        };
                        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                        chart.draw(view, options);
                    }



                });
        }

        fill_data();
    </script>




</body>

</html>