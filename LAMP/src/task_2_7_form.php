<?php

declare(strict_types=1);

$drinks = [
    "cocacola" => ["text" => "Coca Cola", "precio" => 2.1],
    "pepsicola" => ["text" => "Pepsi Cola", "precio" => 2.0],
    "fantanaranja" => ["text" => "Fanta Naranja", "precio" => 2.5],
    "trinamanzana" => ["text" => "Trina Manzana", "precio" => 2.3],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // define variables and set to empty values
    $number = $drink = "";
    $numberErr = $drinkErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check required fields

        if (empty($_POST["vDrinks"])) {
            $drinkErr = "Drink is required";
        } else {
            $drinkKey = test_input($_POST["vDrinks"]);
        }

        if (empty($_POST["vNumber"])) {
            $numberErr = "Number is required";
        } else {
            $number = test_input($_POST["vNumber"]);
            if ($number <= 0){
                $numberErr = "A cantidade non é válida!";
            }
        }


        if ($number && isset($drinks[$drinkKey])) {
            $drinkText = $drinks[$drinkKey]["text"];
            $precioUnitario = $drinks[$drinkKey]["precio"];
            $precioTotal = $number * $precioUnitario;
        } else {
            $precioTotal = 0;
        }



        echo "You have asked for $number bottles of $drink. Total price to pay: $precioTotal euros.";
    }
    ?>
    <h1>FORMS MAIN PAGE</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="idDrink">Drink: </label>
        <select name="vDrinks">
            <?php foreach ($drinks as $key => $drink): ?>
                <option value="<?= $key ?>">
                    <?= $drink["text"] ?> (<?= $drink["precio"] ?> €)
                </option>
            <?php endforeach; ?>
        </select>
        <span class="error"><?php echo $drinkErr; ?></span><br><br>

        <label for="idNumber">Number: </label>
        <input type="text" id="idNumber" name="vNumber" required><br><br>
        <span class="error"><?php echo $numberErr; ?></span><br><br>
        <input type="submit" value="Send">
    </form>

</body>

</html>