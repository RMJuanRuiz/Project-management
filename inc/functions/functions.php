<?php

    function getActualPage(){
        $archive = basename($_SERVER['PHP_SELF']);
        $page = str_replace(".php", "", $archive);
        return $page;
    }

    

    // Queries
    // Get all projects
    function getProjects(){
        include 'connection.php';

        try {
            return $conn -> query('SELECT * FROM project');
        } catch (Exception $e) {
            echo "Error! : " . $e -> getMessage();
            return false;
        }
    }

    function getProjectName($id = null){
        include 'connection.php';

        try {
            return $conn -> query("SELECT name FROM project WHERE id = {$id}");
        } catch (Exception $e) {
            echo "Error! : " . $e -> getMessage();
            return false;
        }

    }

    function getProjectTask($id = null){
        include 'connection.php';

        try {
            return $conn -> query("SELECT id, name, status FROM task WHERE id_project = {$id}");
        } catch (Exception $e) {
            echo "Error! : " . $e -> getMessage();
            return false;
        }

    }

