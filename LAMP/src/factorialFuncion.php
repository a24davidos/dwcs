<?php
declare(strict_types=1);

function potencia(int $base, int $exp = 2): int
{
    if ($exp <= 0) {
        throw new Exception("El exponente debe ser mayor que 0");
    }

    $resultado = 1;
    for ($i = 0; $i < $exp; ++$i) {
        $resultado *= $base;
    }

    return $resultado;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Funcion</title>
</head>
<body>
    <h1>Factorial Función Exercicio</h1>
    
    <?php
        try {
            echo potencia (4,2) .  "<br>";
            echo potencia (14, 5) . "<br>";
            echo potencia ("a",5). "<br>";
            echo potencia (-4,0). "<br>";
        } catch (TypeError $erro) {
            echo "<p>Type error: " . $erro->getMessage() . "</p>";}
        catch (Exception $e) {
            echo "<p>Exception: " . $e->getMessage() . "</p>";}
    
    ?>

</body>
</html>