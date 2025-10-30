import { debounce, selectAll, setClassState, unsetClassState } from '../utils/helpers'
export default class {
    constructor() {
        this.accordions = null;
        this.panels = null;
        this.openFolder = null;
        this.folders = null;
        this.tabs = null;
        this.folderSet = null;
        this.heightOffset = null;
        this.showClass = 'show';
    }
    init(){
        this.accordions = selectAll('[data-hook="accordion"]');
        if (this.accordions.length > 0) {
            this.accordions.forEach((accordion) => {
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
                    }), 200)
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
                    }, 310)
                    accordion.dataset.expanded = '0'
                }
                accordion.open = () => {
                    if (!!this.openFolder) {
                        this.closePanel(this.openFolder);
                    }
                    this.closeAccordions();
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
                    }, 310)
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

        this.folderSets = selectAll('[data-hook="megaMenu.folderSet"]');
        if (this.folderSets.length > 0) {
            this.folderSets.forEach((folderSet) => {
                createTabGroup({
                    tabs: selectAll('[data-hook="megaMenu.tab"]'),
                    folders: selectAll('[data-hook="megaMenu.folder"]'),
                    folderSet,
                    heightOffset: 4,
                    showClass: 'show',
                })
            })
        }
    }

    //check all this.accordions if open - close
    closeAccordions(){
        this.accordions.forEach((accordion) => {
            if (accordion.dataset.expanded === '1' && accordion.dataset.changing !== '1') {
                accordion.close();
            }
        });
    };

    openPanel(folder, previouslyOpenFolder) {
        const tab = this.tabFromFolder(folder)
        this.tabFromFolder(folder).classList.remove('tab-expanded')
        console.log("<< openPanel",folder,previouslyOpenFolder );
        if (!previouslyOpenFolder) {
            console.log("<< !!!! folderSet",this.folderSet );
            this.folderSet.style.height = `${previouslyOpenFolder.clientHeight + this.heightOffset}px`
            this.folderSet.dataset.changing = '1'
        }
        setTimeout(() => {
            if (toOpenAnother) {
                folder.classList.add('hidden')
                folder.classList.remove(this.showClass)
            } else {
                this.folderSet.style.height = '0'
            }
        }, 5)
        if (!toOpenAnother) {
            setTimeout(() => {
                this.openFolder = null
                this.folderSet.dataset.changing = '0'
                this.folderSet.style.display = 'none'
                folder.classList.add('hidden')
                folder.classList.remove(this.showClass)
                this.tabs.forEach(tab => tab.classList.add('no-tabs-expanded'))
                console.log("<< !!!! 2222 folderSet",folder, this.folderSet );
            }, 310)
        }
    };

    closePanel(folder, toOpenAnother){
        console.log(">>closePanel",folder);
        const tab = this.tabFromFolder(folder)
        this.tabFromFolder(folder).classList.remove('tab-expanded')
        if (!toOpenAnother) {
            this.folderSet.style.height = `${folder.clientHeight + this.heightOffset}px`
            this.folderSet.dataset.changing = '1'
        }
        setTimeout(() => {
            if (toOpenAnother) {
                folder.classList.add('hidden')
                folder.classList.remove(this.showClass)
            } else {
                this.folderSet.style.height = '0'
            }
        }, 5)
        if (!toOpenAnother) {
            setTimeout(() => {
                this.openFolder = null
                this.folderSet.dataset.changing = '0'
                this.folderSet.style.display = 'none'
                folder.classList.add('hidden')
                folder.classList.remove(this.showClass)
                tabs.forEach(tab => tab.classList.add('no-tabs-expanded'))
            }, 310)
        }
    }

    folderFromTab(tab){
        let folder = this.folders.filter(folder => folder.dataset.folder === tab.dataset.folder)[0];
        console.log("folderFromTab()",tab,folder);
        return folder
    }
    tabFromFolder(folder){
        return this.tabs.filter(tab => tab.dataset.folder === folder.dataset.folder)[0]
    }

    // createTabGroup ({tabs, folders, folderSet, heightOffset, showClass}) {
    //     this.openFolder = null;
    //     this.folders = folders;
    //     this.tabs = tabs;
    //     this.folderSet = folderSet;
    //     this.heightOffset = heightOffset;
       
    //     this.folderSet.dataset.changing = '0'
    //     this.folderSet.style.display = 'none'

    //     this.tabs.forEach((tab) => {
    //         tab.addEventListener('click', () => {
    //             if (this.folderSet.dataset.changing === '1') {
    //                 return
    //             }
    //             let folder = this.folderFromTab(tab);
    //             console.log("TAB CLICK folder",folder,this.openFolder);
    //             this.closeAccordions();
    //             if (this.openFolder === folder) {
    //                 this.closePanel(folder)
    //             } else if (this.openFolder !== null) {
    //                 console.log("AAA");
    //                 this.closePanel(this.openFolder, true)
    //                 this.openPanel(folder, this.openFolder)
    //             } else {
    //                 console.log("BBBB");
    //                 this.openPanel(folder)
    //             }
    //         })
    //     })
    // }
}
