<?php


if (isset($_POST['a'], $_POST['b'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];


    function dbd($a, $b){
//        echo "a=".$a." ir b=".$b."<br>";
        if ($a == $b) {
//            echo "a=".$a." ir b=".$b."<br>";
            return $a;
        }
        if ($a < $b) {
//            echo "a=".$a." ir b=".$b."<br>";
            return dbd($a, $b - $a);
        }
        if ($a > $b) {
//            echo "a=".$a." ir b=".$b."<br>";
            return dbd($a - $b, $b);
        }
    }

//    echo dbd($a, $b);

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekursinės funkcijos</title>
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
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Rekursinės funkcijos pagalba raskite dviejų natūraliųjų skaičių didžiausią bendrą daliklį
                </div>
                <div class="card-body">
                    <form method="post">
                        <div>Natūralusis skaičius a</div>
                        <input class="col-12" type="text" name="a">
                        <div class="mt-3">Natūralusis skaičius b</div>
                        <input class="col-12" type="text" name="b">
                        <button class="btn btn-success mt-4 col-12" type="submit">Sužinokite didžiausią bendrą daliklį
                        </button>
                    </form>
                </div>
            </div>
            <div class="mt-3">
                <?php if (isset($a)) { ?>
                    Jūsų natūralusis skaičius <b>a</b> yra: <b><?= $a ?></b><br>
                    Jūsų natūralusis skaičius <b>b</b> yra: <b><?= $b ?></b><br>
                    Didžiausias daliklis yra: <b><?= dbd($a,$b) ?></b><br>
                <?php } ?>
            </div>
        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>







</body>
</html>
