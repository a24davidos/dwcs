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
    $coche = $conn->getCar($_POST["carId"]);
    $id = $coche->getId();
} catch (Exception $e) {
    echo "There is a problem " . $e->getMessage();
} catch (PDOException $e) {
    echo "There is a problem " . $e->getMessage();
}

$model = $fuel = $price = "";
$modelErr = $fuelErr = $priceErr = "";
$continue = true;

if (
    $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["model"]) && isset($_POST["fuel"]) && isset($_POST["price"])
) {
    $id = $_POST["carId"];

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
        $rows = $conn->updateCar($model, $fuel, $price, $id);
        if ($rows > 0) {
            header("Location: index.php");
            exit();
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {

    $id = $_POST["carId"];

    $rows = $conn->deleteCar($id);

    if ($rows > 0) {
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        body {
            text-align: center;
        }
        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>Car info: </h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="model">Modelo: </label>
        <input type="text" name="model" id="model" value='<?= $coche->getModel() ?>' required> <br>
        <label for="fuel">Fuel: </label>
        <select name="fuel" id="fuel" required>
            <option value="gasolina" <?php if ($coche->getFuel() == "gasolina") echo "selected" ?>>Gasolina</option>
            <option value="diesel" <?php if ($coche->getFuel() == "diesel") echo "selected" ?>>Diesel</option>
            <option value="electrico" <?php if ($coche->getFuel() == "electrico") echo "selected" ?>>Electrico</option>
        </select>
        <br>
        <label for="price">Price: </label>
        <input type="text" name="price" value='<?= $coche->getPrice() ?>' required>
        <input type="hidden" name="carId" value='<?= $_POST["carId"] ?>'>
        <br>
        <input type="submit" value="Update">
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="carId" value='<?=$_POST["carId"]?>'>
        <input type="submit" name="delete" value="Delete">
    </form>

    <button><a href="index.php">Volver</a></button>

</body>

</html>