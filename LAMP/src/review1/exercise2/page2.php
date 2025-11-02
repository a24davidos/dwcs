<?php

declare(strict_types=1);

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = "";
$nameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>

<body>
    <h1>Page two</h1>
    <p>Nombre: <?= $_POST["name"] ?></p>

    <form action="page3.php" method="get">
        <input type="hidden" name="name" value="<?=$_POST["name"]?>">
        <button type="submit">Go</button>
    </form>

</body>

</html>