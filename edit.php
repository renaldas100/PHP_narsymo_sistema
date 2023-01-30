<?php

$path=$_GET['path'];
$dir=$_GET['dir'];
echo $dir;
//echo "Redaguojame:".$path;

if (isset($_POST['content'])){

    $file = fopen($_GET['path'],"w");
    echo fwrite($file,$_POST['content']);
    fclose($file);






//    $file = fopen("C:/xampp/htdocs/KOPIJA_TRINTI_dashboard/test.txt","w");
//    echo fwrite($file,"Hello World. Testing!");
//    fclose($file);


//    echo "Saugom nauja faila:";
//    echo $_POST['content'];
}

$f=fopen($path,'r');
$content=fread($f,filesize($path));
fclose($f);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="edit.php?path=<?=$path?>&dir=<?= $dir ?>" method="post">
    <textarea name="content" style="width: 100%; height: 400px;">
        <?= $content ?>
    </textarea>
    <button>Saugoti</button>
    <a href="./narsymo_sistema.php?dir=<?= $dir ?>">Grizti atgal</a>

</form>

</body>
</html>