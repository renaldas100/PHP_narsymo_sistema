<?php

session_start();
require_once "tikrinamas_prisijungimas.php";


if(isset($_GET['logout'])){
    unset($_SESSION['user_id']);
    session_destroy();
    header('location: login.php');
    die();
}


$d="C:/xampp/htdocs/KOPIJA_TRINTI_dashboard";

if(isset($_GET['dir'])) {
    $d = $_GET['dir'];
}


if(isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    unlink($delete);
}

if(isset($_GET['sukurtiKataloga'])) {
    $sukurti = $_GET['sukurtiKataloga'];
    mkdir($sukurti, 0777);
//    echo $sukurti;
}

//scandir()
//$dirrr = scandir($d);
//print_r($dirrr);


// PAIEŠKA

if(isset($_POST['search'])) {
    $search = $_POST['search'];

    $files = scandir($d);
    foreach ($files as $file) {
        if (strpos($search, $file) !== false) {
            $paieska= "Failas rastas- ".$search;

//            $file = fopen($search, "r") or die("Unable to open file!");
//            echo fread($file,filesize($search));
//            fclose($file);

//            echo "<a href='file:///$d/zh_tw/png2pdf.pdf' target='_blank'>atidaryti</a>";
////            echo strpos($search, $file);
            break;
        }
        else {
            $paieska= "Failas nerastas. Jūs ieškojote: ".$search;
            break;
        }
    }
}


function printDir($dirName){
    $dir=opendir($dirName);
    $count=0;



    echo "<tr>";
    while ($item = readdir($dir)) {
        if($item=='.' || $item=='..') continue;

//        echo $dirName."/".$item."<br>";
        $back= dirname($dirName."/".$item,2);
//        echo "<td>";

        if(is_dir($dirName."/".$item)) {
//          echo "[Katalogas]";
//          printDir($dirName."/".$item);

            echo "<td>";
            echo "<img src='https://icon-library.com/images/folder-icon-svg/folder-icon-svg-7.jpg' height='30' alt='image'>";
            echo "</td>";

            echo "<td>";
            echo "<a href='?dir=$dirName/$item'>$item</a>";
            echo "</td>";

            // KATALOGO DYDŽIO SKAIČIAVIMAS:
            echo "<td>";
            $dirr=$dirName."/".$item;
            $size = 0;
            foreach (glob(rtrim($dirr, '/').'/*', GLOB_NOSORT) as $each) {
                $size += is_file($each) ? filesize($each) : folderSize($each);
            }
            // KATALOGO APIMTIS bytes:
//            echo $size;
            $fsizebyte=$size;
            // KATALOGO APIMTIS pagal dydį kitais vienetais:
            if ($fsizebyte < 1024) {
                $fsize = $fsizebyte." bytes";
            }elseif (($fsizebyte >= 1024) && ($fsizebyte < 1048576)) {
                $fsize = round(($fsizebyte/1024), 2);
                $fsize = $fsize." KB";
            }elseif (($fsizebyte >= 1048576) && ($fsizebyte < 1073741824)) {
                $fsize = round(($fsizebyte/1048576), 2);
                $fsize = $fsize." MB";
            }elseif ($fsizebyte >= 1073741824) {
                $fsize = round(($fsizebyte/1073741824), 2);
                $fsize = $fsize." GB";
            };
            echo $fsize;
            echo "</td>";

        } else{
//            echo "<td>";
//            echo $item;
//            echo "</td>";
        }



        if(is_file($dirName."/".$item)){
            $ext=pathinfo($dirName."/".$item,PATHINFO_EXTENSION);
//            $count++;

            if($ext=='php'){
                echo "<td>";
                echo "<img src='https://www.svgrepo.com/show/255823/php.svg' height='35' alt='image'>";
                echo "</td>";

                echo "<td><a href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo $item;
                echo "</a></td>";

                echo "<td>";
                echo round(((filesize($dirName."/".$item))/1024),2).' KB';
                echo "</td>";

                echo "<td>[PHP failas, adresas:".$dirName."/".$item."]</td>";

                echo "<td><a target='_blank' href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo "Redaguoti";
                echo "</a></td>";
            }

            if($ext=='html'){
                echo "<td>";
                echo "<img src='https://www.svgrepo.com/download/7866/html.svg' height='35' alt='image'>";
                echo "</td>";

                echo "<td><a href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo $item;
                echo "</a></td>";

                echo "<td>";
                echo round(((filesize($dirName."/".$item))/1024),2).' KB';
                echo "</td>";

                echo "<td>[HTML failas, adresas:".$dirName."/".$item."]</td>";

                echo "<td><a target='_blank' href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo "Redaguoti";
                echo "</a></td>";
            }
            if($ext=='txt'){
                echo "<td>";
                echo "<img src='https://www.svgrepo.com/show/245665/txt.svg' height='35' alt='image'>";
                echo "</td>";

                echo "<td><a href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo $item;
                echo "</a></td>";

                echo "<td>";
                echo round(((filesize($dirName."/".$item))/1024),2).' KB';
                echo "</td>";

                echo "<td>[TXT failas, adresas:".$dirName."/".$item."]</td>";

                echo "<td><a target='_blank' href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo "Redaguoti";
                echo "</a></td>";
            }

            if($ext=='jpg' || $ext=='png' || $ext=='svg'){
                echo "<td>";
                echo "<img src='https://cdn-icons-png.flaticon.com/128/1824/1824880.png' height='35' alt='image'>";
                echo "</td>";

                echo "<td><a href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo $item;
                echo "</a></td>";

                echo "<td>";
                echo round(((filesize($dirName."/".$item))/1024),2).' KB';
                echo "</td>";

                echo "<td>[failas, adresas:".$dirName."/".$item."]</td>";

                echo "<td><a target='_blank' href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo "Redaguoti";
                echo "</a></td>";
            }

            if($ext!='html' && $ext!='php' && $ext!='jpg' && $ext!='png' && $ext!='svg' && $ext!='txt'){
                echo "<td>";
                echo "<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Icon-doc.svg/1621px-Icon-doc.svg.png' height='35' alt='image'>";
                echo "</td>";

                echo "<td><a href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo $item;
                echo "</a></td>";

                echo "<td>";
                echo round(((filesize($dirName."/".$item))/1024),2).' KB';
                echo "</td>";

                echo "<td>[failas, adresas:".$dirName."/".$item."]</td>";

                echo "<td><a target='_blank' href='edit.php?path=".$dirName."/".$item."&dir=".$dirName."'>";
                echo "Redaguoti";
                echo "</a></td>";
            }

            echo "<td><a href='?delete=".$dirName."/".$item."&dir=".$dirName."'>";
            echo "Trinti";
            echo "</a></td>";
        }
        echo "</tr>";
    }

    echo "<tr class='border'>";
    echo "<td colspan='5'><a class='btn btn-success text-decoration-none' href='narsymo_sistema.php?sukurtiKataloga=".$dirName."/Naujas katalogas"."&dir=".$dirName."'>";
    echo "Sukurti naują katalogą";
    echo "</a></td>";
    echo "</tr>";

    echo "<tr>";
    //  BACK 1 VARIANTAS
    echo '<p><a class="btn btn-success text-decoration-none" href="javascript:history.go(-1)" title="Grįžti atgal">« Grįžti atgal</a></p>';
    //  BACK 2 VARIANTAS
//    echo "<a class='btn btn-success text-decoration-none' href='narsymo_sistema.php?dir=".$back."' title='Grįžti atgal'> Grįžti atgal </a>";
    echo "</tr>";

    closedir($dir);
}



