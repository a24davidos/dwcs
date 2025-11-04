<?php
declare(strict_types=1);

session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $_SESSION["name"] = $_POST["name"];

    setcookie("surname", $_POST["surname"], time() + (86400 * 30), "/");

    $sexo = $_POST["sexo"];

    header("Location: login.php");
    exit();

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
    <h1>Introduzca sus datos: </h1>

    <form action="index.php" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="surname">Surname: </label>
        <input type="text" name="surname" id="surname" required>
        <br>
        <label for="sexo">Sexo: </label>
        <select name="sexo" id="sexo">
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
            <option value="otro">Otro</option>
        </select>
        <br>
        <input type="submit" value="Login">
    </form>
</body>

</html>