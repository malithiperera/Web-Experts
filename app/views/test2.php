<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <input type="text" onkeyup="fetchText(this.value)">
    <input type="text" id="product_name">
    <input type="text" id="type">
    
    

    <script>

    async function fetchText(value) {

        // const data = { username: 'example' };

        //     //POST request with body equal on data in JSON format
        //     fetch('http://localhost/web-Experts/public/login/test2', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //     },
        //     body: JSON.stringify(data),
        //     }) 
        //     .then((response) => response.json())
        //     //Then with the data from the response in JSON...
        //     .then((data) => {
        //     console.log('Success:', data);
        //     })
        //     //Then with the error genereted...
        //     .catch((error) => {
        //     console.error('Error:', error);
        //     });


        let reqBody = {username: 'example'};
        const getData = async reqBody => {
            let res = await fetch('http://localhost/web-Experts/public/login/test2', 
            {
                method: 'POST', 
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(reqBody)
            });
            if(res.status !== 200) // http status code 200 means success
                throw new Error("Fetching process failed");
            let data = await res.json();
            return data;
        }

        getData(reqBody).then(data => {
            console.log(data);
        }).catch(reason => {
            console.log(reason);
        })
            
    }
        
       
    </script>
</body>
</html>