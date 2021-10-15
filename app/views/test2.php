<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <input type="text" id="product_name" onkeyup="fetchText(this.value)">
    <div class="suggestions">
        <ul>

        </ul>
    </div>
    <input type="text" id="unit_price" placeholder="unit price">
    <input type="text" id="discount" placeholder="discount">
    <input type="text" id="quantity" placeholder="quantity" onkeyup="cal_tot()">
    <input type="text" id="total_price" placeholder="total price">
    <button onclick="add_product()">Add</button>

    <table id="order_table">
        <thead>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Discount</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </thead>
       <tbody id="new_product">

       </tbody>  
    </table>
    
    <button onclick="place_order()">PLACE</button>
  
    <div class="info">

    </div>

    <script>

    suggestions = document.querySelector(".suggestions");

    async function fetchText(value) {

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
                
                suggestions.innerHTML += `<li><a href="#" onclick="select_row('${item['product_name']}', '${item['unit_price']}', '${item['discount']}')">${item['product_name']}</a></li>`;
            }

        }).catch(reason => {
            console.log(reason);
        })
    }

        let product_name_input = document.getElementById("product_name");
        let unit_price_input = document.querySelector("#unit_price");
        let discount_input = document.querySelector('#discount'); 
        let quantity_input = document.querySelector('#quantity');
        let tot_price_input = document.querySelector('#total_price');
        let new_product = document.querySelector('#new_product');
        let info = document.querySelector('.info');
        let table_info = document.querySelector('#order_table');

        
     function select_row(product_name, unit_price, discount){
        product_name_input.value = product_name;
        unit_price_input.value = unit_price;
        discount_input.value = discount;
        suggestions.innerHTML = ``;
     } 
     
     function cal_tot(){
         tot_price_input.value = (quantity_input.value*unit_price_input.value)*(100-discount_input.value)/100;
     }

     function add_product(){
        new_product.innerHTML += '<tr><td>'+product_name_input.value+'</td><td>'+unit_price_input.value+'</td><td>'+discount_input.value+'</td><td>'+quantity_input.value+'</td><td>'+tot_price_input.value+'</td></tr></br>';

        product_name_input.value = '';
        unit_price_input.value = '';
        discount_input.value = '';
        quantity_input.value = '';
        tot_price_input.value = '';
     }

     var table_data = new Array(table_info.rows.length-1); 

     function place_order(){
        for(i = 1 ; i < table_info.rows.length ; i++){
            let table_cell = table_info.rows.item(i).cells;
            table_data[i-1] = new Array(table_cell.length);
            for(j = 0 ; j < table_cell.length ; j++){
                info.innerHTML += table_cell.item(j).innerHTML;
                table_data[i-1][j] = table_cell.item(j).innerHTML;
            }
            info.innerHTML += `</br>`;
        }
        const table_data_to_send = JSON.stringify(table_data);
        console.log(table_data_to_send);
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "http://localhost/web-Experts/public/login/place_order");
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send(table_data_to_send);
        // window.location.href = "http://localhost/web-Experts/public/login/place_order";
     }

    </script>
</body>
</html>