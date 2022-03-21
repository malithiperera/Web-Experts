<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .view_rep_stock_request_main_container {
            
            width: 90%;
            margin-left: 5%;
            
            border: 1px solid black;
            border-radius: 20px;
        }

        .view_rep_stock_request_information {
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .view_rep_stock_request_product_list {
            margin-top: 20px;
            margin-left: 20px;
        }

        #view_rep_stock_request_product_list_table {
            margin-top: 20px;
            margin-left:20px;
            margin-right:20px;
            width:100%;

        }
        td{
            text-align: center;
        }
        .view_rep_stock_request_hope_to_visit_another_route {
            
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100px;
            width: 350px;
            margin-left: 35%;
            margin-top:20px;
            
        }

        .view_rep_stock_request_buttons {
            margin-top: 20px;
            margin-right: 20px;
            margin-bottom:30px;
            float: right;

        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="view_rep_stock_request_main_container">
        <div class="view_rep_stock_request_information">
            <label for="">Route : sample route</label>
            <label for="">Rep : sample rep</label>
            <label for="">Request Date : 2021.03.19</label>
            <label for="">Delivery Date : 2021.03.20 </label>
        </div>
        <div class="view_rep_stock_request_product_list">
            <label for="">Product List</label>
            <table id="view_rep_stock_request_product_list_table">
                <thead>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </thead>
                <tbody id="view_rep_stock_request_product_list_tbody">
                    <tr>
                        <td>sample id 1</td>
                        <td>sample name 1</td>
                        <td>sample qty 1</td>
                        <td>sample price 1</td>
                    </tr>
                    <tr>
                        <td>sample id 2</td>
                        <td>sample name 2</td>
                        <td>sample qty 2</td>
                        <td>sample price 2</td>
                    </tr>
                    <tr>
                        <td>sample id 3</td>
                        <td>sample name 3</td>
                        <td>sample qty 3</td>
                        <td>sample price 3</td>
                    </tr>
                    <tr>
                        <td>sample id 4</td>
                        <td>sample name 4</td>
                        <td>sample qty 4</td>
                        <td>sample price 4</td>
                    </tr>
                    <tr>
                        <td>sample id 4</td>
                        <td>sample name 4</td>
                        <td>sample qty 4</td>
                        <td>sample price 4</td>
                    </tr>
                    <tr>
                        <td>sample id 4</td>
                        <td>sample name 4</td>
                        <td>sample qty 4</td>
                        <td>sample price 4</td>
                    </tr>
                    <tr>
                        <td>sample id 4</td>
                        <td>sample name 4</td>
                        <td>sample qty 4</td>
                        <td>sample price 4</td>
                    </tr>
                    <tr>
                        <td>sample id 4</td>
                        <td>sample name 4</td>
                        <td>sample qty 4</td>
                        <td>sample price 4</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        
            <div class="view_rep_stock_request_hope_to_visit_another_route">
                <div class="view_rep_stock_request_add_shop">
                    <label for="">Hope to visit shop in another route</label>
                    <button id="view_rep_stock_request_add">Add</button>
                    <button id="view_rep_stock_request_delete">Delete</button>
                </div>

                <div class="choose_shop">
                    <label for="">Route : </label>
                    <select name="" id="">
                        <option value="">route 1</option>
                        <option value="">route 2</option>
                        <option value="">route 3</option>
                    </select>
                    <label for="">Shop : </label>
                    <select name="" id="">
                        <option value="">shop 1</option>
                        <option value="">shop 2</option>
                        <option value="">shop 3</option>
                    </select>
                </div>
                <button id="view_rep_stock_request_View_shop_list">View Shop List</button>
            </div>
        

        <div class="view_rep_stock_request_buttons">
            <button id="view_rep_stock_request_request_button">Request</button>
            <button id="view_rep_stock_request_close_button">close</button>
        </div>

    </div>
</body>

</html>