<?php

declare(strict_types=1);

$datos = [
    "cocacola" => ["text" => "Coca Cola", "precio" => 2.1],
    "pepsicola" => ["text"=> "Pepsi Cola", "precio"=>2], 
    "fantanaranja" => ["text" => "Fanta Naranja", "precio" => 2.5],
    "trinamanzana" => ["text" => "Trina Manzana", "precio" => 2.3]
];

function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sale</title>
    <style>
        .erro {
            color: #FF0000;
        }
    </style>
</head>
<body>

    <?php
    // define variables and set to empty values
    $number = $drink = "";
    $numberErr = $drinkErr = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //check bebidas
        if(empty($_POST["vDrinks"])){
            $drinkErr = "Drink is required";
        } else {
            $drinkKey = test_input($_POST["vDrinks"]);
        }

        //check número de bebidas
        if (empty($_POST["vNumber"])){
            $numberErr = "Number is required";
        } else if ($_POST["vNumber"] <= 0){
            $numberErr = "Introduce un valor válido";
        }
        else {
            $number = test_input($_POST["vNumber"]);
        }
        
        if ($number && isset($datos[$drinkKey])){
            $drinkText = $datos[$drinkKey]["text"];
            $precioUnitario = $datos[$drinkKey]["precio"];
            $precioTotal = $number * $precioUnitario;
        } else {
            $precioTotal = 0;
        }

        echo "You have asked for $number bottles of $drinkText. Total price to pay: $precioTotal euros.";

    }
       
    ?>

    <h1>Task 2.7 Form</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="idDrink">Drink: </label>
        <select name="vDrinks" id="idDrink">
            <?php
            foreach ($datos as $key => $value) {
                echo "<option value='".$key."'>".$value["text"]." (".$value["precio"]."€)</option>";
            }
            ?>
        </select>
        <span class="erro"><?php echo $drinkErr ?></span><br><br><br>
        
        <label for="idNumber"> Number: </label>
        <input type="number" id="idNumber" name="vNumber" required /> <br><br>
        <span class="erro"><?php echo $numberErr ?></span> <br><br>
        <input type="submit" value="Send">
    </form>

</body>
</html>
