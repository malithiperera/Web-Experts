var a = 1, g = 1;

function showHideAdd() {
    if (a == 1 && g == 1) {
        // document.getElementById("inputAdd").style.visibility = "visible";
        // document.getElementById("addamountAddBtn").style.visibility = "visible";
        document.querySelector('.addAmountDiv').style.visibility = "visible"

        return a = 0;

    } else {
        // document.getElementById("inputAdd").style.visibility = "hidden";
        // document.getElementById("addamountAddBtn").style.visibility = "hidden";
        document.querySelector('.addAmountDiv').style.visibility = "hidden"
        return a = 1;
        

    }
    console.log("test");
}

var b = 1;

function showHideRemove() {
    if (b == 1) {
        document.getElementById("removeStocksFieldset").style.visibility = "visible";
        return b = 0;

    } else {
        document.getElementById("removeStocksFieldset").style.visibility = "hidden";
        return b = 1;

    }
}

var c = 1, f = 1;

function showHideNewPrice(productId) {
    if (c == 1 && f == 1) {
        document.getElementById("newPrice").style.visibility = "visible";
        return c = 0;

    } else {
        document.getElementById("newPrice").style.visibility = "hidden";
        return c = 1;

    }
    console.log(productId);

}
var d = 1, e = 1;

function showHideNewDiscount() {
    if (d == 1 && e == 1) {
        document.getElementById("div_newDiscount").style.visibility = "visible";
        return d = 0;

    } else {
        document.getElementById("div_newDiscount").style.visibility = "hidden";
        return d = 1;

    }
}

var h = 1

function showHideConfirmAdd () {
    if (h == 1) {
        document.querySelector('.pop_up').style.visibility = "visible"
        return h = 0

    } else {
        document.querySelector('.pop_up').style.visibility = "hidden"
        return h = 1

    }
}

function hideAddConfirmMessage () {
    document.querySelector('.pop_up').style.visibility = "hidden"

}

var i = 1

function showHideNewLimit () {
    console.log ("start")
    if (i == 1) {
        document.querySelector('.newLimitLbl').style.visibility = "visible"
        document.querySelector('.updateLimit').style.visibility = "visible"
        document.querySelector('.updateLimitBtn').style.visibility = "visible"
        return i = 0
        
    } else {
        document.querySelector('.newLimitLbl').style.visibility = "hidden"
        document.querySelector('.updateLimit').style.visibility = "hidden"
        document.querySelector('.updateLimitBtn').style.visibility = "hidden"
        return i = 1

    }
    
}