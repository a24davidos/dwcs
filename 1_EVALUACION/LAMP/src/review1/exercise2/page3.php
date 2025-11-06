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

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_GET["name"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 3</title>
</head>

<body>
    <h1>Page 3</h1>
    <p>Name: <?=$_GET["name"]?></p>
</body>

</html>