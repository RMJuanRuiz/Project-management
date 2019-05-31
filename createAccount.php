<?php
    include 'inc/functions/functions.php';
    include 'inc/templates/header.php';
?>

    <div class="container">
        <div class="createAccount-container">
            <h1 class="text-center mb-4">Create Account - Project management</h1>
            <form id="form" class="form-box" method="POST">
                <div class="field d-flex justify-content-between mb-3">
                    <label class="text-right" for="user">User: </label>
                    <input type="text" name="user" id="user" placeholder="User">
                </div>
                <div class="field d-flex justify-content-between mb-3">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <div class="campo d-flex justify-content-end">
                    <input type="hidden" id="type" value="create">
                    <input type="submit" class="btn btn-dark send" value="Create account">
                </div>
                <div class="field">
                    <a href="login.php">Login here!</a>
                </div>
            </form>
        </div>
    </div>

<?php 
    include 'inc/templates/footer.php';
?>