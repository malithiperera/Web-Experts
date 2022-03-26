class report {
  constructor() {
    this.main = document.querySelector(".container");
    this.card_con = document.querySelector(".card-section");
    this.card_con_1 = document.querySelector(".card-section-3");
    this.report_title = document.getElementById("report-title");
  }

  //customer summary report
  customer_summary(year, month) {
    const month_array = [
      "January",
      "Febraury",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];

    let string_month = this.get_month(month);

    if (month != 0) {
      //orders

      this.order_section = document.createElement("div");
      this.main.appendChild(this.order_section);
      this.order_section.classList.add("section", "cus-section");
      this.order_section.innerHTML = "<h3>Orders Of Month</h3>";
      this.ordertable = document.createElement("table");

      this.order_section.appendChild(this.ordertable);
      this.ordertable.classList.add("table-info");

      //  this.ordertable.innerHTML+='<tr> <th>Order Id</th><th>Order date</th> <th>Amount</th> <th>Status</th>  </tr> '

      //deliveries
      this.delivery_section = document.createElement("div");
      this.main.appendChild(this.delivery_section);
      this.delivery_section.classList.add("section", "cus-section");
      this.delivery_section.innerHTML = "<h3>Deliveries Of Month</h3>";
      this.delivery_table = document.createElement("table");

      this.delivery_section.appendChild(this.delivery_table);
      this.delivery_table.classList.add("table-info");

      this.pay_section = document.createElement("div");
      this.main.appendChild(this.pay_section);
      this.pay_section.classList.add("section", "cus-section");
      this.pay_section.innerHTML = "<h3>Payments Of Month</h3>";
      this.pay_table = document.createElement("table");

      this.pay_section.appendChild(this.pay_table);
      this.pay_table.classList.add("table-info");

      this.report_title.innerHTML =
        "customer summary Monthly Report" + " " + string_month + " " + year;

      var data_set = {
        year: year,
        month: month,
      };

      fetch("http://localhost/web-Experts/public/reports/customer_summary", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data_set),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);
          this.create_card(
            '<i class="fas fa-luggage-cart"></i>',
            "No Of orders",
            data[0][0]["count_orders"]
          );
          this.create_card(
            '<i class="fas fa-truck"></i>',
            "No Of Deliveries",
            data[0][1]["count_delivery"]
          );
          this.create_card(
            '<i class="fas fa-money-bill-alt"></i>',
            "No Of Payment",
            data[0][0]["count_orders"]
          );

          if (data[1].length == 0) {
            console.log("hello");
            this.ordertable.innerHTML += `<div class="no-data"><h3>No Orders in ${string_month}</h3></div>`;
          } else {
            this.ordertable.innerHTML +=
              "<tr> <th>Order Id</th><th>Order date</th> <th>Amount</th> <th>Status</th>  </tr> ";
            var order_body = document.getElementById("new_product");

            let i;

            //orders
            for (i = 0; i < data[1].length; i++) {
              this.ordertable.innerHTML += `
                             
                             <tr>
                             
                             <td class="pro_name">${data[1][i]["order_id"]}</td>
                             <td class="price">${data[1][i]["date"]}</td>
                             <td class="dis">${data[1][i]["amount"]}</td>
                            
                             <td>${data[1][i]["status"]}</td>
                             
                             </tr>
                             
                             `;
            }
          }

          if (data[2].length == 0) {
            this.delivery_table.innerHTML += `<div class="no-data"><h3>No Deliveries in ${string_month}</h3></div>`;
          } else {
            this.delivery_table.innerHTML +=
              "<tr> <th>Deliver Id Id</th><th>Order ID</th> <th>Deliver date</th> <th>Deliver Time</th><th> PaymentStatus</th>   </tr> ";

            //delivery
            let i;
            for (i = 0; i < data[2].length; i++) {
              this.delivery_table.innerHTML += `
                                
                                <tr>
                                
                                <td class="pro_name">${data[2][i]["delivery_id"]}</td>
                                <td class="pro_name">${data[2][i]["order_id"]}</td>
                                <td class="pro_name">${data[2][i]["date"]}</td>
                                <td class="price">${data[2][i]["time"]}</td>
                                <td class="dis">${data[2][i]["status"]}</td>
                               
                                
                                
                                </tr>
                                
                                `;
            }
            if (data[3].length == 0) {
              this.pay_table.innerHTML += `<div class="no-data"><h3>No Payments done in ${string_month}</h3></div>`;
            } else {
              this.pay_table.innerHTML +=
                "<tr> <th>Payment Id</th><th>Order ID</th> <th>Amount(RS.)</th> <th>Method</th><th>Payment status</th>  </tr> ";

              //payment
              let i;
              for (i = 0; i < data[3].length; i++) {
                this.pay_table.innerHTML += `
                                  
                                  <tr>
                                  
                                  <td class="pro_name">${data[3][i]["payment_id"]}</td>
                                  <td class="pro_name">${data[3][i]["order_id"]}</td>
                                  <td class="pro_name">${data[3][i]["amount"]}</td>
                                  <td class="pro_name">${data[3][i]["type"]} Payments</td>
                                  <td class="pro_name">${data[3][i]["overdue_status"]} Payments</td>
                                  
                                  
                                  </tr>
                                  
                                  `;
              }
            }
          }
          console.log(data);
        });
    }

    //yearly customer summary
    else {
      var data_set = {
        year: year,
      };
      fetch(
        "http://localhost/web-Experts/public/reports/customer_summary_year",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data_set),
        }
      )
        .then((response) => response.json())
        .then((data) => {
          console.log(month[5]);
         

          this.report_title.innerHTML =
            " Customer Summary Yearly Report" + " " + year;

          this.create_card(
            '<i class="fas fa-luggage-cart"></i>',
            "No Of orders",
            data[0][0]["count_orders"]
          );
          this.create_card(
            '<i class="fas fa-truck"></i>',
            "No Of Deliveries",
            data[0][1]["count_delivery"]
          );
          this.create_card(
            '<i class="fas fa-money-bill-alt"></i>',
            "No Of Payment",
            data[0][0]["count_orders"]
          );

          console.log(data);
          let result = this.create_dataset_array(data[1]);
          let result1 = this.create_dataset_array(data[2]);
          let result2 = this.create_dataset_array_month(data[3]);
          let result4 = this.create_dataset_array_month(data[4]);
          let result5 = this.create_dataset_array_month(data[5]);

          this.order_section = document.createElement("div");
          this.main.appendChild(this.order_section);
          this.order_section.classList.add("section", "cus-section");
          this.order_section.innerHTML = "<h3>Summary of Year</h3>";
          this.ordertable = document.createElement("table");
          this.ordertable.innerHTML +=
            "<tr> <th>Month</th> <th>Sales Amount(RS.)</th> <th>Returns Amount(RS.)</th><th>Payments Amount(RS.)</th>  </tr> ";
          var order_body = document.getElementById("new_product");

          this.order_section.appendChild(this.ordertable);
          this.ordertable.classList.add("table-info");
          let i;
          for (i = 0; i < 12; i++) {
            this.ordertable.innerHTML += ` <tr>

               <td class="pro_name">${month_array[i]}</td>
               <td class="pro_name">${result2[i][1]}</td>
               <td class="pro_name">${result4[i][1]}</td>
               <td class="pro_name">${result5[i][1]}</td>
              
               </tr>`;
          }

          this.graph_section = document.createElement("div");
          this.main.appendChild(this.graph_section);
          this.graph_section.classList.add("section", "cus-section");
          this.graph_section.innerHTML += "<h3>Delivery And Order Summary</h3>";

          this.graph_section.innerHTML +=
            '<div id="barchart_material" style="width: 80%; height:1000px;"></div>';

          this.bar_charts(result, result1, result4);

          console.log(result1);
        });
    }

    // let message_div = document.createElement('div');
    // message_div.classList.add('table');
    // this.card_con.classList.add('table');
    // this.main.appendChild(message_div);
  }


  //sales summary
  sales_summary(year, month) {
    let string_month = this.get_month(month);

    if (month != 0) {
      console.log(0);
      console.log(month);
      this.report_title.innerHTML =
        " Sales Summary Monthly Report" + " " + string_month + " " + year;

      var data_set = {
        year: year,
        month: month,
      };

      fetch("http://localhost/web-Experts/public/reports/sales_summary", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data_set),
      })
        .then((response) => response.json())
        .then((data) => {

          this.card_con_1.innerHTML=`<ul id="print_list"><li><p>Total Orders : ${data[0][0]['count_orders']}</p></li>
         
          <li><p>Total Orders : ${data[0][1]['count_delivery']}</p></li>
        
          
          
          </ul>`
          console.log(data);

          this.create_card(
            '<i class="fas fa-luggage-cart"></i>',
            "No Of orders",
            data[0][0]["count_orders"]
          );
          this.create_card(
            '<i class="fas fa-truck"></i>',
            "No Of Deliveries",
            data[0][1]["count_delivery"]
          );
          this.create_card(
            '<i class="fas fa-money-bill-alt"></i>',
            "Total Sales(RS.)",
            data[0][2]["SUM(amount)"]
          );

          //create a dataset to pass the graph
          var dataArray_route = [];
          var dataArray_amount = [];
          for (let i = 0; i < data[1].length; i++) {
            dataArray_route.push(data[1][i]["route_id"]);
            dataArray_amount.push(data[1][i]["sum(orders.amount)"]);
          }
          var data_array = [];
          for (let i = 0; i < data[1].length; i++) {
            data_array.push([dataArray_route[i], dataArray_amount[i]]);
          }
          console.log(data_array);

          //graph section
          this.summary_section_graph = document.createElement("div");
          this.main.appendChild(this.summary_section_graph);
          this.summary_section_graph.classList.add("section", "cus-section");

          this.summary_section_graph.innerHTML += `  <div id="curve_chart" style="width: 1300px; height: 700px"></div>`;
          this.line_chart(data_array, "Summary Of Month", 2);

          //table section

          this.summary_section = document.createElement("div");
          this.main.appendChild(this.summary_section);
          this.summary_section.classList.add("section", "cus-section");
          this.summary_section.innerHTML = `<h3>Summary Of Month</h3>`;
          this.summary_section_table = document.createElement("table");
          this.summary_section.appendChild(this.summary_section_table);
          this.summary_section_table.classList.add("table-info");

          this.summary_section_table.innerHTML +=
            "<tr> <th>Route ID</th><th>Route Name</th> <th>Rep ID</th> <th>Rep Name </th><th> Total sales</th>   </tr> ";
          let i;

          for (i = 0; i < data[1].length; i++) {
            this.summary_section_table.innerHTML += `
            
            <tr>
            
            <td class="pro_name">${data[1][i]["route_id"]}</td>
            <td class="pro_name">${data[1][i]["route_name"]}</td>
            <td class="pro_name">${data[1][i]["rep_id"]}</td>
            <td class="price">${data[1][i]["name"]}</td>
            <td class="dis">${data[1][i]["sum(orders.amount)"]}</td>
           
            
            
            </tr>
            
            `;
          }
        });
    }
    
    //sales summary yearly
    else {

      console.log("Jjjjaj")
      this.report_title.innerHTML =
        " Sales Summary Yearly Report" + " " + " " + year;
      var data_set = {
        year: year,
      };
      fetch("http://localhost/web-Experts/public/reports/sales_summary_year", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data_set),
      })
        .then((response) => response.json())
        .then((data) => {


           console.log(data);
          this.card_con_1.innerHTML=`<ul id="print_list"><li><p>Total Orders : ${data[0][0]['count_orders']}</p></li>
         
          <li><p>Total Orders : ${data[0][1]['count_delivery']}</p></li>
          <li><p>Total Sales : RS.${data[0][2]['SUM(amount)']}</p></li>
          
          
          </ul>`
          

          this.create_card(
            '<i class="fas fa-luggage-cart"></i>',
            "No Of orders",
            data[0][0]["count_orders"]
          );
          this.create_card(
            '<i class="fas fa-truck"></i>',
            "No Of Deliveries",
            data[0][1]["count_delivery"]
          );
          this.create_card(
            '<i class="fas fa-money-bill-alt"></i>',
            "Total Sales(RS.)",
            data[0][2]["SUM(amount)"]
          );

          //garph
          // let resultArray = this.create_dataset_array_month(data[1][1]);
          // this.summary_section_graph = document.createElement("div");
          // this.main.appendChild(this.summary_section_graph);
          // this.summary_section_graph.classList.add("section", "cus-section");

          //table
          this.summary_section = document.createElement("div");
          this.main.appendChild(this.summary_section);
          this.summary_section.classList.add("section", "cus-section");
          this.summary_section.innerHTML = `<h3>Summary Of Route</h3>`;
          this.summary_section_table = document.createElement("table");
          this.summary_section.appendChild(this.summary_section_table);
          this.summary_section_table.classList.add("table-info");

          this.summary_section_table.innerHTML +=
            "<tr> <th>Route ID</th><th>Route Name</th> <th>Rep ID</th> <th>Rep Name </th><th> Total sales(RS.)</th>   </tr> ";
          let i;

          for (i = 0; i < 12; i++) {
            this.summary_section_table.innerHTML += `
          
          <tr>
          
          <td class="pro_name">${data[1][0][i]["route_id"]}</td>
          <td class="pro_name">${data[1][0][i]["route_name"]}</td>
          <td class="pro_name">${data[1][0][i]["rep_id"]}</td>
          <td class="price">${data[1][0][i]["name"]}</td>
          <td class="dis">${data[1][0][i]["sum(orders.amount)"]}</td>
         
          
          
          </tr>
          
          `;
          }
          let resultArray = this.create_dataset_array_month(data[1][1]);
          this.summary_section_graph = document.createElement("div");
          this.summary_section_graph1 = document.createElement("div");
          this.summary_section_graph2 = document.createElement("div");
          this.main.appendChild(this.summary_section_graph);
          this.summary_section_graph.appendChild(this.summary_section_graph1);
          this.summary_section_graph.appendChild(this.summary_section_graph2);
          this.summary_section_graph.classList.add("section", "cus-section","graph_section");

          this.summary_section_graph1.innerHTML += `  <div id="curve_chart" style="width: 1300px; height: 700px"></div>`;
          this.line_chart(resultArray, "Summary Of Month", 12);
          this.summary_section_graph2.innerHTML += `   <div id="piechart" style="width: 900px; height: 500px;"></div>`;


          this.pie_chart(resultArray);

          this.summary_section_route = document.createElement("div");
          this.main.appendChild(this.summary_section_route);
          this.summary_section_route.classList.add("section", "cus-section");
          this.summary_section_route.innerHTML = `<h3>Summary Of Month</h3>`;
          this.summary_section_route_table = document.createElement("table");
          this.summary_section_route.appendChild(
            this.summary_section_route_table
          );
          this.summary_section_route_table.classList.add("table-info");

          console.log(resultArray);
          this.summary_section_route_table.innerHTML +=
            "<tr> <th>Month</th><th> Total Sales(RS.)</th> </tr> ";
          const month_array = [
            "January",
            "Febraury",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ];
          for (i = 0; i < 12; i++) {
            this.summary_section_route_table.innerHTML += `
            
            <tr>
            
            <td class="pro_name">${month_array[i]}</td>
            <td class="pro_name">${resultArray[i][1]}</td>
           
            
            
            </tr>
            
            `;
          }
        });
    }
  }
  //rep summary
  rep_summary(year, month) {
    //yaerly report
    if (month!=0) {
     
       let string_month = this.get_month(month);
      
      this.report_title.innerHTML =
        " Sales Reprsentative Summary" + " " + string_month + " " + year;

      var data_set = {
        year: year,
        month: month,
      };

      console.log(data_set)

      fetch("http://localhost/web-Experts/public/reports/rep_summary_month", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data_set),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);

          this.summary_section = document.createElement("div");
          this.main.appendChild(this.summary_section);
          this.summary_section.classList.add("section", "cus-section");
          this.summary_section.innerHTML = `<h3>Summary Of Month ${string_month}</h3>`;
          this.summary_section_table = document.createElement("table");
          this.summary_section.appendChild(this.summary_section_table);
          this.summary_section_table.classList.add("table-info");

          this.summary_section_table.innerHTML +=
            "<tr> <th>Rep ID</th><th>REp name</th> <th>target(RS.)</th> <th>Total sales(RS.) </th><th> Status</th>   </tr> ";
          let i;
          for (i = 0; i < data.length; i++) {
            var status = "";

            var a = parseInt(data[i]["target"]);
            var b = parseInt(data[i]["sumSales"]);
            if (a <= b) {
              status = "Completed";
            } else {
              status = "not Completed";
            }
            this.summary_section_table.innerHTML += `
          
          <tr>
          
          <td class="pro_name">${data[i]["rep_id"]}</td>
          <td class="pro_name">${data[i]["name"]}</td>
          <td class="pro_name">${data[i]["target"]}</td>
          <td class="price">${data[i]["sumSales"]}</td>
          
          <td class="price">${status}</td>
         
         
          
          
          </tr>
          
          `;
            status = "";
          }
        });
    }

    else{
      console.log(year);
      this.report_title.innerHTML =
      " Sales Reprsentative Summary" + " " + year;

      fetch("http://localhost/web-Experts/public/reports/rep_summary_year", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(year),
      })

      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        this.summary_section = document.createElement("div");
        this.main.appendChild(this.summary_section);
        this.summary_section.classList.add("section", "cus-section");
        this.summary_section.innerHTML = `<h3>Summary Of Year</h3>`;
        
        this.summary_section_table = document.createElement("table");
          this.summary_section.appendChild(this.summary_section_table);
          this.summary_section_table.classList.add("table-info");

          this.summary_section_table.innerHTML +=
            "<tr> <th>Rep ID</th><th>REp name</th> <th>Total Sales(RS.)</th> <th>Current Target(RS.)</th>  </tr> ";
       
            let i;
            for (i = 0; i < data.length; i++) {
              
  
            
              this.summary_section_table.innerHTML += `
            
            <tr>
            
            <td class="pro_name">${data[i]["rep_id"]}</td>
            <td class="pro_name">${data[i]["name"]}</td>
            
            <td class="price">${data[i]["sumSales"]}</td>
            <td class="pro_name">${data[i]["target"]}</td>
            
          
           
           
            
            
            </tr>
            
            `;
            
            }
        
      });

    }
  }

  //

  //return report
  return_summary(year, month) {

    console.log(year,month)
    if (month != 0) {
      var data_set = {
        year: year,
        month: month,
      };
      console.log(data_set);
      let string_month = this.get_month(month);
      this.report_title.innerHTML =
        " Return  Monthly Report" + " " + string_month + " " + year;
      fetch("http://localhost/web-Experts/public/reports/return_month", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data_set),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);

          this.create_card(
            '<i class="fas fa-exchange-alt"></i>',
            "Total Returns(RS.)",
            data[0][0]["total_amount"]
          );
          this.create_card(
            '<i class="fas fa-store-alt"></i>',
            "No Of Shops",
            data[0][1]["shops"]
          );

          this.summary_section = document.createElement("div");
          this.main.appendChild(this.summary_section);
          this.summary_section.classList.add("section", "cus-section");
          this.summary_section.innerHTML = `<h3>Return Summary Of Month</h3>`;
          this.summary_section_table = document.createElement("table");
          this.summary_section.appendChild(this.summary_section_table);
          this.summary_section_table.classList.add("table-info");

          this.summary_section_table.innerHTML +=
            "<tr> <th>Route ID</th><th>Route Name</th><th>Rep Name </th><th> Total Return(RS.)</th>   </tr> ";
          let i;

          for (i = 0; i < data[1].length; i++) {
            this.summary_section_table.innerHTML += `
              
              <tr>
              
              <td class="pro_name">${data[1][i]["route_id"]}</td>
              <td class="price">${data[1][i]["route_name"]}</td>
              <td class="pro_name">${data[1][i]["rep_name"]}</td>
              <td class="pro_name">${data[1][i]["total_amount"]}</td>
              
              
            
             
              
              
              </tr>
              
              `;
          }
        });
    }
    else{

      var data_set = {
        year: year
      };
      console.log(data_set);
      let string_month = this.get_month(month);
      this.report_title.innerHTML =
        " Return  Monthly Report" + " " + year;
      fetch("http://localhost/web-Experts/public/reports/return_year", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data_set),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);

          // this.create_card(
          //   '<i class="fas fa-exchange-alt"></i>',
          //   "Total Returns(RS.)",
          //   data[0][0]["total_amount"]
          // );
          // this.create_card(
          //   '<i class="fas fa-store-alt"></i>',
          //   "No Of Shops",
          //   data[0][1]["shops"]
          // );

          // this.summary_section = document.createElement("div");
          // this.main.appendChild(this.summary_section);
          // this.summary_section.classList.add("section", "cus-section");
          // this.summary_section.innerHTML = `<h3>Return Summary Of Month</h3>`;
          // this.summary_section_table = document.createElement("table");
          // this.summary_section.appendChild(this.summary_section_table);
          // this.summary_section_table.classList.add("table-info");

          // this.summary_section_table.innerHTML +=
          //   "<tr> <th>Route ID</th><th>Route Name</th><th>Rep Name </th><th> Total Return(RS.)</th>   </tr> ";
          // let i;

          // for (i = 0; i < data[1].length; i++) {
          //   this.summary_section_table.innerHTML += `
              
          //     <tr>
              
          //     <td class="pro_name">${data[1][i]["route_id"]}</td>
          //     <td class="price">${data[1][i]["route_name"]}</td>
          //     <td class="pro_name">${data[1][i]["rep_name"]}</td>
          //     <td class="pro_name">${data[1][i]["total_amount"]}</td>
              
              
            
             
              
              
          //     </tr>
              
          //     `;
          // }
        });

    }
  }
  //card section
  create_card(icon, heading, count) {
    //create card
    this.card_div = document.createElement("div");
    this.card_con.appendChild(this.card_div);
    this.card_div.classList.add("card_div");

    //create content of card
    this.card_con_div = document.createElement("div");
    this.card_div.appendChild(this.card_con_div);
    this.card_con_div.classList.add("card_con_div");

    //icon
    this.icon = document.createElement("div");
    this.card_con_div.appendChild(this.icon);
    this.icon.innerHTML = icon;
    this.icon.classList.add("icon_div");

    //content
    this.card_con_div2 = document.createElement("div");
    this.card_div.appendChild(this.card_con_div2);
    this.card_con_div2.classList.add("card_con_div2");

    this.card_con_div2.innerHTML = "<h3 id=heading>" + heading + "</h3>";
    this.card_con_div2.innerHTML += "<h3 id=count>" + count + "</h3>";
  }

  get_month(month) {
    if (month == 1) {
      return "January";
    } else if (month == 2) {
      return "February";
    } else if (month == 3) {
      return "March";
    } else if (month == 4) {
      return "April";
    } else if (month == 5) {
      return "May";
    } else if (month == 6) {
      return "June";
    } else if (month == 7) {
      return "July";
    } else if (month == 8) {
      return "August";
    } else if (month == 9) {
      return "September";
    } else if (month == 10) {
      return "October";
    } else if (month == 11) {
      return "November";
    } else if (month == 12) {
      return "December";
    }
  }

  create_dataset_array(data) {
    let i;

    var result = [
      [1, 0],
      [2, 0],
      [3, 0],
      [4, 0],
      [5, 0],
      [6, 0],
      [7, 0],
      [8, 0],
      [9, 0],
      [10, 0],
      [11, 0],
      [12, 0],
    ];

    for (i = 0; i < data.length; i++) {
      let x = data[i]["EXTRACT(month FROM date)"];
      // console.log(x);

      result[x - 1][1] = data[i]["count(*)"];
    }

    // console.log(result);
    return result;
  }

  create_dataset_array_month(data) {
    let i;

    var result = [
      [1, 0],
      [2, 0],
      [3, 0],
      [4, 0],
      [5, 0],
      [6, 0],
      [7, 0],
      [8, 0],
      [9, 0],
      [10, 0],
      [11, 0],
      [12, 0],
    ];

    for (i = 0; i < data.length; i++) {
      let x = data[i]["date"];
      // console.log(x);

      result[x - 1][1] = data[i]["data"];
    }

    // console.log(result);
    return result;
  }

  bar_charts(result, result1, result2) {
    google.charts.load("current", { packages: ["bar"] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Month", "Orders", "Deliveries"],
        ["Jan", result[0][1], result1[0][1]],
        ["Feb", result[1][1], result1[1][1]],
        ["March", result[2][1], result1[2][1]],
        ["April", result[3][1], result1[3][1]],
        ["May", result[4][1], result1[4][1]],
        ["June", result[5][1], result1[5][1]],
        ["July", result[6][1], result1[6][1]],
        ["August", result[7][1], result1[7][1]],
        ["Sep", result[8][1], result1[8][1]],
        ["Oct", result[9][1], result1[9][1]],
        ["Nov", result[10][1], result1[10][1]],
        ["dec", result[11][1], result1[11][1]],
      ]);

      var options = {
        chart: {
          title: "Summary of Orders and deliveries",
          subtitle: "Year 2021",
          width: 400,
          height: 300,
        },
        bars: "horizontal", // Required for Material Bar Charts.
      };

      var chart = new google.charts.Bar(
        document.getElementById("barchart_material")
      );

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  }

  line_chart(array, title, no) {
    console.log(array);
    let years = [];
    let sales = [];
    for (let i = 0; i < no; i++) {
      years.push(array[i][0]);
      sales.push(array[i][1]);
    }
    let data_array = [["Month", "Sales"]];

    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      console.log(data_array);

      for (let i = 0; i < no; i++) {
        data_array.push([String(years[i]), parseInt(sales[i])]);
      }
      var data = google.visualization.arrayToDataTable(data_array);

      var options = {
        title: title,
        curveType: "function",
        legend: { position: "bottom" },
        titleTextStyle: {
          color: "green",
        },
      };

      var chart = new google.visualization.LineChart(
        document.getElementById("curve_chart")
      );

      chart.draw(data, options);
    }
  }


  //pie charts
pie_chart(result){
  console.log("Heloooo")
  console.log(result)
  google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales Precentage'],
          ['January',result[0][1]],
          ['Feb', result[1][1]],
          ['March',result[2][1]],
          ['April', result[3][1]],
          ['May', result[4][1]],
          ['June',result[5][1]],
          ['July', result[6][1]],
          ['August', result[7][1]],
          ['Sep',result[8][1]],
          ['Oct', result[9][1]],
          ['Nov',result[10][1]],
          ['Dec', result[11][1]]
        ]);

        var options = {
          title: 'Summary of year'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
}
  









  
}
