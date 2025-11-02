<?php 
declare(strict_types=1);
/* 1. (1 point) Create an array of key-value arrays containing information about products, like this */

$exer1 = [
    ["Description" => "Potatoes", "Price" => 2, "Picture" => "potatoe.jpg"],
    ["Description" => "Tomatoes", "Price" => 2.5, "Picture" => "tomatoe.jpg"],
    ["Description" => "Onions", "Price" => 1.3, "Picture" => "onion.jpg"]
];


function generateSelect($array){
    $contador = 0;
    echo "<select name='productID'>";

    foreach ($array as $producto){
        /*echo "<option value='" . $contador . "'>". $producto["Description"] ."</option>"; */
        echo "<option value='{$contador}'>{$producto['Description']}</option>";

    }
    echo "</select>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio Examen</title>
</head>
<body>

<?php generateSelect($exer1) ?>

    
</body>
</html>