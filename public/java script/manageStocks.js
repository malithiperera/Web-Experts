var a = 1;

function showHideAdd() {
    if (a == 1) {
        document.getElementById("inputAdd").style.visibility = "visible";
        document.getElementById("addamountAddBtn").style.visibility = "visible";
        return a = 0;

    } else {
        document.getElementById("inputAdd").style.visibility = "hidden";
        document.getElementById("addamountAddBtn").style.visibility = "hidden";
        return a = 1;

    }
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

var c = 1;

function showHideNewPrice() {
    if (c == 1) {
        document.getElementById("newPrice").style.visibility = "visible";
        return c = 0;

    } else {
        document.getElementById("newPrice").style.visibility = "hidden";
        return c = 1;

    }
}