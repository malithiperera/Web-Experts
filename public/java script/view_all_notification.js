

class notification{
    constructor(user_id, type){
        console.log(user_id);
        console.log(type);

        this.user_id = user_id;
        this.type = type;

        console.log(this.user_id,this.type)
        //for notification front view
        this.home_section = document.querySelector('.home-section');
        this.all_notifications = document.querySelector('.all_notifications');
        this.select_one = document.querySelector('.select_one');
        this.notification_subcontainer = document.querySelector('.notification_subcontainer');
        this.subcontainer2 = document.querySelector('.subcontainer2');
        this.view_more = document.getElementById("view_more");

        //for notification notification view
        this.from = document.querySelector('.from_whom');
        this.to = document.querySelector('.to');
        this.date = document.querySelector('.date');
        this.time = document.querySelector('.time');
        this.subject = document.querySelector('.subject');
        this.subject.classList.add('sub-head');
        this.notification_subcontainer = document.querySelector('.notification_subcontainer');

    }
    
        

        load_notification(type) {


            const dataset = {
              to_whom: this.type,
              user_id: this.user_id,
              notification_type: type
            }
      
            this.subcontainer2.innerHTML = ``;
            this.all_notifications.style.display = "block";
            this.select_one.style.display = "none";
      
            fetch('http://localhost/web-Experts/public/notification/load_notification', {
                method: 'POST',
      
                headers: {
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify(dataset)
              })
              .then(response => response.json())
              .then(data => {
                // console.log(data);
      
                // if(num_of_rows >= data.length){
                //   this.view_more.style.visibility = "hidden";
                //   num_of_rows = data.length;
                // }else{
                //   this.view_more.style.visibility = "hidden";
                //   // this.view_more.style.visibility = "visible";
                // }
      
                //choose subject and message according to the notification type
                
                
                  console.log("read mails");
                  this.subcontainer2.innerHTML = ``;
                  for (let i = 0; i < data.length; i++) {
                    
                      console.log("dineth");
                      this.subcontainer2.innerHTML += `
        
                        <div class='notification' id='${data[i]['notification_id']}'>
        
                            <div class='from from_${data[i]['notification_id']}' id='${data[i]['notification_id']}'>
                              ${data[i]['from_whom']}
                            </div>
                            <div class='header_notification header_${data[i]['notification_id']}' id='${data[i]['notification_id']}'>
                               ${data[i][0]}
                            </div>
                            <div class='date_notification date_${data[i]['notification_id']}' id='${data[i]['notification_id']}'>
                              ${data[i]['date']}
                            </div>
                            <div class='time_notification time_${data[i]['notification_id']}' id='${data[i]['notification_id']}'>
                              ${data[i]['time']}
                            </div>
                            <div class='delete delete_${data[i]['notification_id']}' id='${data[i]['notification_id']}'>
        
                              <div class='trash'>
                                <a> <i class='fas fa-trash'></i></a>
                              </div>
                              
                            </div>
                        </div>
                        
                        `;
                       
                      
                    } 
                
                console.log(isRead);
                console.log(data);

                

                // this.view_more.addEventListener("click", ()=>{
                //   console.log(num_of_rows);
                //   if(data.length > num_of_rows){
                //     console.log(type);
                //   this.load_notification(type, num_of_rows+10);
                //   }
                // });

                

              });
      
            return 0;
      
          }

          

          //initially load the page
        async load_page(notification_id) {

            this.from.innerHTML = `From : `;
            this.to.innerHTML = `To : `;
            this.date.innerHTML = `Date : `;
            this.time.innerHTML = `Time : `;
            this.subject.innerHTML = `Subject : `;




            let data1 = await fetch('http://localhost/web-Experts/public/notification/load_notification_page', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(notification_id)
                })
                .then(response => response.json())
                .then(data => {
                    // console.log(data);
                    this.from.innerHTML += `${data['from_whom']}`;
                    this.to.innerHTML += `${data['to_whom']}`;
                    this.date.innerHTML += `${data['date']}`;
                    this.time.innerHTML += `${data['time']}`;

                    return data;
                });
            return data1;
        }

       
        change_target(user_id){
          fetch('http://localhost/web-Experts/public/notification/change_target', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(user_id)
                })
                .then(response => response.json())
                .then(data => {
                  console.log(user_id)

                  
                    this.notification_subcontainer.innerHTML = ``;

                    //fill subject for the notification
                    this.subject.innerHTML += `Rep target changed`;

                    //div element for message
                    this.notification_subcontainer.innerHTML = ``;
                    let message_div = document.createElement('div');
                    message_div.className = "message_div";
                    this.notification_subcontainer.appendChild(message_div);

                    message_div.innerHTML = `The company has change the current target of the sales rep with rep id `;

                   
                });
        }

        product_addition(product_id){
         
            fetch('http://localhost/web-Experts/public/notification/product_addition', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(product_id)
                })
                .then(response => response.json())
                .then(data => {
                  console.log(product_id)

                  
                    this.notification_subcontainer.innerHTML = ``;

                    //fill subject for the notification
                    this.subject.innerHTML += `Added new ${data['type']} product named ${data['product_name']}`;

                    //div element for message
                    this.notification_subcontainer.innerHTML = ``;
                    let message_div = document.createElement('div');
                    message_div.className = "message_div";
                    this.notification_subcontainer.appendChild(message_div);

                    message_div.innerHTML = `The company has added new product named ${data['product_name']} in the 
                                            ${data['type']} category. It's id is ${data['product_id']} and it's price
                                            is ${data['price']}. And you can buy it with ${data['discount']}%. 
                                            ${data['product_name']} has ${data['description']}.You can buy ${data['product_name']}
                                            any our branch through our sales reps.`;
                    //div element for image
                    let image_div = document.createElement('div');
                    image_div.className = "image_div";
                    this.notification_subcontainer.appendChild(image_div);

                    //image element
                    let image = document.createElement('img');
                    image.className = "product_image";
                    image_div.appendChild(image);
                    image.src = '../../public/images/uploads/' + data['image'];
                   
                });
        }

        request_credit_period(req_id){

          fetch('http://localhost/web-Experts/public/notification/request_credit_period', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(req_id)
          })
          .then(response => response.json())
          .then(data =>{
            console.log(data);
            this.notification_subcontainer.innerHTML = ``;
            this.subject.innerHTML += `${data['shop_name']}'s credit period request.`;
            this.notification_subcontainer.innerHTML += `${data['shop_name']} is requesting a credit period of
                                                        ${data['request_period']} instead of ${data['credit_time']}.
                                                        He noticed the reason of the new request is ${data['reason']}.
                                                        And he is in ${data['route_name']} route.`;
          });
       

          }


          add_returns(return_id){
            fetch('http://localhost/web-Experts/public/notification/add_returns', {
              method: 'POST',

              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(return_id)
            })
            .then(response => response.json())
            .then(data =>{
              this.notification_subcontainer.innerHTML = ``;
              this.subject.innerHTML += `${data[0]} is added a return from ${data[1]}`;

              //creation of the return table
              let return_table = document.createElement("TABLE"); 
              this.notification_subcontainer.appendChild(return_table);

              let table_head = document.createElement("THEAD"); 
              return_table.appendChild(table_head);
              
              let product_id = document.createElement("TH");
              let product_name = document.createElement("TH");
              let qty = document.createElement("TH");
              let reason = document.createElement("TH");

              product_id.innerHTML = `Id`;
              product_name.innerHTML = `Product`;
              qty.innerHTML = `Quantity`;
              reason.innerHTML = `Reason`;

              table_head.appendChild(product_id);
              table_head.appendChild(product_name);
              table_head.appendChild(qty);
              table_head.appendChild(reason);

              let body = document.createElement("TBODY");
              return_table.appendChild(body);

              for(let i = 0 ; i < data[2].length ; i++){
                let row = document.createElement("TR");
                body.appendChild(row);

                let id_rec = document.createElement("TD");
                let product_rec = document.createElement("TD");
                let qty_rec = document.createElement("TD");
                let reason_rec = document.createElement("TD");

                id_rec.innerHTML = `${data[2][i]['product_id']}`;
                product_rec.innerHTML = `${data[2][i]['product_name']}`;
                qty_rec.innerHTML = `${data[2][i]['qty']}`;
                reason_rec.innerHTML = `${data[2][i]['reason']}`;

                body.appendChild(id_rec);
                body.appendChild(product_rec);
                body.appendChild(qty_rec);
                body.appendChild(reason_rec);

                

              }

              

              console.log(data);
            });
          }

          confirm_delivery(delivery_id){
            
            fetch('http://localhost/web-Experts/public/notification/confirm_delivery', {
              method: 'POST',

              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(delivery_id)
            })
            .then(response => response.json())
            .then(data => {
              console.log(data);
              this.notification_subcontainer.innerHTML = ``;
              this.subject.innerHTML += `${data[3]['name']} 's delivery completed by ${data[4]['name']}`;

              let table = document.createElement("TABLE");
              this.notification_subcontainer.appendChild(table);

              let table_head = document.createElement("THEAD");
              table.appendChild(table_head);

              let product = document.createElement("TH");
              let price = document.createElement("TH");
              let discount = document.createElement("TH");
              let quantity = document.createElement("TH");
              let amount = document.createElement("TH");

              product.innerHTML = `Product`;
              price.innerHTML = `Price`;
              discount.innerHTML = `Discount`;
              quantity.innerHTML = `Quantity`;
              amount.innerHTML = `Amount`;

              table_head.appendChild(product);
              table_head.appendChild(price);
              table_head.appendChild(discount);
              table_head.appendChild(quantity);
              table_head.appendChild(amount);

              let table_body = document.createElement("TBODY");
              table.appendChild(table_body);

              for(let i = 0 ; i < data[2].length ; i++){
                let row = document.createElement("TR");
                table_body.appendChild(row);

                let product_rec = document.createElement("TD");
                let price_rec = document.createElement("TD");
                let discount_rec = document.createElement("TD");
                let quantity_rec = document.createElement("TD");
                let amount_rec = document.createElement("TD");

                product_rec.innerHTML = `${data[2][i]['product_name']} - ${data[2][i]['product_id']}`;
                price_rec.innerHTML = `${data[2][i]['price']}`;
                discount_rec.innerHTML = `${data[2][i]['discount']}`;
                quantity_rec.innerHTML = `${data[2][i]['quantity']}`;
                amount_rec.innerHTML = `${data[2][i]['amount']}`;

                row.appendChild(product_rec);
                row.appendChild(price_rec);
                row.appendChild(discount_rec);
                row.appendChild(quantity_rec);
                row.appendChild(amount_rec);

              }

              
            });
          }

         stock_crashes(issue_id){
           fetch('http://localhost/web-Experts/public/notification/stock_crashes',{
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(issue_id)
           })
           .then(response => response.json())
           .then(data =>{
              console.log(data);

              this.notification_subcontainer.innerHTML = ``;
              this.subject.innerHTML += `some issue with ${data[1]['name']} stock completion, issued by ${data[2]['name']}.`;

              let table = document.createElement("TABLE");
              this.notification_subcontainer.appendChild(table);

              let thead = document.createElement("THEAD");
              this.notification_subcontainer.appendChild(thead);

              let product = document.createElement("TH");
              let qty_to_return = document.createElement("TH");
              let returned_qty = document.createElement("TH");

              product.innerHTML = `Product`;
              qty_to_return.innerHTML = `QTY to return`;
              returned_qty.innerHTML = `Returned QTY`;

              // thead.innerHTML += product.outerHTML + qty_to_return.outerHTML + returned_qty.outerHTML;
              thead.appendChild(product);
              thead.appendChild(qty_to_return);
              thead.appendChild(returned_qty);

              let tbody = document.createElement("TBODY");
              this.notification_subcontainer.appendChild(tbody);

              for(let i = 0 ; i < data[0].length ; i++){
                let tr = document.createElement("TR");
                tbody.appendChild(tr);

                let product_rec = document.createElement("TD");
                let qty_to_return_rec = document.createElement("TD");
                let returned_qty_rec = document.createElement("TD");

                product_rec.innerHTML = `${data[0][i]['product_name']} - ${data[0][i]['product_id']}`;
                qty_to_return_rec.innerHTML = `${data[0][i]['qty']}`;
                returned_qty_rec.innerHTML = `${data[0][i]['return_qty']}`;

                tr.appendChild(product_rec);
                tr.appendChild(qty_to_return_rec);
                tr.appendChild(returned_qty_rec);

                // tr.innerHTML += product_rec.outerHTML + qty_to_return_rec.outerHTML + returned_qty_rec.outerHTML;
                // tbody.appendChild(tr);
              }

           });
         } 


         discount_addition(product_id){
          fetch('http://localhost/web-Experts/public/notification/product_addition', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(product_id)
        })
        .then(response => response.json())
        .then(data => {

          
            this.notification_subcontainer.innerHTML = ``;

            //fill subject for the notification
            this.subject.innerHTML += `Added ${data['discount']}% Discounts to the  ${data['product_name']}`;

            //div element for message
            this.notification_subcontainer.innerHTML = ``;
            let message_div = document.createElement('div');
            message_div.className = "message_div";
            this.notification_subcontainer.appendChild(message_div);

            message_div.innerHTML = `The company has added new  discount to the product named ${data['product_name']} in the 
                                    ${data['type']} category. It's id is ${data['product_id']} and it's price
                                    is ${data['price']}. And you can buy it with ${data['discount']}%. 
                                    ${data['product_name']} has ${data['description']}.You can buy ${data['product_name']}
                                    any our branch through our sales reps.`;

            //div element for image
            let image_div = document.createElement('div');
            image_div.className = "image_div";
            this.notification_subcontainer.appendChild(image_div);

            //image element
            let image = document.createElement('img');
            image.className = "product_image";
            image_div.appendChild(image);
            image.src = '../../public/images/uploads/' + data['image'];

           
        });
        this.notification_subcontainer.innerHTML = ``;
         }
         price_change(product_id){
          fetch('http://localhost/web-Experts/public/notification/product_addition', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(product_id)
        })
        .then(response => response.json())
        .then(data => {

          
            this.notification_subcontainer.innerHTML = ``;

            //fill subject for the notification
            this.subject.innerHTML += `Price Updated product ${data['product_name']}`;

            //div element for message
            this.notification_subcontainer.innerHTML = ``;
            let message_div = document.createElement('div');
            message_div.className = "message_div";
            this.notification_subcontainer.appendChild(message_div);

            message_div.innerHTML = `The company has Update the price in product ${data['product_name']} in the 
                                    ${data['type']} category. It's id is ${data['product_id']} and New Price is
                                    ${data['price']}. And you can buy it with ${data['discount']}%. 
                                    ${data['product_name']} has ${data['description']}.You can buy ${data['product_name']}
                                    any our branch through our sales reps.`;

            //div element for image
            let image_div = document.createElement('div');
            image_div.className = "image_div";
            this.notification_subcontainer.appendChild(image_div);

            //image element
            let image = document.createElement('img');
            image.className = "product_image";
            image_div.appendChild(image);
            image.src = '../../public/images/uploads/' + data['image'];

           
        });

         }



         cheque_status($payment_id,$type_id){
          console.log($payment_id);
          fetch('http://localhost/web-Experts/public/notification/cheque_status', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify($payment_id)
        })
        .then(response => response.json())
        .then(data => {

          console.log(data);
           console.log(data[1][0]['status']);
         
            this.notification_subcontainer.innerHTML = ``;

            if($type_id==82){
              this.subject.innerHTML += `Your Cheque is Accepted'`;
              this.notification_subcontainer.innerHTML = ``;
              let message_div = document.createElement('div');
              message_div.className = "message_div";
              this.notification_subcontainer.appendChild(message_div);
  
              message_div.innerHTML = `the cheque which has payment id  ${data[0][0]['payment_id']} is accepted .                                                                                
              `;
              message_div.innerHTML +="<div>Thank You For being with Himalee</div>"
            }

            else
            {
              this.subject.innerHTML += `Your Cheque is Returned'`;
              this.notification_subcontainer.innerHTML = ``;
              let message_div = document.createElement('div');
              message_div.className = "message_div";
              this.notification_subcontainer.appendChild(message_div);
  
              message_div.innerHTML = `the cheque which has payment id  ${data[0][0]['payment_id']} is Returened.                                                                                
              `;
              message_div.innerHTML +="<div>Please Process your Payment in another method</div>"

            }

            //fill subject for the notification
            

            //div element for message
          
            
           
        });

         }


         confirm_delivery_cus(delivery_id){
          fetch('http://localhost/web-Experts/public/notification/delivery_confirm', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(delivery_id)
        })
        .then(response => response.json())
        .then(data => {
          this.notification_subcontainer.innerHTML = ``;
          this.subject.innerHTML += `Order Confirmation:Order ID:${data[0][0]['order_id']}`;
          console.log(data);

        this.notification_subcontainer.innerHTML+='<h3>Check Your Order And Confirm</h3>';
        
      
        
        let table = document.createElement("TABLE");
        this.notification_subcontainer.appendChild(table);

        let table_head = document.createElement("THEAD");
        table.appendChild(table_head);

        let product = document.createElement("TH");
        let price = document.createElement("TH");
        let discount = document.createElement("TH");
        let quantity = document.createElement("TH");
        let amount = document.createElement("TH");

        product.innerHTML = `Product`;
        price.innerHTML = `Price`;
        discount.innerHTML = `Discount`;
        quantity.innerHTML = `Quantity`;
        amount.innerHTML = `Amount`;

        table_head.appendChild(product);
        table_head.appendChild(price);
        table_head.appendChild(discount);
        table_head.appendChild(quantity);
        table_head.appendChild(amount);

        let table_body = document.createElement("TBODY");
        table.appendChild(table_body);

        for(let i = 0 ; i < data[1].length ; i++){
          let row = document.createElement("TR");
          table_body.appendChild(row);

          let product_rec = document.createElement("TD");
          let price_rec = document.createElement("TD");
          let discount_rec = document.createElement("TD");
          let quantity_rec = document.createElement("TD");
          let amount_rec = document.createElement("TD");

          product_rec.innerHTML = `${data[1][i]['product_name']} - ${data[1][i]['product_id']}`;
          price_rec.innerHTML = `${data[1][i]['price']}`;
          discount_rec.innerHTML = `${data[1][i]['discount']}`;
          quantity_rec.innerHTML = `${data[1][i]['quantity']}`;
          amount_rec.innerHTML = `${data[1][i]['amount']}`;

          row.appendChild(product_rec);
          row.appendChild(price_rec);
          row.appendChild(discount_rec);
          row.appendChild(quantity_rec);
          row.appendChild(amount_rec);

        }


        
              this.notification_subcontainer.innerHTML += `<h3>Total Amount:RS.${data[0][0]['amount']}</h3>`;
              this.notification_subcontainer.innerHTML += `<button id='but_confirm' class='but_confirm' value="${data[0][0]['order_id']}">Confirm</button>`;
           
        });
      
        this.notification_subcontainer.innerHTML=" ";

        
        }

         
        credit_request_cus(uesrid,typeid,reqid)
{




  fetch('http://localhost/web-Experts/public/notification/request_credit_period', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(reqid)
          })
          .then(response => response.json())
          .then(data =>{
            console.log(data);
            if(typeid==13){

  this.notification_subcontainer.innerHTML = ``;
          this.subject.innerHTML += `Request Accepted : Request Id:${reqid}`;
         
          this.notification_subcontainer.innerHTML = ``;
          let message_div = document.createElement('div');
          message_div.className = "message_div";
          this.notification_subcontainer.appendChild(message_div);

          message_div.innerHTML = `We are happy to say that the credit request which you have been requested is accepted. You new Credit Period is ${data['request_period']} Weeks. .                                                                                
          `;
          message_div.innerHTML +="<div>Thank You For being with Himalee</div>";
        // this.notification_subcontainer.innerHTML+'<h3>We are happy to say that the credit request which you have been requested is accepted. You new Credit Period is 3 weeks.</h3>';
        
}
else{
  this.subject.innerHTML += `Request Rejected: Request Id:${reqid}`;
         
  this.notification_subcontainer.innerHTML = ``;
  let message_div = document.createElement('div');
  message_div.className = "message_div";
  this.notification_subcontainer.appendChild(message_div);

  message_div.innerHTML = `We are sorry to say that the credit request is rejected for some resaons. .                                                                                
  `;
  message_div.innerHTML +="<div>We are hope to see you in Himalee Family </div>";
// this.notification_subcontainer.innerHTML+'<h3>We are happy to say that the credit request which you have been requested is accepted. You new Credit Period is 3 weeks.</h3>';

}
           
          });
       


}

