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
    <div class="suggestions">
        <ul>

        </ul>
    </div>
    <input type="text" id="product_name">
    <input type="text" id="type">
    
    

    <script>

    async function fetchText(value) {

        suggestions = document.querySelector(".suggestions");

        let reqBody = {product: value};
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
            suggestions.innerHTML = ``;
            data.forEach(myFunction);
            
            function myFunction(item) {
                suggestions.innerHTML += `<li><a href="#" onclick="select_row(${item['unit_price']}, ${item['discount']})">${item['product_name']}</a></li>`;
            }

        }).catch(reason => {
            console.log(reason);
        })
    }
        
     function select_row(unit_price, discount){
        $product_name = document.querySelector("#product_name");
        $type = document.querySelector("#type");

        $product_name.value = unit_price;
        $type.value = discount;
     }  
    </script>
</body>
</html>