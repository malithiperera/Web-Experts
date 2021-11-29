<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .notification_body {
            margin-top: 50px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .notification_subcontainer {
            width: 80%;
            padding: 50px;
            background-color: #B2BEB5;
            display: flex;
            flex-direction: column;
        }

        .image_div {
            display: flex;
            justify-content: center;
        }

        .message_div {
            margin-bottom: 30px;
        }
        .back_button_button{
            border:none;
            background-color: transparent;
            margin-bottom : 20px;
        }
    </style>

</head>

<body>
    <div class="container1">
        <div class="back_button"><button class="back_button_button" onclick="window.location.href = 'notification';">
                <i class="fas fa-chevron-circle-left fa-2x"></i>
            </button></div>
        <div class="notification_head">
            <div class="from_whom"></div>
            <div class="to"></div>
            <div class="date"></div>
            <div class="time"></div>
            <div class="subject"></div>
        </div>
        <div class="notification_body">
            <div class="notification_subcontainer">

            </div>
        </div>

    </div>


    <script>
        from = document.querySelector('.from_whom');
        to = document.querySelector('.to');
        date = document.querySelector('.date');
        time = document.querySelector('.time');
        subject = document.querySelector('.subject');
        notification_subcontainer = document.querySelector('.notification_subcontainer');

        //back to home fuction
        const back_to_notification_home = () => {
            window.location.href = 'http://localhost/web-Experts/public/admin/notification';
        }

        //initially load the page
        async function load_page(notification_id) {

            from.innerHTML = `From : `;
            to.innerHTML = `To : `;
            date.innerHTML = `Date : `;
            time.innerHTML = `Time : `;
            subject.innerHTML = `Subject : `;




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
                    from.innerHTML += `${data['from_whom']}`;
                    to.innerHTML += `${data['to_whom']}`;
                    date.innerHTML += `${data['date']}`;
                    time.innerHTML += `${data['time']}`;

                    return data;
                });
            return data1;
        }

        //load message body of the add new product notiication
        const product_addition = (product_id) => {
            fetch('http://localhost/web-Experts/public/notification/product_addition', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(product_id)
                })
                .then(response => response.json())
                .then(data => {
                    notification_subcontainer.innerHTML = ``;

                    //fill subject for the notification
                    subject.innerHTML += `Added new ${data['type']} product named ${data['product_name']}`;

                    //div element for message
                    let message_div = document.createElement('div');
                    message_div.className = "message_div";
                    notification_subcontainer.appendChild(message_div);

                    message_div.innerHTML = `The company has added new product named ${data['product_name']} in the 
                                            ${data['type']} category. It's id is ${data['product_id']} and it's price
                                            is ${data['price']}. And you can buy it with ${data['discount']}%. 
                                            ${data['product_name']} has ${data['description']}.You can buy ${data['product_name']}
                                            any our branch through our sales reps.`;

                    //div element for image
                    let image_div = document.createElement('div');
                    image_div.className = "image_div";
                    notification_subcontainer.appendChild(image_div);

                    //image element
                    let image = document.createElement('img');
                    image.className = "product_image";
                    image_div.appendChild(image);
                    image.src = '../../public/images/uploads/' + data['image'];


                });

        }
    </script>
</body>

</html>