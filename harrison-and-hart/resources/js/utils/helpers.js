export const getController = element => modules[+element.dataset.moduleIndex]

//Converts querySelector nodes to array
export const selectAll = (selector) => {
    const matches = document.querySelectorAll(selector)
    const matchesArray = Array.from(matches);
    return matchesArray;
}

// from https://davidwalsh.name/javascript-debounce-function
export const debounce = function debounce(func, wait, immediate) {
    let timeout;
    return function() {
        const context = this;
        const args = arguments;
        const later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

export const setClassState = (element, stateClassName) => {
    if (!stateClassName) {
      return
    }
    stateClassName.split(' ').forEach((stateClass) => {
      element.classList.add(stateClass)
    })
  }
  
  export const unsetClassState = (element, stateClassName) => {
    if (!stateClassName) {
      return
    }
    stateClassName.split(' ').forEach((stateClass) => {
      element.classList.remove(stateClass)
    })
  }
  