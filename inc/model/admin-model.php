<?php 
    $user = $_POST['user'];
    $password = $_POST['password'];
    $action = $_POST['action'];

    if($action === 'create'){
        //Create user

        // Password hash
        $options = array(
            'cost' => 12 // 10 recommended, 12 is more secure, but, it consumes more.
        );
        $hash_password = password_hash($password, PASSWORD_BCRYPT, $options);

        // import connection
        include '../functions/connection.php';

        try {
            // Database consult

            // Prepare Statement
            $stmt = $conn -> prepare("INSERT INTO user (user, password) VALUES(?, ?)");
            $stmt -> bind_param('ss', $user, $hash_password);
            $stmt -> execute();
            if($stmt -> affected_rows > 0){
                $answer = array(
                    'answer' => 'correct',
                    'id' => $stmt -> insert_id,
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
    else if($action === 'login'){
        // Login

        include '../functions/connection.php';

        try {
            // Database consult
            $stmt = $conn -> prepare("SELECT * FROM user WHERE user = ?");
            $stmt -> bind_param('s', $user);
            $stmt -> execute();
            
            // Login
            $stmt -> bind_result($id_user, $name_user, $pass_user);
            $stmt -> fetch();
            
            if($name_user){
                // user exists
                if(password_verify($password, $pass_user)){
                    // Login
                    session_start();
                    $_SESSION['nombre'] = $user;
                    $_SESSION['id'] = $id_user;
                    $_SESSION['login'] = true;


                    // Correct Login
                    $answer = array(
                        'answer' => 'correct',
                        'name' => $name_user,
                        'type' => $action
                    );
                }else{
                    //send error, incorrect login
                    $answer =array (
                        'answer' => 'incorrectPassword'
                    );
                }       
            }else{
                $answer = array(
                    'answer' => "errorUser"
                );
            }

            $stmt -> close();
            $conn -> close();

            

        } catch (Exception $e) {
            // Error, take the exception
            $answer = array(
                'pass' => $e -> getMessage()
            );
        }
        
        echo json_encode($answer);
    }
 
?>