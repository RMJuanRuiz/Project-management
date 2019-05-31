<?php
    include 'inc/functions/sessions.php';
    include 'inc/functions/functions.php';
    include 'inc/templates/header.php';
?>

    <div class="bar d-flex align-items-center justify-content-between">
        <h1 class="ml-2"><i class="fas fa-tasks mr-3"></i>Project management</h1>
        <a class="mr-2" href="login.php?close_session=true">Logout</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php include 'inc/templates/sidebar.php'; ?>

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
    
<?php 
    include 'inc/templates/footer.php';
?>