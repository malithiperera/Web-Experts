var a;

function showHideAdd () {
    if (a == 1) {
        document.getElementById ("inputAdd").style.visibility = "visible";
        return a = 0;

    } else {
        document.getElementById ("inputAdd").style.visibility = "hidden";
        return a = 1;
        
    }
}

var b;

function showHideRemove() {
    if (b == 1) {
        document.getElementById("removeStocksFieldset").style.visibility = "visible";
        return b = 0;

    } else {
        document.getElementById("removeStocksFieldset").style.visibility = "hidden";
        return b = 1;

    }
}