<?php
    session_start();

    include 'inc/functions/functions.php';
    include 'inc/templates/header.php';

    // Close session
    if(isset($_GET['close_session'])){
        $_SESSION = array();
    }
?>

    <div class="container">
        <div class="createAccount-container">
            <h1 class="text-center mb-4">Login - Project management</h1>

            <form id="form" class="form-box" method="POST">
                <div class="field d-flex justify-content-between mb-3">
                    <label for="user">User: </label>
                    <input type="text" name="user" id="user" placeholder="User">
                </div>
                <div class="field d-flex justify-content-between mb-3">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="field  d-flex justify-content-end">
                    <input type="hidden" id="type" value="login">
                    <input type="submit" class="btn btn-dark send" value="Login">
                </div>
                <div class="field">
                    <a href="createAccount.php">Create your account here!</a>
                </div>
            </form>
        </div>
    </div>

<?php 
    include 'inc/templates/footer.php';
?>