<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sale</title>

</head>
<body>

<?php
// Función para limpiar la entrada
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Lista de bebidas con precios
$datos = [
    "cocacola" => ["text" => "Coca Cola", "precio" => 2.1],
    "pepsicola" => ["text" => "Pepsi Cola", "precio" => 2], 
    "fantanaranja" => ["text" => "Fanta Naranja", "precio" => 2.5],
    "trinamanzana" => ["text" => "Trina Manzana", "precio" => 2.3]
];

// Variables
$drink = $units = "";
$unitsErr = $drinkErr = "";
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar bebida
    if (empty($_POST["drink"])) {
        $drinkErr = "Please select a drink.";
    } else {
        $drink = test_input($_POST["drink"]);
        if (!array_key_exists($drink, $datos)) {
            $drinkErr = "Invalid drink selected.";
        }
    }

    // Validar unidades
    if (empty($_POST["units"])) {
        $unitsErr = "Please enter the number of units.";
    } else {
        $units = test_input($_POST["units"]);
        if (!is_numeric($units) || $units <= 0 || intval($units) != $units) {
            $unitsErr = "Please enter a valid positive integer.";
        }
    }

    // Mostrar resultado si no hay errores
    if ($drinkErr == "" && $unitsErr == "") {
        $price = $datos[$drink]["precio"] * $units;
        $result = "You have asked for $units bottle" . ($units > 1 ? "s" : "") . " of " . $datos[$drink]["text"] . ". Total price to pay: $price euros.";
    }
}
?>

<h1>Buy Your Drink</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="drink">Select drink:</label>
    <select id="drink" name="drink" required>
        <option value="">--Select--</option>
        <?php
        foreach($datos as $key => $info) {
            $selected = ($key == $drink) ? "selected" : "";
            echo "<option value=\"$key\" $selected>{$info['text']} (€{$info['precio']})</option>";
        }
        ?>
    </select>
    <span class="error"><?php echo $drinkErr; ?></span>
    <br><br>

    <label for="units">Number of units:</label>
    <input type="number" id="units" name="units" value="<?php echo $units; ?>" required min="1">
    <span class="error"><?php echo $unitsErr; ?></span>
    <br><br>

    <input type="submit" value="Buy">
</form>

<?php
if ($result != "") {
    echo "<h2>$result</h2>";
}
?>

</body>
</html>
