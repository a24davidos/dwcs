<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>
    <h1>Exercicio Factorial</h1>
    <?php

    // Numero
    $numero = 5;

    // factorial
    $factorial = 1;

    for ($i = 1; $i < $numero; ++$i) {
        $factorial *= $i;
    }

    echo "O factorial de $numero é: $factorial";

    ?>
</body>
</html>