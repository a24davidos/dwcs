<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    $coches = array("Volvo", "BMW", "Toyota");
    $coches2 = ["Polo", "BMW", "Suzuki"];

    echo "<h4> ARRAY DE COCHES </h4>";
        foreach ($coches as $coche ) {
            echo $coche . ' '; 
        }
    ?>    
</body>
</html>