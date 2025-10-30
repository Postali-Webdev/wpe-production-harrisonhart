export default class {
    init(){
        this.modalBtns = document.getElementsByClassName('js-modal-btn');
        
        if(!!this.modalBtns){
            for (var i = 0; i < this.modalBtns.length; i++) {
                let btn = this.modalBtns[i];
                btn.addEventListener("click", (e) => this.onModalBtnClickHandler(e));
            }
            // Declare Variables
            this.modal = document.getElementById("modal");
            // Get a copy of the HTML wihin the script modal__template
            this.template = document.getElementById("modal__template");
            if(!!this.template){
                this.headshot = this.template.querySelector(".headshot");
                this.name = this.template.querySelector(".name");
                this.title1 = this.template.querySelector(".title1");
                this.title2 = this.template.querySelector(".title2");
                this.bio = this.template.querySelector(".bio");

            }
            
            this.background = document.getElementById("modal__background-click");
            this.closeBtn = document.getElementById("modal__close-btn");
            if(!!this.background) this.background.addEventListener("click", (e) => this.onCloseModal(e));
            if(!!this.closeBtn) this.closeBtn.addEventListener("click", (e) => this.onCloseModal(e));
        }
    }
    
    onCloseModal(e){
        this.modal.classList.remove("show");
    }

    onModalBtnClickHandler(e){
        e.stopPropagation();
        console.log("Modal Click",e.target);
        let headshot = e.target.querySelector(".headshot").getAttribute('src');
        console.log("header shot",headshot,e.target.querySelector(".headshot") );
        let name = e.target.querySelector(".name").innerHTML;
        let title1 = e.target.querySelector(".title1").innerHTML;
        let title2 = e.target.querySelector(".title2").innerHTML;
        let bio = e.target.querySelector(".bio").innerHTML;
        console.log("this.name:" ,this.name);
        this.headshot.src = headshot;
        this.name.innerHTML = name;
        this.title1.innerHTML = title1;
        this.title2.innerHTML = title2;
        this.bio.innerHTML = bio;

        this.modal.classList.add("show");
    }
}