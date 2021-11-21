<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="from">
        From : 
    </div>
    <div class="to">
        To : 
    </div>
    <div class="subject">
        Subject : 
    </div>
    <div class="message">
        Message : 
    </div>

    <script>
        let notification_id = '<?php echo $this->notification_id; ?>';

        from = document.querySelector('.from');
        to = document.querySelector('.to');
        subject = document.querySelector('.subject');
        message = document.querySelector('.message');

        const load_page = () => {
            fetch('http://localhost/web-Experts/public/notification/load_notification_page', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(notification_id)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    from.innerHTML += `${data['from_whom']}`;
                    to.innerHTML += `${data['to_whom']}`;
                    subject.innerHTML += `${data['subject']}`;
                    message.innerHTML += `${data['message']}`;
                });
        }

        load_page();
    </script>
</body>

</html>