<?php
declare(strict_types=1);

// Función de seguridad
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage PHP</title>
</head>
<body>
    <?php
    // Recojo los datos desde POST, y hago operador ternario por si no tienen nada para que no me de error, además también los limpio
    $name = test_input($_POST['name'] ?? '');
    $subject = test_input($_POST['subject'] ?? '');
    $classType = test_input($_POST['class_type'] ?? '');

    if($classType){
        echo $_POST["name"]. " wants to enrol in the following subject: ".$_POST["subject"]."<br>";
        echo $classType. " is the selected option";
    } else{
        echo $_POST["name"]. " wants to enrol in the following subject: ".$_POST["subject"]."<br>";
        echo '<a href="manage2.php?name=' . $_POST["name"] . '&subject=' . $_POST["subject"] . '">Next page</a>';

    }
    ?>
    <br>

</body>
</html>