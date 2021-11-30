class report{
    constructor(){
        this.main = document.querySelector('.container');
    }

    customer_summary(year, month){
        console.log(year);
        console.log(month);
        
        let message_div = document.createElement('div');
        message_div.classList.add('table');
        this.main.appendChild(message_div);
    }
}