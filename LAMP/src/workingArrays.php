<?php
declare(strict_types=1);

// Creo la función 
function tripleCheck(array $lista) : bool {
    // Comprobo que teñamos suficientes elementos 
    if (count($lista) < 3){
        return false; 
    } 

    // Comprobo que sexan consecutivos
    for ($i=0; $i < count($lista) - 2 ; $i++) { 
        if ($lista[$i] === $lista[$i + 1] && $lista[$i] === $lista[$i + 2])
            return TRUE;
        };

    return false;   
    };

    function paisCapital($array){
        foreach($array as $pais => $capital){
            echo "The capital of " .$pais. " is " . $capital . "<br>";
        }
    }
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

        echo "<h4> Exercicio Triple Check</h4>";

        $arrayValor = [1,2,2,2,5];
        $resultado = tripleCheck($arrayValor);
        echo var_dump($resultado);

        echo "<h4> Exercicios Países  </h4>";

        $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;

        paisCapital($ceu)


    ?>
</body>
</html>