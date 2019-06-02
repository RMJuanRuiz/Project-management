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

                        
                        <li class="d-flex justify-content-start mb-2 ml-2">
                            <a href = "index.php?id_project=<?php echo $project['id'];?>" id="project:<?php echo $project['id'];?>">
                                <?php echo $project['name'];?>
                            </a>
                        </li>

                    <?php }
                }

            ?>
        </ul>
    </div>
        
</aside>