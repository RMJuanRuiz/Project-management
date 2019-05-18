<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project management</title>
    <link rel="shortcut icon" href="img/tab.png">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="bar d-flex align-items-center justify-content-between">
        <h1 class="ml-2"><i class="fas fa-tasks mr-3"></i>Project management</h1>
        <a class="mr-2" href="#">Logout</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <aside class="col-sm-4 col-lg-3 project-content">
                <div class="create-project">
                    <a class="btn btn-dark btn-block" href="#">Create new project<i class="fas fa-plus ml-4"></i></a>
                </div>
                
                <div class="project-list mt-4">
                    <h2>Project list</h2>

                    <ul id="projects">
                        <li class="d-flex justify-content-start mb-2">
                            <a href="#">Web page design</a>
                        </li>

                        <li class="d-flex justify-content-start mb-2">
                            <a href="#">New site in Wordpress</a>     
                        </li>
                    </ul>
                </div>
                   
            </aside>

            <main class="col-sm-8 col-lg-9 main-content">
                <h2>Web page design</h2>

                <form action="#" class="add-task">
                    <div class="field ">
                        <label for="task">Add new task:</label>
                        <input type="text" placeholder="Task name" class="task-name" id="task"> 
                    </div>
                    <div class="field d-flex justify-content-end">
                        <input type="hidden" id="id-project" value="id-project">
                        <input type="submit" class="btn btn-dark send " value="Add task">
                    </div>
                </form>


                <h3>Task list</h3>
                <div class="task-list">
                    <ul>
                        <li id="#" class="tarea d-flex justify-content-between">
                            <p class="d-inline">Change logo</p>
                            <div class="action d-inline">
                                <i class="far fa-check-circle mx-4"></i>
                                <i class="fas fa-trash m-auto px-4"></i>
                            </div>
                        </li>  

                        <li id="#" class="tarea d-flex justify-content-between">
                            <p class="d-inline">Better the front-end</p>
                            <div class="action d-inline">
                                <i class="far fa-check-circle mx-4"></i>
                                <i class="fas fa-trash m-auto px-4"></i>
                            </div>
                        </li> 
                    </ul>
                </div>
            </main>

        </div>
        
    
    </div>
    


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>