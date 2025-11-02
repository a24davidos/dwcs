<?php

declare(strict_types=1);
require_once("Car.php");
require_once("Operations.php");

try {
    $conn = new Operations;
    $cars = $conn->getCars();
    echo "<p style='color:green'>Conexión creada</p>";
} catch (Exception $e) {
    echo "There is a problem " . $e->getMessage();
} catch (PDOException $e) {
    echo "There is a problem " . $e->getMessage();
}

function getCarColumna($array)
{
    foreach ($array as $car) {
        echo "<tr>";
        echo "<td>" . $car->getModel() . "</td>";
        echo "<td>";
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='carId' value='{$car->getId()}'>";
        echo "<input type='submit' value='info'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coche</title>
    <style>
        body{
            text-align: center;
        }
        table{
            margin: auto;
        }
        td{
            text-align: center;
        }
    </style>
</head>

<body>
    <table border="2">
        <tr>
            <th colspan=2>Listado de coches: </th>
        </tr>
        <?php getCarColumna($cars) ?>
        <tr>
            <td colspan=2><button><a href="addcar.php">Add Car</a></button></td>
        </tr>
    </table>

</body>

</html>