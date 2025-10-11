<?php

declare(strict_types=1);

class ExpropiaClass
{

    public static function testNumber($numero)
    {
        if ($numero === 0) {
            throw new ExPropia("El número es igual a 0");
        }
    }
}


class ExPropia extends Exception {}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excepciones</title>
</head>

<body>
    <?php

    $numeros = [2, 3, 4, 0, 3];

    foreach ($numeros as $n) {
        try {
            ExpropiaClass::testNumber($n);
            echo "Número: " . $n . "<br>";
        } catch (ExPropia $e) {
            echo 'Caught exception: ' . $e->getMessage() . '<br>';
        }
    };

    ?>
</body>

</html>