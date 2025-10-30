import { selectAll } from '../utils/helpers'
export default class {
    constructor() {
        this.ids =['145','148'];
        this.currentBtn = null;
        this.currentCard = null;
    }
    init(){
        this.nameBtns = document.querySelectorAll(`[data-attorney]`);
        this.nameBtns.forEach(attonrey => {
            attonrey.addEventListener("click", (e) => this.onAttorneyClickHanlder(e));
        });
        this.currentBtn = document.querySelector(`[data-attorney="145"]`);
        this.currentCard = document.querySelector(`[rel="attorney-145"]`);
    }
    onAttorneyClickHanlder(e){
        let _id = e.target.dataset.attorney;

        let hasClass = e.target.classList.contains('active');
        console.log("click",e.target.classList,hasClass);
        if(!hasClass){
            this.currentBtn.classList.remove('active');
            this.currentCard.classList.remove('active');

            e.target.classList.toggle('active');
            let next = this.ids.filter(function(id){ return this.indexOf(id) !== -1; }, _id);
            
            let nextCard = document.querySelector(`[rel="attorney-${next}"]`);
            nextCard.classList.add('active');

            this.currentBtn = e.target;
            this.currentCard = nextCard;
        }
        // console.log("click",e.target.classList,hasClass);
        // if(this.current != id){
        //     console.log()
        //     this.current = id;
        // }
       
    }
}
