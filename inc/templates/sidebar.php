<aside class="col-sm-4 col-lg-3 project-content">
    <div class="create-project">
        <a class="btn btn-dark btn-block" href="#">Create new project<i class="fas fa-plus ml-4"></i></a>
    </div>
    
    <div class="project-list mt-4">
        <h2 class="text-center">Project list</h2>

        <ul id="projects">
            <?php
                $projects = getProjects();
                if($projects){
                    foreach($projects as $project){?>

                        
                        <li class="project d-flex justify-content-between mb-2 ml-2 pb-2" id="project:<?php echo $project['id'];?>">
                            <a href = "index.php?id_project=<?php echo $project['id'];?>">
                                <?php echo $project['name'];?>
                            </a>

                            <div class="delete-project my-auto">
                                <i class="fas fa-trash"></i>
                            </div>
                        
                        </li>

                    <?php }
                }

            ?>
        </ul>
    </div>
        
</aside>