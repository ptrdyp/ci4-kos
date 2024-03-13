window.setTimeout(function(){
    var taskList = document.querySelector(".task-list");
    taskList.style.transition = "opacity 0.5s linear 0s";
    taskList.style.opacity = 0;

    window.setTimeout(function(){
        taskList.style.display = 'none';
    }, 500);
}, 3000);
