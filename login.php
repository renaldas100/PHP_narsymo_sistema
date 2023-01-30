<?php

//echo password_hash("admin",PASSWORD_DEFAULT);

session_start();

if(isset($_POST['user'])) {

//    echo $_POST['user']."<br>";
//    echo $_POST['password'];

    if ($_POST['user'] == 'admin' && password_verify($_POST['password'], '$2y$10$sXSafrxZ08XFJKWgVRwysuZo5Pwhe7tBxsJGVlUAlCTNdVgB8/v6a')) {
//    if ($_POST['user'] == 'admin' && $_POST['password']== 'admin') {

        $no = rand(1, 1000);
        $_SESSION['user_id'] = $no;
        echo $no;
        header('location: narsymo_sistema.php');
    } else {
        $error= "prisijungimai neteisingi";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Meniu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Rekursinė funkcija</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="narsymo_sistema.php">Naršymo sistema</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card">
                <div class="card-header">
                    Prisijunkite prie naršymo sistemos
                </div>
                <div class="card-body">
                    <form method="post">
                        <label>Įveskite vartotojo vardą</label><br>
                        <input type="text" name="user"><br>
                        <label class="mt-3">Įveskite slaptažodį</label><br>
                        <input type="password" name="password"><br>
                        <button class="btn btn-success mt-3" type="submit">Prisijungti</button>

                    </form>

                </div>
            </div>
            <div class="mt-4 text-uppercase fw-bold">
                <?= isset($error)?$error:""?>
            </div>
            <div class="mt-3">
                <?= isset($error)?"Įveskite:<br> vardas: admin <br> slaptažodis: admin":""?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>
