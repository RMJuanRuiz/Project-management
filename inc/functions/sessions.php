<?php
    
    function authenticateUser(){
        if(!checkUser()){
            header('Location: login.php');
            exit();
        }
    }

    function checkUser(){
        return isset($_SESSION['nombre']);
    }

    session_start();
    authenticateUser();

    



?>