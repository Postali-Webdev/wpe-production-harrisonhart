import debounce from 'debounce'

export default class {
    constructor(accordion) {
        this.target = accordion;
        this.outer = accordion.querySelector('[data-hook="accordion.outer"]')
        this.inner = accordion.querySelector('[data-hook="accordion.inner"]')
        this.button = accordion.querySelector('[data-hook="accordion.button"]')
        this.accordionActive = accordion.dataset.classActive || 'accordion-expanded'
        this.accordionInactive = accordion.dataset.classInactive || false
        this.outerActive = this.outer.dataset.classActive || 'block'
        this.outerInactive = this.uter.dataset.classInactive || 'hidden'
        this.buttonActive = this.button.dataset.classActive || false
        this.buttonInactive = this.button.dataset.classInactive || false
        this.activeWhere = accordion.dataset.accordionActiveWhere
        this.collapsedHeight = accordion.dataset.collapsedHeight || '0'

        if ( activeWhere ) {
            window.addEventListener('resize', debounce(() => {
                if ( window.matchMedia(activeWhere).matches ) {
                    this.outer.setAttribute('aria-expanded', (accordion.dataset.expanded === '1') ? 'true' : 'false')
                } else {
                    this.outer.setAttribute('aria-expanded', 'true')
                }
            }), 200)
        }
    }

    close(){
        this.outer.style.height = `${this.inner.clientHeight}px`
        this.outer.setAttribute('aria-expanded', 'false')
        this.target.dataset.changing = '1'
        setClassState(this.button, this.buttonInactive)
        unsetClassState(this.button, this.buttonActive)
        setClassState(this.target, this.accordionInactive)
        unsetClassState(this.target, this.accordionActive)
        setTimeout(() => {
            this.outer.style.height = this.collapsedHeight
        }, 5)
        setTimeout(() => {
            this.target.dataset.changing = '0'
            setClassState(outer, outerInactive)
            unsetClassState(outer, outerActive)
            outer.style.height = ''
        }, 310)
        this.target.dataset.expanded = '0'
    }

}