create_bill(orderid,deliveryid){
  fetch('http://localhost/web-Experts/public/notification/delivery_confirm', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(orderid)
        })
        .then(response => response.json())
        .then(data => {
          this.notification_subcontainer.innerHTML = ``;
          this.subject.innerHTML += `Order Delivered successfully`;
          console.log(data);

        this.notification_subcontainer.innerHTML+=`<h3>Order id:${orderid}</h3>`;
        this.notification_subcontainer.innerHTML+=`<h3>Delivery id:${deliveryid}</h3>`;
        
      
        
        let table = document.createElement("TABLE");
        this.notification_subcontainer.appendChild(table);

        let table_head = document.createElement("THEAD");
        table.appendChild(table_head);

        let product = document.createElement("TH");
        let price = document.createElement("TH");
        let discount = document.createElement("TH");
        let quantity = document.createElement("TH");
        let amount = document.createElement("TH");

        product.innerHTML = `Product`;
        price.innerHTML = `Price`;
        discount.innerHTML = `Discount`;
        quantity.innerHTML = `Quantity`;
        amount.innerHTML = `Amount`;

        table_head.appendChild(product);
        table_head.appendChild(price);
        table_head.appendChild(discount);
        table_head.appendChild(quantity);
        table_head.appendChild(amount);

        let table_body = document.createElement("TBODY");
        table.appendChild(table_body);

        for(let i = 0 ; i < data[1].length ; i++){
          let row = document.createElement("TR");
          table_body.appendChild(row);

          let product_rec = document.createElement("TD");
          let price_rec = document.createElement("TD");
          let discount_rec = document.createElement("TD");
          let quantity_rec = document.createElement("TD");
          let amount_rec = document.createElement("TD");

          product_rec.innerHTML = `${data[1][i]['product_name']} - ${data[1][i]['product_id']}`;
          price_rec.innerHTML = `${data[1][i]['price']}`;
          discount_rec.innerHTML = `${data[1][i]['discount']}`;
          quantity_rec.innerHTML = `${data[1][i]['quantity']}`;
          amount_rec.innerHTML = `${data[1][i]['amount']}`;

          row.appendChild(product_rec);
          row.appendChild(price_rec);
          row.appendChild(discount_rec);
          row.appendChild(quantity_rec);
          row.appendChild(amount_rec);

        }


        
              this.notification_subcontainer.innerHTML += `<h3>Total Amount:RS.${data[0][0]['amount']}</h3>`;
              this.notification_subcontainer.innerHTML += `<button id='print' class='print' value="${data[0][0]['order_id']}" onclick="window.print()">Print</button>`;
           
        });
      
        this.notification_subcontainer.innerHTML=" ";

}
}