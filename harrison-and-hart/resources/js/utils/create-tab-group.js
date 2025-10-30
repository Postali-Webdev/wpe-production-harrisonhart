import { getController, selectAll } from './helpers'

export default class{
    
    constructor({tabs, folders, folderSet, heightOffset, showClass, closeButtons}) {
        let openFolder = null
        const folderFromTab = tab => folders.filter(folder => folder.dataset.folder === tab.dataset.folder)[0]
        
        const tabFromFolder = folder => tabs.filter(tab => tab.dataset.folder === folder.dataset.folder)[0]
        
        const close = (folder, toOpenAnother) => {
            const tab = tabFromFolder(folder)
            tabFromFolder(folder).classList.remove('tab-expanded')
            if (!toOpenAnother) {
            folderSet.style.height = `${folder.clientHeight + heightOffset}px`
            folderSet.dataset.changing = '1'
            }
            setTimeout(() => {
            if (toOpenAnother) {
                folder.classList.add('hidden')
                folder.classList.remove(showClass)
            } else {
                folderSet.style.height = '0'
            }
            }, 5)
            if (!toOpenAnother) {
            setTimeout(() => {
                openFolder = null
                folderSet.dataset.changing = '0'
                folderSet.style.display = 'none'
                folder.classList.add('hidden')
                folder.classList.remove(showClass)
                tabs.forEach(tab => tab.classList.add('no-tabs-expanded'))
            }, 310)
            }
        }
        const open = (folder, previouslyOpenFolder) => {
            console.log("open")
            tabFromFolder(folder).classList.add('tab-expanded')
            folderSet.style.display = 'block'
            folderSet.dataset.changing = '1'
            folder.classList.remove('hidden')
            folder.classList.add(showClass)
            if (previouslyOpenFolder) {
            folderSet.style.height = `${previouslyOpenFolder.clientHeight + heightOffset}px`
            } else {
            tabs.forEach(tab => tab.classList.remove('no-tabs-expanded'))
            }
            setTimeout(() => {
            folderSet.style.height = `${folder.clientHeight + heightOffset}px`
            }, 5)
            setTimeout(() => {
            folderSet.dataset.changing = '0'
            folderSet.style.height = 'auto'
            openFolder = folder
            }, 310)
        }
        const handleCloseButtonClicked = () => {
            if (openFolder) {
            close(openFolder)
            }
        }
        folderSet.dataset.changing = '0'
        folderSet.style.display = 'none'
        closeButtons.forEach((closeButton) => {
            closeButton.addEventListener('click', handleCloseButtonClicked)
        })
        tabs.forEach((tab) => {
            tab.addEventListener('click', () => {
            if (folderSet.dataset.changing === '1') {
                return
            }
            const folder = folderFromTab(tab)
            console.log("folder: \n" + folder)
            if (openFolder === folder) {
                close(folder)
            } else if (openFolder !== null) {
                close(openFolder, true)
                open(folder, openFolder)
            } else {
                open(folder)
            }
            })
        })
    }
}
