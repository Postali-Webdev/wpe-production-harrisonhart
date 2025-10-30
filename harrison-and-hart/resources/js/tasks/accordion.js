/**
 * # A simple accordion
 *
 *     <div data-hook="accordion">
 *       <button data-hook="accordion.button" type="button">
 *         <!-- Contents of button, including icon -->
 *       </button>
 *       <div data-hook="accordion.outer" class="hidden relative">
 *         <div data-hook="accordion.inner" class="relative">
 *           <!-- Contents of accordion -->
 *         </div>
 *       </div>
 *     </div>
 *
 * Styles can be controlled either from this script by changing
 * where the data-class-active and data-class-inactive attributes
 * on the accordion, accordion.button and accordion.outer elements.
 *
 * - accordion - The wrapper for each accordion.
 * - accordion.button - The button which opens and closes the
 *   accordion.
 * - accordion.outer - The element which changes size.
 * - accordion.inner - The element which contains the expanded content
 *   and which is measured to determine the expanded size of
 *   accordion.outer.
 *
 * The data-accordion-active-where attribute determines viewports
 * at which the element behaves as an accordion. For example:
 *   data-accordion-active-where="(max-width: 799px)"
 * will cause the element to not behave as an accordion at 800
 * pixels and above.
 *
 * The data-collapsed-height attribute determines the height that
 * the accordion animates to when it's collapsed. It is interpreted
 * as a CSS value, not a number of pixels. The default is '0'.
 *
 */
// import debounce from 'debounce'
// import { selectAll, setClassState, unsetClassState } from '../utils/helpers'
import { debounce, selectAll, setClassState, unsetClassState } from '../utils/helpers'
export default class {
    
    init(){
        const accordions = selectAll('[data-hook="accordion"]');
        if (accordions.length > 0) {
            accordions.forEach((accordion) => {
                const outer = accordion.querySelector('[data-hook="accordion.outer"]')
                const inner = accordion.querySelector('[data-hook="accordion.inner"]')
                const button = accordion.querySelector('[data-hook="accordion.button"]')
                const accordionActive = accordion.dataset.classActive || 'accordion-expanded'
                const accordionInactive = accordion.dataset.classInactive || false
                const outerActive = outer.dataset.classActive || 'block'
                const outerInactive = outer.dataset.classInactive || 'hidden'
                const buttonActive = button.dataset.classActive || false
                const buttonInactive = button.dataset.classInactive || false
                const activeWhere = accordion.dataset.accordionActiveWhere
                const collapsedHeight = accordion.dataset.collapsedHeight || '0'

                if ( activeWhere ) {
                    window.addEventListener('resize', debounce(() => {
                        if ( window.matchMedia(activeWhere).matches ) {
                            outer.setAttribute('aria-expanded', (accordion.dataset.expanded === '1') ? 'true' : 'false')
                        } else {
                            outer.setAttribute('aria-expanded', 'true')
                        }
                    }), 100)
                }
    
                accordion.close = () => {
                    outer.style.height = `${inner.clientHeight}px`
                    outer.setAttribute('aria-expanded', 'false')
                    accordion.dataset.changing = '1'
                    setClassState(button, buttonInactive)
                    unsetClassState(button, buttonActive)
                    setClassState(accordion, accordionInactive)
                    unsetClassState(accordion, accordionActive)
                    setTimeout(() => {
                        outer.style.height = collapsedHeight
                    }, 5)
                    setTimeout(() => {
                        accordion.dataset.changing = '0'
                        setClassState(outer, outerInactive)
                        unsetClassState(outer, outerActive)
                        outer.style.height = ''
                    }, 110)
                    accordion.dataset.expanded = '0'
                }
                accordion.open = () => {
                    //check all accordions if open - close
                    accordions.forEach((accordion) => {
                        if (accordion.dataset.expanded === '1' && accordion.dataset.changing !== '1') {
                            accordion.close();
                        }
                    })
                    outer.setAttribute('aria-expanded', 'true')
                    setClassState(outer, outerActive)
                    unsetClassState(outer, outerInactive)
                    setClassState(button, buttonActive)
                    unsetClassState(button, buttonInactive)
                    setClassState(accordion, accordionActive)
                    unsetClassState(accordion, accordionInactive)
                    accordion.dataset.changing = '1'
                    outer.style.height = collapsedHeight
                    setTimeout(() => {
                        outer.style.height = `${inner.clientHeight}px`
                    }, 5)
                    setTimeout(() => {
                        accordion.dataset.changing = '0'
                        outer.style.height = 'auto'
                    }, 110)
                    accordion.dataset.expanded = '1'
                }
                accordion.dataset.changing = '0'
                button.addEventListener('click', () => {
                    if (accordion.dataset.changing === '1') {
                    return
                    }
                    if (accordion.dataset.expanded === '1') {
                        accordion.close()
                    } else {
                        accordion.open()
                    }
                })
            })
        }
    }
}
