<?php 

    $action = $_POST['action'];
    


    if($action === 'create'){
        $project = $_POST['project'];
        // import connection
        include '../functions/connection.php';

        try {
            // Database consult

            // Prepare Statement
            $stmt = $conn -> prepare("INSERT INTO project (name) VALUES(?)");
            $stmt -> bind_param('s', $project);
            $stmt -> execute();
            if($stmt -> affected_rows > 0){
                $answer = array(
                    'answer' => 'correct',
                    'id' => $stmt -> insert_id,
                    'name' => $project,
                    'type' => $action
                );
            }
            else{
                $answer = array(
                    'answer' => 'error'
                );
            }
            $stmt -> close();
            $conn -> close();

        } catch (Exception $e) {
            // Error, take the exception
            $answer = array(
                'error' => $e -> getMessage()
            );
        }

        echo json_encode($answer);
    }
    else if($action === 'delete'){
        $projectId = $_POST['id'];

        // import connection
        include '../functions/connection.php';

        try {
            // Database consult

            // Prepare Statement
            $stmt = $conn -> prepare("DELETE FROM project WHERE id = ?");
            $stmt -> bind_param('i', $projectId);
            $stmt -> execute();
            if($stmt -> affected_rows > 0){
                $answer = array(
                    'answer' => 'correct'
                );
            }
            else{
                $answer = array(
                    'answer' => 'error'
                );
            }
            $stmt -> close();
            $conn -> close();

        } catch (Exception $e) {
            // Error, take the exception
            $answer = array(
                'error' => $e -> getMessage()
            );
        }

        echo json_encode($answer);
    }



?>