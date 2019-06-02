<?php 

    $action = $_POST['action'];

    if($action === 'create'){
        $id_project = (int) $_POST['id_project'];
        $task = $_POST['task'];
        
        // import connection
        include '../functions/connection.php';

        try {
            // Database consult

            // Prepare Statement
            $stmt = $conn -> prepare("INSERT INTO task (name, id_project) VALUES(?, ?)");
            $stmt -> bind_param('si', $task, $id_project);
            $stmt -> execute();
            if($stmt -> affected_rows > 0){
                $answer = array(
                    'answer' => 'correct',
                    'id' => $stmt -> insert_id,
                    'name' => $task,
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

    }else if($action === 'update'){
        $status = $_POST['status'];
        $taskId = $_POST['id'];

        // import connection
        include '../functions/connection.php';

        try {
            // Database consult

            // Prepare Statement
            $stmt = $conn -> prepare("UPDATE task SET status = ? WHERE id = ?");
            $stmt -> bind_param('ii', $status, $taskId);
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

    }else if($action === 'delete'){
        $taskId = $_POST['id'];

        // import connection
        include '../functions/connection.php';

        try {
            // Database consult

            // Prepare Statement
            $stmt = $conn -> prepare("DELETE FROM task WHERE id = ?");
            $stmt -> bind_param('i', $taskId);
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