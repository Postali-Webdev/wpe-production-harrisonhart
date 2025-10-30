import debounce from 'debounce'

export default class {
    constructor() {
        this.navbarSearch = document.getElementById('navbar-search');
        this.searchToggle = document.querySelector('.js-search-toggle');
        this.menuContainer = document.getElementById('mobile-container');
    }
    init(){
       if(this.searchToggle){
            this.searchToggle.addEventListener("click", () => this.onOpenSearchBox());
       }
    }
    
    onOpenSearchBox(){
        this.navbarSearch.classList.toggle("open");
        this.searchToggle.classList.toggle("open");
        this.menuContainer.classList.toggle("search-open");
    }
}