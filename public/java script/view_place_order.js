delete_pop_up = document.querySelector('.delete-pop-up');
var pop_up = document.querySelector('.msg-pop');
var conf = document.getElementById('conf');
var cancel = document.getElementById('cancel');
var msg_content = document.getElementById('msg-content');
var msg_content_sub = document.getElementById('msg-content-sub');
suggestions = document.querySelector(".suggestions");

async function fetchText(value) {

    let reqBody = {
        product: value
    };
    const getData = async reqBody => {
        let res = await fetch('http://localhost/web-Experts/public/login/test2', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(reqBody)
        });
        if (res.status !== 200) // http status code 200 means success
            throw new Error("Fetching process failed");
        let data = await res.json();
        return data;
    }

    getData(reqBody).then(data => {
        // console.log(data);
        suggestions.innerHTML = ``;
        data.forEach(myFunction);

        function myFunction(item) {

            suggestions.innerHTML += `<li><a href="#" onclick="select_row('${item['product_name']}', '${item['price']}', '${item['discount']}')">${item['product_name']}</a></li>`;
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
// let info = document.querySelector('.info');
let table_info = document.querySelector('#order_table');
let total_of_all_prices = document.getElementById('total_of_all_prices');
let user_id = document.getElementById('user_id');
let route_id = document.getElementById('route_id');
let shop_name = document.getElementById('shop_name');
let confirm_message = document.getElementById('confirm_message');
let done = document.querySelector('.button-pop');
let order_id = document.getElementById('order_id');
let order_date = document.getElementById('order_date');
let order_amount = document.getElementById('order_amount');


function select_row(product_name, unit_price, discount) {
    product_name_input.value = product_name;
    unit_price_input.value = unit_price;
    discount_input.value = discount;
    suggestions.innerHTML = ``;
}

function cal_tot() {
    tot_price_input.value = (quantity_input.value * unit_price_input.value) * (100 - discount_input.value) / 100;
}

function add_product() {

    if (product_name_input.value == "") {
        document.querySelector('.error_pop_up').style.visibility="visible";
        document.querySelector('#err_msg').innerHTML="Plaese Enter a valid product";

    } else if (quantity_input.value == "") {
        document.querySelector('.error_pop_up').style.visibility="visible";
        document.querySelector('#err_msg').innerHTML="Plaese enter a valid  quantity";

    }
    else if(quantity_input.value<0){
        document.querySelector('.error_pop_up').style.visibility="visible";
        document.querySelector('#err_msg').innerHTML="please enter a valid quantity";

    }
    
    else {
        change.style.visibility = "visible";
        new_product.innerHTML += '<tr><td>' + product_name_input.value + '</td><td>' + unit_price_input.value + '</td><td>' + discount_input.value + `</td><td><input type="text" value="${quantity_input.value}" class="qty" readonly onkeyup="cal_tot1()">` + '</td><td>' + tot_price_input.value + '</td><td>' + '<button class="edit">Edit</button> ' + '</td><td>' + '<button class="delete">Delete</button> ' + '</td></tr>';




        product_name_input.value = '';
        unit_price_input.value = '';
        discount_input.value = '';
        quantity_input.value = '';
        tot_price_input.value = '';
    }

    var total = 0;
    for (i = 1; i < table_info.rows.length - 1; i++) {
        // total = total + 1;
        total = total + parseInt(table_info.rows[i].cells[4].innerHTML);
    }
    total_of_all_prices.innerHTML = total;

}



var table_data = new Array(table_info.rows.length - 1);

function confirmation_message() {
    confirm_message.style.visibility = "visible";
    document.querySelector('.container').style.opacity="0.5";

}
//get route name
function get_routes(){
    var user_id1=document.getElementById('user_id1').value;
    var route_id1=document.getElementById('route_id1').value;
    var shop_name1=document.getElementById('shop_name1').value;

    console.log(user_id);
    console.log(route_id);
    console.log(shop_name1);

}




//place Order
function place_order() {

    var length=parseInt(table_info.rows.length)
    
    if (length!=2) {
        console.log(length)

        for (i = 1; i < table_info.rows.length - 1; i++) {
            let table_cell = table_info.rows.item(i).cells;
            table_data[i - 1] = new Array(table_cell.length);
            for (j = 0; j < table_cell.length; j++) {
                if(j==3){
                    
                table_data[i - 1][j]=table_cell.item(j).children[0].value;
                }

                else{
                    table_data[i - 1][j] = table_cell.item(j).innerHTML;
                }
               
                console.log(table_data[i - 1][j])
               
            }

        }
        console.log(table_data);
        if (new_product.rows.length == 0) {
            change.style.visibility = "hidden";
        }
    
        var total_amount = total_of_all_prices.innerHTML;
        var cus_id = user_id.value;
        var route_id_obj = route_id.value;
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    
        var data_set = {
            amount: total_amount,
            status: 'not-delivered',
            date: date,
            working: 1,
            cus_id: cus_id,
            route_id: route_id_obj,
            table: table_data
        };
    console.log(data_set);
    
        fetch('http://localhost/web-Experts/public/customer/place_order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data_set)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                confirmation_message();
                order_id.innerHTML = `${data[7]}`;
                order_date.innerHTML = `${data[2]}`;
                order_amount.innerHTML = `${data[0]}`;
                done.addEventListener("click", () => {
                    confirm_message.style.visibility = "hidden";
                });
            });
    
        new_product.innerHTML = '';
        total_of_all_prices.innerHTML = '';

    }
    else{
 
        document.querySelector('.error_pop_up').style.visibility="visible";
      
        document.querySelector('.container').style.opacity="0.5";
        // const myTimeout=setTimeout(myFunction, 3000);

    }
    
}
function myFunction(){

    document.querySelector('.error_pop_up').style.visibility="hidden";
    document.querySelector('.container').style.opacity="1";

}


// fill details
const fill_details = () => {
    fetch('http://localhost/web-Experts/public/customer/get_details_place_order')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            user_id.value = data[0];
            route_id.value = data[1].route_id;
            shop_name.value = data[1].shop_name;
        });
}

