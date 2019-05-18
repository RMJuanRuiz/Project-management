<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project management</title>
    <link rel="shortcut icon" href="img/tab.png">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600&display=swap" rel="stylesheet">
</head>
<body class="createAccount">
    <div class="container">
        <div class="createAccount-container">
            <h1 class="text-center mb-4">Create Account - Project management</h1>
            <form id="form" class="login-box" method="POST">
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

</body>
</html>