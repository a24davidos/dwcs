<?php

declare(strict_types=1);

//(2 points) Create an array of key-value arrays containing information about an order, like this:

$exer1 = array(
    "name" => "Carmen Agulla",
    "address" => "rúa Nova, 23, Santiago de Compostela",
    "pedido" => array(
        ["Description" => "Keyboard", "Price_of_Unit" => 20, "Number_Of_Units" => 2],
        ["Description" => "Mouse", "Price_of_Unit" => 12, "Number_Of_Units" => 4],
        ["Description" => "Screen", "Price_of_Unit" => 130, "Number_Of_Units" => 1]
    )
);


/* (3 points) Write a function that receives an array with the previous structure and shows the
information like this. You must loop through the array.: */

function exer2 ($usuario){

    echo "name: " . $usuario["name"] . "<br>";
    echo "address: " . $usuario["address"] . "<br>";
    echo "pedido: " . "<br>";

    for ($i = 0; $i < count($usuario["pedido"]); $i++){
        $pedido = $usuario["pedido"][$i];
        echo "  -   " . $pedido["Number_Of_Units"] . " of " . $pedido["Description"] . "<br>";
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review 1</title>
</head>
<body>
    
    <h3>Salida de la función del Ejercicio 1 </h3>
    <?php exer2($exer1)?>

</body>
</html>