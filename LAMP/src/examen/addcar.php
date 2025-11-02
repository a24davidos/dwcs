<?php

declare(strict_types=1);

require_once("Car.php");
require_once("Operations.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    $conn = new Operations();
} catch (Exception $e) {
    echo "There is a problem " . $e->getMessage();
} catch (PDOException $e) {
    echo "There is a problem " . $e->getMessage();
}

$model = $fuel = $price = "";
$modelErr = $fuelErr = $priceErr = "";
$continue = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["model"])) {
        $modelErr = "Model is required";
        $continue = false;
    } else {
        $model = test_input($_POST["model"]);
    }

    if (empty($_POST["fuel"])) {
        $fuelErr = "Fuel is required";
        $continue = false;
    } else {
        $fuel = test_input($_POST["fuel"]);
    }
    if (empty($_POST["price"])) {
        $priceErr = "Model is required";
        $continue = false;
    } else {
        $price = test_input($_POST["price"]);
    }

    if ($continue) {
        $rows = $conn->addCar($model, $fuel, $price);
        if ($rows > 0) {
            header("Location: index.php");
            exit();
        }
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
    <h3>probando</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="model">Modelo: </label>
        <input type="text" name="model" id="model" required> <br>
        <label for="fuel">Fuel: </label>
        <select name="fuel" id="fuel" required>
            <option value="gasolina">Gasolina</option>
            <option value="diesel">Diesel</option>
            <option value="electrico">Electrico</option>
        </select>
        <br>
        <label for="price">Price: </label>
        <input type="number" name="price" id="price" min="0">
        <br>
        <input type="submit" value="Add">
    </form>

</body>

</html>