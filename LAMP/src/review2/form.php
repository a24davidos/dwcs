<?php

declare(strict_types=1);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = $productID = "";
$nameErr = "";
$logged = "";

$exer1 = [
    ["Description" => "Potatoes", "Price" => 2, "Picture" => "potatoe.jpg"],
    ["Description" => "Tomatoes", "Price" => 2.5, "Picture" => "tomatoe.jpg"],
    ["Description" => "Onions", "Price" => 1.3, "Picture" => "onion.jpg"]
];


function generateSelect($array)
{
    $contador = 0;
    echo "<select name='productID' id='product'>";

    foreach ($array as $producto) {
        /*echo "<option value='" . $contador . "'>". $producto["Description"] ."</option>"; */
        echo "<option value='{$contador}'>{$producto['Description']}</option>";
    }
    echo "</select>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Guardamos siempre el producto seleccionado
    $productID = isset($_POST["productID"]) ? (int)$_POST["productID"] : null;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        $logged = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <h1>Exam of PHP</h1>

    <?php
    if (empty($logged)) {
    ?>
        <h3>Please fill in the following form</h3>
        <?php if (!empty($nameErr)) echo "<p><span class='error'>* required field</span></p>"; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name and Surname</label>
            <input type="text" name="name" id="name"><br>

            <label for="product">Select a Product:</label>
            <?php generateSelect($exer1); ?><br>

            <button type="submit">Send Data</button>
        </form>
    <?php
    } else {
    ?>
        <h3>This is the data that you introduced</h3>
        <label for="name">Name and Surname: </label>
        <input type="text" name="name" id="name" value="<?= $name ?>"><br>
        <label for="product">Selected Product:</label>
        <select name="productID" id="product">
            <?php
            if ($productID !== null) {
                echo "<option value='{$productID}'>{$exer1[$productID]['Description']}</option>";
            }
            ?>
        </select><br>

    <?php } ?>


</body>

</html>