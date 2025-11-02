<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? "";

    if (!empty($name)) {
        // Aquí deberías guardar el nombre (sesión y/o cookie)
        $_SESSION["name"] = $name;
        setcookie("usuario", $name, time() + (86400 * 30), "/");
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Por favor, introduce un nombre.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Inicio de sesión</h2>
    <form method="post" action="">
        <label>Nombre:</label>
        <input type="text" name="name" value="">
        <input type="submit" value="Entrar">
    </form>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
</body>

</html>