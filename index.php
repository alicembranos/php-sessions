<?php
require_once("./modules/sessionController.php");

$alert =  checkSession();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./assets/css/main.css" rel="stylesheet">
    <title>PHP Sessions</title>
</head>

<body>
    <div class="global-container">
        <main class="card login-form">
            <section class="card-body">
                <img class="image" src="./assets/images/login.png" alt="Login" width="100" height="100">
                <h1 class="card-title text-center">LOGIN</h1>
                <article class="card-text">
                    <form action="./modules/login.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input class="form-control form-control-sm" id="email" name="email" type="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control form-control-sm" id="password" name="password" type="password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                    </form>
                </article>
                <!-- alert message -->
                <?= ($alert) ? "<div class='alert alert-$alert[type] role='alert'>$alert[message]</div>" : "" ?>
            </section>
        </main>
    </div>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>