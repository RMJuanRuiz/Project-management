<?php

    $conn = new mysqli('localhost', 'root', '', 'project_management');

    if($conn -> connect_error){
        echo $conn -> connect_error;
    }

    $conn -> set_charset('utf8');
    
?>