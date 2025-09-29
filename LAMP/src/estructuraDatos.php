<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    $datos = [
        "cocacola" => ["text" => "Coca Cola", "precio" => 2.1],
        "pepsicola" => ["text"=> "Pepsi Cola", "precio"=>2], 
        "fantanaranja" => ["text" => "Fanta Naranja", "precio" => 2.5],
        "trinamanzana" => ["text" => "Trina Manzana", "precio" => 2.3
    ]
    ];

    ?>


    <h1>Task 3.6 Generate a Select Dynamically </h1>

    <select name="opcion">

    <?php
    foreach($datos as $claveValor => $valor){
        echo ("<option value='".$claveValor."'>".$valor["text"]." (".$valor["precio"].")</option>");    
    }

    ?>
    </select> 

    



</body>
</html>