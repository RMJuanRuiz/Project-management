
eventListeners();
// Project list
var projectList = document.querySelector('ul#projects');
var taskList = document.querySelector('div.task-list ul');



function eventListeners(){

    // Document ready
    document.addEventListener('DOMContentLoaded', function(){
        updateProgress();
    });


    // Create new project boton
    document.querySelector(".create-project a").addEventListener('click', newProject);

    // Delete project
    
    document.querySelector("#projects").addEventListener('click', deleteProject);
       
    //New task boton
    if(document.querySelector(".new-task")){
        document.querySelector(".new-task").addEventListener('click', addTask);
    }
   

    // Actions botons
    document.querySelector(".task-list").addEventListener('click', taskActions);

    
}

// Create a new project
function newProject(e){
    e.preventDefault();
    
    // Create element <input> for the project name
    var newProject = document.createElement('li');
    newProject.innerHTML = '<input type="text" id="new-project">';
    projectList.appendChild(newProject);

    // Select new project id
    var inputNewProject = document.querySelector('#new-project');

    // press enter to create project
    inputNewProject.addEventListener('keypress', function(e){
        var key = e.which || e.keyCode;
        if (key ===13){
            saveProjectDB(inputNewProject.value);
            projectList.removeChild(newProject);
        }
    })
}

function saveProjectDB(projectName){
    
    //Ajax
    var xhr = new XMLHttpRequest();

    var datos = new FormData();
    datos.append('project', projectName);
    datos.append('action', 'create');

    xhr.open('POST', 'inc/model/project-model.php', true);

    xhr.onload = function(){
        if(this.status === 200){
            // Get data from the answer
            var answer = JSON.parse(xhr.responseText);
            var project = answer.name,
                id = answer.id,
                type = answer.type;
            
            if(answer.answer === "correct"){
                if(type === "create"){
                    //A new project was created
                    var newProject = document.createElement('li');
                    newProject.className= "d-flex justify-content-start mb-2";
                    newProject.innerHTML = `
                        <a href = "index.php?id_project=${id}" id="project:${id}">
                            ${project}
                        </a>
                    `;

                    // Add to HTML:
                    projectList.appendChild(newProject)

                    //Send Alert
                    swal({
                        title: 'Project created!',
                        text: 'Project: ' + project + ' was created correctly',
                        type: 'success'
                    })
                    .then(function(result){
                        if(result.value){
                            // Redirect to new URL:
                            window.location.href = 'index.php?id_project=' + id;
                        }
                    })

                }else{
                    //Update or delete
                }
            }else{
                // Error
                swal({
                    title: 'Error!',
                    text: "Something went wrong",
                    type: 'error'
                });
            }
        }
    }

    xhr.send(datos);
    
}

// Delete project
function deleteProject(e){
    if(e.target.classList.contains('fa-trash')){ 
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                var deleteProject = e.target.parentElement.parentElement;

                // Delete project from BD and HTML
                var result = deleteProjectBD(deleteProject);     
            }
            })
    }
}

// Delete project from BD
function deleteProjectBD(project){
    var projectId = project.id.split(":")[1];
    
    // AJAX
    var xhr = new XMLHttpRequest();

    var data = new FormData();
    data.append('id', projectId);
    data.append('action', 'delete');
    
    xhr.open('POST', 'inc/model/project-model.php', true);

   
    xhr.onload = function(){
        if(this.status === 200){
            answer = JSON.parse(xhr.responseText);
            console.log(answer);
            if(answer.answer === "error"){
                Swal.fire(
                    'Error!',
                    'First you have to delete project tasks',
                    'error'
                ) 
            }else{
                //remove from HTML
                project.remove();
                Swal.fire(
                    'Deleted!',
                    'Project has been deleted.',
                    'success'
                )

                // Redirect to new URL:
                window.location.href = "index.php";
            }        
        }
        
    }
    
    xhr.send(data);
    
}



