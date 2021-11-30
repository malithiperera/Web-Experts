

class notification{
    constructor(user_id, type){
        console.log(user_id);
        console.log(type);

        this.user_id = user_id;
        this.type = type;

        //for notification front view
        this.home_section = document.querySelector('.home-section');
        this.all_notifications = document.querySelector('.all_notifications');
        this.select_one = document.querySelector('.select_one');
        this.notification_subcontainer = document.querySelector('.notification_subcontainer');
        this.subcontainer2 = document.querySelector('.subcontainer2');

        //for notification notification view
        this.from = document.querySelector('.from_whom');
        this.to = document.querySelector('.to');
        this.date = document.querySelector('.date');
        this.time = document.querySelector('.time');
        this.subject = document.querySelector('.subject');
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
      
      
      
      
                //choose subject and message according to the notification type
      
                for (let i = 0; i < data.length; i++) {
      
                  this.subcontainer2.innerHTML += `
      
                      <div class='notification' id='${data[i]['notification_id']}'>
      
                          <div class='from from_${data[i]['notification_id']}' id='${data[i]['notification_id']}'>
                            ${data[i]['to_whom']}
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
                console.log(data);
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
                    this.notification_subcontainer.innerHTML = ``;

                    //fill subject for the notification
                    this.subject.innerHTML += `Added new ${data['type']} product named ${data['product_name']}`;

                    //div element for message
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

        request_credit_period(){
          this.subject.innerHTML += `is requesting credit time`;
        }

    
}