function countFiles($dirName){
    $dir=opendir($dirName);
    echo "<tr>";
    $count=0;
    $countSize=0;
    while ($item = readdir($dir)) {
        if($item=='.' || $item=='..') continue;
        if(is_dir($dirName."/".$item)) {
            $count+=countFiles($dirName."/".$item);
//            $countSize+=(filesize($dirName."/".$item))/10000;
        }
        if(is_file($dirName."/".$item)){
            $count++;
            $countSize+=(filesize($dirName."/".$item))/10000;
        }
        echo "</td>";
    }
    closedir($dir);

    return $count;
}



// ESAMO ATIDARYTO KATALOGO APIMTIS bytes
function folderSize ($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Naršymo sistema</title>
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
    <div class="row mt-2 d-flex justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Failų naršymo sistema
                    <a class="btn btn-success text-decoration-none" href="narsymo_sistema.php?logout=true">Atsijungti</a>
                </div>
                <div class="card-body">
                    <form class="" method="get">
                        <input type="text" name="dir">
                        <button class="btn btn-success mt-2 col-2" type="submit">Naršyti kataloge
                        </button>
                    </form>
                    <form class="" method="post">
                        <input type="search" name="search">
                        <button class="btn btn-success mt-2 col-2" type="submit">Ieškoti failo
                        </button>
                    </form>

                    <div>
                        <?php if(isset($paieska)){ ?>
                        Paieškos rezultatai: <?= $paieska ?><br>
                        <?php } ?>
                    </div>
                    <hr>
                    <div>
                        <table class="table">



                            <?php //printDir("C:/xampp/htdocs/KOPIJA_TRINTI_dashboard"); ?>
                            <?php printDir($d); ?><br>
                            Iš viso failų kataloge: <?= countFiles($d) ?> vnt<br>
                            <!--Folderio dydis: --><?php //= dirSize($d) ?>

                            Iš viso katalogo dydis: <?= folderSize ($d) ?> bytes


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

</body>
</html>
