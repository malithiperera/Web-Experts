<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cheque.css">
    <title>ChequePayment</title>
</head>

<body>
    
    <div class="container">
        <div class="sub-container">
            <div class="title1">Cheque Payment</div>
            <div class="input-fields"><label for="order">Order</label>
                <div class="radio">
                    <div class="r1"><input type="radio" name="order" id="order">Order1</div>
                    <div class="r2"><input type="radio" name="order" id="order">Order2</div>
                    <div class="r3"><input type="radio" name="order" id="order">Order3</div>
                </div>
            </div>
            <div class="input-fields"><label for="total">Total Amount</label> <input type="text" name="total" id="total"
                    class="inputf">
            </div>
            <div class="input-fields"><label for="bank">Bank</label><input type="text" name="bank" id="bank"
                    class="inputf">
            </div>
            <div class="input-fields"><label for="ChequeNo">Cheque No</label><input type="text" name="ChequeNo" id="ChequeNo"
                    class="inputf">
            </div>
            <div class="input-fields"><label for="date">Deposit Date</label><input type="date" name="date" id="date"
                    class="inputf">
            </div>
            <div class="input-fields"><input type="submit" value="Confirm" id="confirm"></div>
        </div>

    </div>
</body>

</html>