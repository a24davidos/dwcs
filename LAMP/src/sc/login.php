<?php
declare(strict_types=1);

session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){
    echo "hola neno " . "<br>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Los datos son: </h1>
    <p>Nombre: <?=$_SESSION["name"]?></p>
    <p>Surname: <?=$_COOKIE["surname"]?></p>
</body>
</html>