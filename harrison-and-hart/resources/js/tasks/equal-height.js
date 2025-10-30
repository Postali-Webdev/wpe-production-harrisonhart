import debounce from 'debounce';

/* Finds all matching elements with same value of data attribute 'equal-height' and makes then all the same height */
export default class {
    constructor(){
        this.sets = [];
        this.screenSize = null;
        this.mobileStackBreakpoint = 480;  //TODO set a global constant for js mobile-breakpoint
    }
    init(){
        let uniqueIds = [];
        const ids = Array.from(document.querySelectorAll('[data-equal-height]'));
        ids.forEach((e)=>{
            let id = e.dataset.equalHeight;
            if(!uniqueIds.includes(id)){
                uniqueIds.push(id);
            }
        });
        uniqueIds.forEach((id)=>{
            this.sets.push(Array.from(document.querySelectorAll(`[data-equal-height="${id}"]`)));
        });
        window.addEventListener('resize', () => { debounce(this.onResize(), 150)});
        this.onResize();
    }

    onResize(){
       
        if(screen.width > this.mobileStackBreakpoint){
            if(this.screenSize !== 'desktop'){
                //change breakpoint
                this.screenSize = 'desktop';
            }
            this.setEqualHeight();
        } else {
            if(this.screenSize !== 'mobile'){
                //change breakpoint
                this.screenSize = 'mobile';
            }
        }
    }

    setEqualHeight(){
        //remove inline height even on mobile
        if (this.sets.length > 0) {
            this.sets.forEach((set) => {
                set.forEach((elem) => {
                    elem.style.height = null;
                });
            })
        
            if(screen.width > this.mobileStackBreakpoint){
                let _max = 0;
                this.sets.forEach((set) => {
                    set.forEach((elem) => {
                        let _height = elem.offsetHeight;
                        if(_height > _max) _max = _height;
                    });
                });
                this.sets.forEach((set) => {
                    set.forEach((elem) => {
                        elem.style.height = _max+'px';
                    });
                });
            }
        }
    }
}