// Add new task to actual projec
function addTask(e){
    e.preventDefault();
    
    var taskName = document.querySelector('.task-name').value;
    // Validate that the field has something
    if(taskName === '' || (/^\s+|\s+$/.test(taskName))){
        swal({
            title: 'Error!',
            text: "Task can not be empty",
            type: 'error'
        });
    }else{
        //Task has something, insert it in PHP

        var xhr = new XMLHttpRequest();

        var data = new FormData();
        data.append('task', taskName);
        data.append('action', 'create');
        data.append('id_project', document.querySelector("#id-project").value);

        xhr.open('POST', 'inc/model/task-model.php', true);

        xhr.onload = function(){
            if(this.status === 200){
                var answer = JSON.parse(xhr.responseText);
                var task = answer.name,
                    id = answer.id,
                    type = answer.type;
                if(answer.answer === 'correct'){
                    if(type === 'create'){
                        //Send Alert
                        swal({
                            title: 'Task created!',
                            text: 'Task: ' + task + ' was created correctly',
                            type: 'success'
                        })

                        // Select paragraph with the empty list
                        var paragraphTask = document.querySelectorAll(".empty-list");
                        if(paragraphTask.length > 0){
                            document.querySelector(".empty-list").remove();
                        }
                        // Create new task
                        var newTask = document.createElement('li');

                        //add id and Class
                        newTask.id = 'task:'+ id;
                        newTask.className = 'task d-flex justify-content-between'

                        // build HTML
                        newTask.innerHTML = `
                            <p class="d-inline">${task}</p>
                            <div class = "action d-inline">
                                <i class="far fa-check-circle mx-4"></i>
                                <i class="fas fa-trash m-auto px-4"></i>
                            </div>
                        `;

                        // Add to HTML
                        taskList.appendChild(newTask);

                        // Clear form
                        document.querySelector(".add-task").reset();

                        // Update the progress each time a new task it's created
                        updateProgress();
                    }
                }else{
                    swal({
                        title: 'Error!',
                        text: "Something went wrong",
                        type: 'error'
                    });
                }
            }
        }
        xhr.send(data);
    }
}

// Change status or delete tasks
function taskActions(e){
    e.preventDefault();
    
    if(e.target.classList.contains('fa-check-circle')){
        if(e.target.classList.contains('complete')){
            e.target.classList.remove('complete');
            changeTaskStatus(e.target, 0);
        }else{
            e.target.classList.add('complete');
            changeTaskStatus(e.target, 1);
        }
    }else if(e.target.classList.contains('fa-trash')){ 
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                var deleteTask = e.target.parentElement.parentElement;

                // Delete task from BD
                deleteTaskBD(deleteTask);
                // Detele task from HTML
                deleteTask.remove();

                Swal.fire(
                'Deleted!',
                'Task has been deleted.',
                'success'
                )
            }
            })
    }
}

// Change task stastus in BD
function changeTaskStatus(task, status){
    var taskId = task.parentElement.parentElement.id.split(':')
    
    // AJAX
    var xhr = new XMLHttpRequest();

    var data = new FormData();
    data.append('id', taskId[1]);
    data.append('action', 'update');
    data.append('status', status);
    
    xhr.open('POST', 'inc/model/task-model.php', true);

    
    xhr.onload = function(){
        if(this.status === 200){
            // update the progress each time a task change it's status
            updateProgress();
        }
    }
    

    xhr.send(data);
}


// Delete task from BD
function deleteTaskBD(task){
    var taskId = task.id.split(':')
    
    // AJAX
    var xhr = new XMLHttpRequest();

    var data = new FormData();
    data.append('id', taskId[1]);
    data.append('action', 'delete');
    
    xhr.open('POST', 'inc/model/task-model.php', true);

   
    xhr.onload = function(){
        if(this.status === 200){
            
            // Check if there are remaining tasks
            var remainingTask = document.querySelectorAll("li.task");
            if(remainingTask.length === 0){
                document.querySelector("div.task-list ul").innerHTML = "<p class='empty-list d-inline task d-flex justify-content-center'>There are not tasks from this project</p>";
                
            }

            // Update the progress each time a task it's deleted
            updateProgress();
        }
    }
    
    xhr.send(data);
}

// Update project progress 
function updateProgress(){
    
    // get tasks
    var tasks = document.querySelectorAll('li.task');
    if(tasks.length > 0){
        // get completed tasks
        var completedTasks = document.querySelectorAll('i.complete');

        // Calculate advance
        var advance = Math.round((completedTasks.length / tasks.length)*100);
        
    }else{ // If there are not tasks
        var advance = 0;
    }

    //Assign advance to the bar
    var percentage = document.querySelector('#percentage');
    percentage.style.width = advance+'%';

    if(advance === 100){
        swal({
            title: 'Congratulations!',
            text: "You completed 100% of the project's tasks",
            type: 'success'
        })
    }
    
}
