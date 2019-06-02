<?php
    include 'inc/functions/sessions.php';
    include 'inc/functions/functions.php';
    include 'inc/templates/header.php';

    $id_project = '';
    // Get id from URL
    if(isset($_GET['id_project'])){
        $id_project = $_GET['id_project'];
    }
?>

    <div class="bar d-flex align-items-center justify-content-between">
        <h1 class="ml-2"><a href="index.php"><i class="fas fa-tasks mr-3"></i>Project management</a></h1>
        <a class="mr-2" href="login.php?close_session=true">Logout</a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php include 'inc/templates/sidebar.php'; ?>

            <main class="col-sm-8 col-lg-9 main-content">

                <?php 
                $project = getProjectName($id_project);

                if($project){ ?>
                    <h2>Project name: 
                        <?php 
                            foreach($project as $name){ ?>
                                <span><?php echo $name['name']; ?></span>
                            <?php } ?>
                    </h2> 
                
                    <form action="#" class="add-task">
                        <div class="field ">
                            <label for="task">Add new task:</label>
                            <input type="text" placeholder="Task name" class="task-name" id="task"> 
                        </div>
                        <div class="field d-flex justify-content-end">
                            <input type="hidden" id="id-project" value="<?php echo $id_project; ?>" value="id-project">
                            <input type="submit" class="btn btn-dark send new-task" value="Add task">
                        </div>
                    </form>

                <?php }else{
                    // No projects:
                    echo "<h2>Select a project from the menu</h2><br>";
                } ?>


                <h3>Task list</h3>
                <div class="task-list">
                    <ul>
                        <?php 
                        //Get Tasks from actual project:
                        $tasks = getProjectTask($id_project);
                        if($tasks){
                            if($tasks -> num_rows > 0){
                                // There are tasks
                                foreach($tasks as $task){ ?>
                                    <li id="task:<?php echo $task['id']; ?>" class="task d-flex justify-content-between">
                                        <p class="d-inline"><?php echo $task['name']; ?></p>
                                        <div class="action d-inline">
                                            <i class="far fa-check-circle mx-4 <?php echo($task['status'] === '1' ? 'complete' : '')?>"></i>
                                            <i class="fas fa-trash m-auto px-4"></i>
                                        </div>
                                    </li>  
                                <?php }
                            }else{
                                // No tasks
                                echo "<p class='empty-list d-inline task d-flex justify-content-center'>There are not tasks from this project</p>";
                            }
                        }else{
                            echo "<p class='d-inline task d-flex justify-content-center'>Select a project</p>";
                        }
                        

                        ?>
                    </ul>
                </div>

                <div class="advance">
                    <h3>Project advance:</h3>
                    <div id="advance-bar" class="advance-bar mt-3">
                        <div id="percentage" class="percentage">
                        
                        </div>
                    </div>
                </div>


            </main>

        </div>
    </div>
    
<?php 
    include 'inc/templates/footer.php';
?>