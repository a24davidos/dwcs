<?php

declare(strict_types=1);

// Función de seguridad
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Recogemos las cookies
$name = $_COOKIE['name'] ?? '';
$subject = $_COOKIE['subject'] ?? '';
$classType = $_COOKIE['classType'] ?? '';

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
    if ($name && $subject) {
        echo "$name wants to enrol in $subject<br>";

        if ($classType) {
            echo "Selected class type: $classType";
        } else {
            // Enlace a manage2.php para elegir classType
            echo '<a href="manage2.php">Next page: select class type</a>';
        }
    } else {
        echo "No hay datos disponibles. Por favor, rellena el formulario en principal.php.";
    }
    ?>

</body>

</html>