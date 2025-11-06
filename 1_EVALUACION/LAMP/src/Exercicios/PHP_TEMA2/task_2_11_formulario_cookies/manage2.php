<?php
declare(strict_types=1);

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $classType = $_POST['class_type'] ?? '';

    if ($classType) {
        // Guardamos la cookie por 7 días
        setcookie("classType", $classType, time() + 7*24*60*60, "/");

        // Redirigimos a manage.php
        header("Location: manage.php");
        exit;
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage2 PHP</title>
</head>
<body>

<h2>Select Class Type</h2>

<form method="post">
    <input type="radio" id="inperson" name="class_type" value="In-person" required>
    <label for="inperson">In-person classes</label><br>

    <input type="radio" id="distance" name="class_type" value="Distance" required>
    <label for="distance">Distance classes</label><br><br>

    <input type="submit" value="Send Data">
</form>

</body>
</html>
