import { Tasks } from './tasks';
document.addEventListener("DOMContentLoaded", function(event) {
    Tasks.forEach((task, index) => {
        window.tasks[index] = new task();
        window.tasks[index].init();
    });
});
