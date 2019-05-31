    <script src="js/sweetalert2.all.min.js"></script>

    <?php
        $actual = getActualPage();
        if($actual == 'createAccount' || $actual == 'login'){
            echo '<script src="js/form.js"></script>';
        }else{
            echo '<script src="js/scripts.js"></script>';
        }
    ?>

</body>
</html>