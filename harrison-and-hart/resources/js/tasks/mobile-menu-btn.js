export default class {
    constructor() {
        this.mobileNavBreakpoint = 1025;  //TODO set a global constant for js mobile-breakpoint
        this.mobileMenuBtn = null;
        this.mobileContainer = null;
    }
    init(){
        this.mobileContainer = document.getElementsByClassName('mobile-container')[0];
        
        this.mobileMenuBtn = document.getElementsByClassName('js-mobile-menu-btn')[0];
        this.mobileMenuBtn.addEventListener("click", () => this.onMobileMenuClickHandler());
    }
    onMobileMenuClickHandler(){
        this.mobileMenuBtn.classList.toggle("open");
        if(!!this.mobileContainer) this.mobileContainer.classList.toggle("open");
    }
}
