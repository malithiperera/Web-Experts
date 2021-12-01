class report{
    constructor(){
        this.main = document.querySelector('.container');
        this.card_con=document.querySelector('.card-section');
        this.report_title=document.getElementById('report-title');
    }



    //customer summary report
    customer_summary(year, month){
        
        let string_month=this.get_month(month);
      

     

   if(month!=0){
          //orders
        
          this.order_section=document.createElement('div');
          this.main.appendChild(this.order_section);
          this.order_section.classList.add('section','cus-section');
          this.order_section.innerHTML='<h3>Orders Of Month</h3>';
         this.ordertable=document.createElement('table');
         
 
         this.order_section.appendChild(this.ordertable);
        this.ordertable.classList.add('table-info')
 
 
         this.ordertable.innerHTML+='<tr> <th>Order Id</th><th>Order date</th> <th>Amount</th> <th>Status</th>  </tr> '
 
         //deliveries
         this.delivery_section=document.createElement('div');
         this.main.appendChild(this.delivery_section);
         this.delivery_section.classList.add('section','cus-section');
         this.delivery_section.innerHTML='<h3>Deliveries Of Month</h3>';
        this.delivery_table=document.createElement('table');
        
 
        this.delivery_section.appendChild(this.delivery_table);
       this.delivery_table.classList.add('table-info')
 
 
        this.delivery_table.innerHTML+='<tr> <th>Deliver Id Id</th><th>Order ID</th> <th>Deliver date</th> <th>Deliver Time</th><th> PaymentStatus</th>   </tr> '
            this.report_title.innerHTML="customer summary Monthly Report"+" " + string_month+" " + year;


            var data_set = {
                       year:year,
                       month:month
                    };
               
        
                  
            fetch('http://localhost/web-Experts/public/reports/customer_summary', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(data_set)
                        })
                        .then(response => response.json())
                        .then(data => {
                           this.create_card('<i class="fas fa-luggage-cart"></i>','No Of orders',data[0][0]['count_orders']);
                           this.create_card('<i class="fas fa-truck"></i>','No Of Deliveries',data[0][1]['count_delivery']);
                           this.create_card('<i class="fas fa-money-bill-alt"></i>','No Of Payment',data[0][0]['count_orders']);


                          var order_body=document.getElementById('new_product');

                        
                           let i;

//orders
                           for (i = 0; i < data[1].length; i++) {
                            this.ordertable.innerHTML += `
                            
                            <tr>
                            
                            <td class="pro_name">${data[1][i]['order_id']}</td>
                            <td class="price">${data[1][i]['date']}</td>
                            <td class="dis">${data[1][i]['amount']}</td>
                           
                            <td>${data[1][i]['status']}</td>
                            
                            </tr>
                            
                            `;
                        }
    //delivery
    for (i = 0; i < data[2].length; i++) {
        this.delivery_table.innerHTML += `
        
        <tr>
        
        <td class="pro_name">${data[2][i]['delivery_id']}</td>
        <td class="pro_name">${data[2][i]['order_id']}</td>
        <td class="pro_name">${data[2][i]['date']}</td>
        <td class="price">${data[2][i]['time']}</td>
        <td class="dis">${data[2][i]['status']}</td>
       
        
        
        </tr>
        
        `;
    }





                            
                        
                     





                            console.log(data);
                           
                            });



                         
                      
        
            
         }
        
        //year
         else{
            console.log('hello');
            var data_set = {
                year:year
             
             };
             fetch('http://localhost/web-Experts/public/reports/customer_summary_year', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data_set)
            })
            .then(response => response.json())
            .then(data => {
                this.report_title.innerHTML=' Customer Summary Yearly Report'+" "+year;
                console.log(data);
                this.create_card('<i class="fas fa-luggage-cart"></i>','No Of orders',data[0][0]['count_orders']);
                this.create_card('<i class="fas fa-truck"></i>','No Of Deliveries',data[0][1]['count_delivery']);
                this.create_card('<i class="fas fa-money-bill-alt"></i>','No Of Payment',data[0][0]['count_orders']);



               this.create_dataset_array(data[1]);
                // console.log(data_set_new);




               
                });

        
          

            }
         
        // let message_div = document.createElement('div');
        // message_div.classList.add('table');
        // this.card_con.classList.add('table');
        // this.main.appendChild(message_div);


        
    }


//card section
   create_card(icon,heading,count){
      //create card
    this.card_div = document.createElement('div');
    this.card_con.appendChild(this.card_div);
    this.card_div.classList.add('card_div');

    //create content of card
    this.card_con_div= document.createElement('div');
    this.card_div.appendChild(this.card_con_div);
    this.card_con_div.classList.add('card_con_div');


    //icon
    this.icon= document.createElement('div');
    this.card_con_div.appendChild(this.icon);
    this.icon.innerHTML=icon;
    this.icon.classList.add('icon_div');


    //content
    this.card_con_div2= document.createElement('div');
    this.card_div.appendChild(this.card_con_div2);
    this.card_con_div2.classList.add('card_con_div2');

    this.card_con_div2.innerHTML='<h3 id=heading>'+heading+'</h3>'
    this.card_con_div2.innerHTML+='<h3 id=count>'+count+'</h3>'







    }











    get_month(month){
       if(month==1){
           return 'January';
       }

       else if(month==2){
           return 'February';
       }


       else if(month==3){
           return 'March';
       }
       else if(month==4){
        return 'April';
    }

    else if(month==5){
        return 'May';
    }
    else if(month==6){
        return 'June';
    }
    else if(month==7){
        return 'July';
    }
    else if(month==8){
        return 'August';
    }

    else if(month==9){
        return 'September';
    }
    else if(month==10){
        return 'October';
    }
    else if(month==11){
        return 'November';
    }
    else if(month==12){
        return 'December';
    }

    }


    create_dataset_array(data){
        let i;

        
        // for(i=0;i<13;i++){
        //    console.log(data[i][i+1]);
        // }

        console.log(data);
        console.log(data[0]['EXTRACT(month FROM date)']);
       

    }
}