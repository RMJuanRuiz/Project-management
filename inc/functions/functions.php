<?php

    function getActualPage(){
        $archive = basename($_SERVER['PHP_SELF']);
        $page = str_replace(".php", "", $archive);
        return $page;
    }