fill_details();


//delete pop up view visisbilty

window.onclick = function(event) {
    var x = document.getElementById('new_product');
    console.log(event);
    if (event.target.className == "delete") {
        console.log('Hello');
        delete_pop_up.style.display = "block";

        pop_up.style.display = 'block';
        pop_up.style.marginLeft = '500px';

        msg_content.innerHTML = "Are You Sure ??";
        msg_content.style.color = "red";
        msg_content_sub.innerHTML = "Are you want to delete " + event.path[2].children[0].innerHTML + "Product From the bill??";
        conf.style.background = "red";
        conf.value = "delete_pro";
        cancel.style.background = "#184A78";
        cal_tot_amount();



        console.log(event.path[2]);
        // x.deleteRow(event.path[2]);
    }
    if (event.target.className == "edit") {
        console.log(event.path[2]);
        // console.log(x.rows[0].cells.item(3));
        for (i = 0; i < x.rows.length; i++) {
            console.log(x.rows[i].cells.item(3).children[0]);
            x.rows[i].cells.item(3).children[0].setAttribute('readonly', true);
        }


        event.path[2].children[3].children[0].removeAttribute('readonly');
        event.path[2].children[3].children[0].classlist.add('inpu');





    }

}

function delete_pro() {
    console.log("JjJJJJJJj");
    var x = document.getElementById('new_product');
    var conf = document.getElementById('conf');
    if (conf.value == "delete_pro") {
        x.deleteRow(event.path[2]);
        pop_up.style.display = "none";
        delete_pop_up.style.display = "none";
        cal_tot_amount();
    }
    if (new_product.rows.length == 0) {
        change.style.visibility = "hidden";
    }

}

//calculating discounts
function cal_tot1() {
    var unit_price = event.path[2].children[1].innerHTML;
    var dis = event.path[2].children[2].innerHTML;


    var new_qua = event.path[2].children[3].children[0].value;

    event.path[2].children[4].innerHTML = (unit_price * new_qua) * (100 - dis) / 100;

  

// var x="<?php echo $_session['user_id'] ?>"


}

function cal_tot_amount() {
    console.log("H9999999")

    var x = document.getElementById('new_product');


    total_of_all_prices = document.getElementById('total_of_all_prices');
    var count = 0;
    for (i = 0; i < x.rows.length; i++) {
        console.log(x.rows[i].cells.item(4).innerHTML);
        count = parseInt(count) + parseInt((x.rows[i].cells.item(4).innerHTML));

    }

    total_of_all_prices.innerHTML = count;

}
change = document.getElementById('change');
window.onload = function() {

    if (new_product.rows.length == 0) {
        change.style.visibility = "hidden";
    }



}


function cancel_pro() {

    pop_up.style.display = "none";
    delete_pop_up.style.display = "none";
}


