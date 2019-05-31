
eventListeners();
// Project list
var projectList = document.querySelector('ul#projects');


function eventListeners(){
    // Create new project boton
    document.querySelector(".create-project a").addEventListener('click', newProject);

}

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
    var newProject = document.createElement('li');
    newProject.className= "d-flex justify-content-start mb-2";
    newProject.innerHTML = `
        <a href = "#">
            ${projectName}
        </a>
    `;
    projectList.appendChild(newProject)
}