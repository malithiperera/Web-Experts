<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .notification_body{
            margin-top:50px;
            width:100%;
            height:500px;
            background-color: blue;
            display: flex;
            justify-content: center;
        }
        .notification_subcontainer{
            width:700px;
            height:400px;
            background-color:green;
            margin-top:50px;
        }
    </style>

</head>

<body>
    <div class="container1">
        <div class="notification_head">
            <div class="from_whom"></div>
            <div class="to"></div>
            <div class="subject"></div>
        </div>
        <div class="notification_body">
            <div class="notification_subcontainer">
               <img id="product_img" style="width:200px; height: 200px; background-color:azure">
            </div>
        </div>

    </div>


    <script>
        from = document.querySelector('.from_whom');
        to = document.querySelector('.to');
        subject = document.querySelector('.subject');
        notification_subcontainer = document.querySelector('.notification_subcontainer');
        product_img = document.getElementById('product_img');

        var notification_details = 'dienth';

        async function load_page(notification_id) {

            from.innerHTML = `From : `;
            to.innerHTML = `To : `;
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
                    subject.innerHTML += `${data['subject']}`;

                    return data;
                });
            return data1;
        }

    const product_addition = (product_id) =>{
        fetch('http://localhost/web-Experts/public/notification/product_addition', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(product_id)
                })
                .then(response => response.json())
                .then(data => {
                   console.log(data['image']);
                console.log('../../public/images/uploads/'+data['image']);
                product_img.src = '../../public/images/uploads/'+data['image'];
                });
        
    }
    </script>
</body>

</html>