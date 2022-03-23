class popup_msg{
    constructor(width, height, top){
        this.width = width;
        this.height = height;
        this.top = top;
    }

    make_division(){

        //make a div to center the popup msg
        let div_to_center = document.createElement('div');
        div_to_center.classList.add('to_center');

        //make a div to popup msg
        let main_msg_div = document.createElement('div');
        main_msg_div.classList.add('main_msg_div');



    }

    change_opacity(percentage, div){

        //access the target view
        let target_view = document.querySelector(div);

        //change opacity of the target div
        target_view.style.opacity = percentage;
    }
}