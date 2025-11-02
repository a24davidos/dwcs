<?php
// Aquí deberías recuperar el nombre guardado (de sesión o cookie)
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: login.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>

<body>
    <h1>Bienvenido, <?=$_SESSION["name"]?>!</h1>

    <!-- Mostrar también la cookie si existe -->
    <?php 
    if (isset($_COOKIE["usuario"])){
        echo "El valor que guarda la cookie es " . $_COOKIE["usuario"];
    }
    ?>
    <form action="logout.php" method="post">
        <input type="submit" value="Cerrar sesión">
    </form>
</body>

</html>