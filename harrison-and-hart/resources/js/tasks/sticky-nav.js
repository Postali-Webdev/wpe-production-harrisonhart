import debounce from 'debounce'

export default class {
    constructor() {
        this.stickyNav = null;
    }
    init(){
        this.stickyNav = document.getElementsByClassName('sticky-nav')[0];
        if(!!this.stickyNav){
            window.addEventListener("scroll", () => {debounce(this.checkScroll(),150)});
            this.checkScroll();
        }
    }
    
    checkScroll(){
        if(this.stickyNav && window.scrollY > 45){
            this.stickyNav.classList.add('small');
        } else {
            this.stickyNav.classList.remove('small');
        }
    }
}