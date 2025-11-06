<?php
$persona = ["name"=> "Carmen Agulla", "address" => "rúa Nova, 23, Santiago de Compostela", "pedido" 
=> array(["Description" => "Keyboard", "Price_of_Unit" => 20, "Number_Of_Units"=> 2],
["Description" => "Mouse", "Price_of_Unit" => 12, "Number_Of_Units" => 4],
["Description" => "Screen", "Price_of_Unit" => 130, "Number_Of_Units" => 1])];



function printear ($array){
    echo "<br>";
    echo "Name: " . $array["name"] . "<br>";
    echo "Address: " . $array["address"] . "<br>";

    $pedidos = $array["pedido"];

    foreach ($pedidos as $pedido) {
        echo "- {$pedido['Price_of_Unit']}";
    }

}


printear($persona)

?>