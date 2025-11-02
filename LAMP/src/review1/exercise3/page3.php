<?php

declare(strict_types=1);

session_start();


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($_SESSION["name"])

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
    <p>Name: <?=$_SESSION["name"]?></p>
</body>

</html>